<?php

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('git:deploy', function () {
    $this->comment(base_path());
    $cmd = 'cd '.base_path().' && git fetch origin 2>&1  && git reset --hard origin/master 2>&1';
    exec($cmd, $output, $return);
    $this->comment(serialize($output));
    $cmd = 'composer install';
    exec($cmd, $output, $return);
    $this->comment(serialize($output));
    $this->comment(Artisan::call('migrate'));
})->describe('Deploy project');

Artisan::command('git:push {msg="update"}', function ($msg) {
    $cmd = 'cd '.base_path().' && git add .';
    exec($cmd, $output, $return);
    $this->comment(serialize($output));

    $cmd = 'git commit -m "'.$msg.'"';
    exec($cmd, $output, $return);
    $this->comment(serialize($output));

    $cmd = 'git push origin master';
    exec($cmd, $output, $return);
    $this->comment(serialize($output));
})->describe('Push project to github');

use App\Notifications\CompleteTeamRegistration;

Artisan::command('ahkui', function () {
    $users = \App\User::whereVerify(false);
    foreach ($users as $user) {
        if (Carbon::now()->diffInMinutes($user->created_at) > 15) {
            $user->delete();
        }
    }
})->describe('Push project to github');

Artisan::command('role:init', function () {
    $developer = Role::firstOrCreate(['name' => 'developer']);
    $admin = Role::firstOrCreate(['name' => 'admin']);
    $participant = Role::firstOrCreate(['name' => 'participant']);
    $invigilator = Role::firstOrCreate(['name' => 'invigilator']);

    $set_admin = Permission::firstOrCreate(['name' => 'set admin']);
    $set_user_role = Permission::firstOrCreate(['name' => 'set user role']);
    $upload_file = Permission::firstOrCreate(['name' => 'upload file']);
    $review_all_file = Permission::firstOrCreate(['name' => 'review all file']);
    $edit_teammate = Permission::firstOrCreate(['name' => 'edit teammate']);
    $edit_website = Permission::firstOrCreate(['name' => 'edit website']);

    $developer->syncPermissions([
        $set_admin,
        $set_user_role,
        $upload_file,
        $review_all_file,
        $edit_teammate,
        $edit_website,
    ]);

    $admin->syncPermissions([
        $set_user_role,
        $review_all_file,
        $edit_website,
    ]);

    $invigilator->syncPermissions([
        $review_all_file,
    ]);

    $participant->syncPermissions([
        $edit_teammate,
        $upload_file,
    ]);
})->describe('Initial Role and Permission');

Artisan::command('role:set {role} {email}', function ($role, $email) {
    $developer_user = \App\User::whereEmail($email)->first();
    if ($developer_user) {
        $developer_user->syncRoles($role);
        $this->comment($developer_user->id.' - '.$developer_user->email);
    } else {
        $this->comment($email.' not found!');
    }
})->describe('Add role to user with email');

Artisan::command('user:create {name} {email} {password}', function ($name, $email, $password) {
    $developer_user = \App\User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
        ]);
})->describe('Create a new user.');

Artisan::command('notice:team', function () {
    $users = \App\User::get();
    \Notification::send($users, new CompleteTeamRegistration());
})->describe('notice team');

Artisan::command('notice:teammember', function () {
    $member = \App\TeamMember::get();
    \Notification::send($member, new CompleteTeamRegistration());
})->describe('notice teammember');
