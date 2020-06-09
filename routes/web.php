<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index')->name('home');
Route::get('/videos', 'VideoController@index')->name('videos');
Auth::routes();
Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

Route::prefix('profile')->group(function () {
    Route::get('/', function () {
        return view('profile');
    })->name('profile');
    Route::post('/changePassword', 'Auth\ChangePasswordController@changePassword')->name('change.password.save');

    Route::get('/changePassword', 'Auth\ChangePasswordController@showChangePasswordForm')->name('change.password.form');
});

Route::prefix('team')->group(function () {
    Route::get('/', function () {
        return redirect()->route('team.info');
    });
    Route::post('rename', 'Team\HomeController@rename')->name('team.rename');
    Route::get('verify/notice', 'VerifyController@notice')->name('verify.notice');
    Route::get('verify/success', 'VerifyController@success')->name('verify.success');
    Route::post('verify/resend', 'VerifyController@resendEmail')->name('verify.resend');
    Route::get('verify/{token}', 'VerifyController@process')->name('verify.process');
    Route::prefix('teammate')->group(function () {
        Route::get('/', 'Team\HomeController@index')->name('team.info');
        Route::prefix('edit')->group(function () {
            Route::get('{level}', 'Team\HomeController@edit')->name('team.edit');
            Route::post('{level}', 'Team\EditController@update')->name('team.update');
            Route::patch('{level}', 'Team\EditController@getTeamData')->name('team.data.get');
            Route::put('{level}', 'Team\EditController@checkEmailDuplication')->name('team.check.email');
            Route::delete('{level}', 'Team\HomeController@clear')->name('team.clear');
        });
    });

    Route::prefix('files')->group(function () {
        Route::prefix('upload')->group(function () {
            Route::prefix('proposal')->group(function () {
                Route::get('/', 'Team\ProposalController@view')->name('team.proposal.view');
                Route::post('/', 'Team\ProposalController@upload')->name('team.proposal.uplaod');
                Route::get('/download', 'Team\ProposalController@download')->name('team.proposal.download');
            });
            Route::prefix('registerForm')->group(function () {
                Route::get('/', 'Team\RegisterFormController@view')->name('team.register.form.view');
                Route::post('/', 'Team\RegisterFormController@upload')->name('team.register.form.uplaod');
                Route::get('/download', 'Team\RegisterFormController@download')->name('team.register.form.download');
            });
            Route::prefix('app')->group(function () {
                Route::get('/', 'Team\AppController@view')->name('team.app.view');
                Route::post('/', 'Team\AppController@upload')->name('team.app.uplaod');
                Route::get('/download', 'Team\AppController@download')->name('team.app.download');
            });
        });
    });
});

Route::prefix('univercity')->group(function () {
    Route::post('name', 'UnivercityController@name')->name('univercity.name');
    Route::post('course', 'UnivercityController@course')->name('univercity.course');
    Route::post('all', 'UnivercityController@all')->name('univercity.all');
    Route::get('all', 'UnivercityController@all')->name('univercity.all');
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::prefix('team')->group(function () {
        Route::get('list', 'TeamController@teamlist')->name('admin.team.list');
        Route::get('list/download', 'TeamController@download')->name('admin.team.list.download');
        Route::get('document/download', 'TeamController@documentDownload')->name('admin.team.document.download');
        Route::get('qualifiers/full/download', 'TeamController@qualifiersDownload')->name('admin.team.qualifiers.download');
        Route::get('qualifiers/form/download', 'TeamController@qualifiersFormDownload')->name('admin.team.qualifiers.form.download');
        Route::get('qualifiers/app/list', 'QualifiersAppController@index')->name('admin.team.qualifiers.app.list');
        Route::get('qualifiers/proposal/list', 'QualifiersAppController@proposalIndex')->name('admin.team.qualifiers.proposal.list');
        Route::get('qualifiers/proposal/download/{id}', 'QualifiersAppController@proposalDownload')->name('admin.team.qualifiers.proposal.download');
        Route::get('qualifiers/app/download/{id}', 'QualifiersAppController@download')->name('admin.team.qualifiers.app.download');
    });
    Route::prefix('setting')->group(function () {
        \App\Http\Controllers\Admin\SettingController::routes();
    });

    Route::prefix('news')->group(function () {
        Route::get('/', 'NewsController@index')->name('admin.news.index');
        Route::get('edit/{id?}', 'NewsController@edit')->name('admin.news.edit');
        Route::post('save/{id?}', 'NewsController@save')->name('admin.news.save');
        Route::delete('delete/{id}', 'NewsController@delete')->name('admin.news.delete');
    });

    Route::prefix('page')->group(function () {
        Route::get('', 'PageController@index')->name('page.index');
        Route::get('about', 'PageController@aboutEdit')->name('page.about.edit');
        Route::post('about', 'PageController@aboutUpdate')->name('page.about.update');
        Route::get('award', 'PageController@awardEdit')->name('page.award.edit');
        Route::post('award', 'PageController@awardUpdate')->name('page.award.update');
        Route::get('competitionReview', 'PageController@competitionReviewEdit')->name('page.competitionReview.edit');
        Route::post('competitionReview', 'PageController@competitionReviewUpdate')->name('page.competitionReview.update');
        Route::get('entryRequirement', 'PageController@entryRequirementEdit')->name('page.entryRequirement.edit');
        Route::post('entryRequirement', 'PageController@entryRequirementUpdate')->name('page.entryRequirement.update');
        Route::get('relatedStatement', 'PageController@relatedStatementEdit')->name('page.relatedStatement.edit');
        Route::post('relatedStatement', 'PageController@relatedStatementUpdate')->name('page.relatedStatement.update');
        Route::get('reviewAndAwards', 'PageController@reviewAndAwardsEdit')->name('page.reviewAndAwards.edit');
        Route::post('reviewAndAwards', 'PageController@reviewAndAwardsUpdate')->name('page.reviewAndAwards.update');
        Route::get('workRequirement', 'PageController@workRequirementEdit')->name('page.workRequirement.edit');
        Route::post('workRequirement', 'PageController@workRequirementUpdate')->name('page.workRequirement.update');
    });
});
