<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Carbon;
use Storage;
use Zipper;

class QualifiersAppController extends Controller
{
    /**
     * Create a new controller instance and set middleware.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is.verify');
        $this->middleware('is.admin');
    }

    public function sendHeaders($file, $type, $name = null)
    {
        if (empty($name)) {
            $name = basename($file);
        }
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Transfer-Encoding: binary');
        header('Content-Disposition: attachment; filename="'.$name.'";');
        header('Content-Type: '.$type);
        header('Content-Length: '.filesize($file));
    }

    /**
     * render team list view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereVerify(true)->get();
        $existsUsers = collect();
        $users->map(function ($e) use ($existsUsers) {
            if (Storage::exists($e->id.'/app.zip')) {
                $existsUsers->push($e->id);
            }
        });

        return view('admin.QualifiersApp')->with([
            'users' => $existsUsers,
        ]);
    }

    public function proposalIndex()
    {
        $users = User::whereVerify(true)->get();
        $existsUsers = collect();
        $users->map(function ($e) use ($existsUsers){
            if (Storage::exists($e->id.'/proposal.pdf')) {
                $existsUsers->push($e->id);
                return $e->id;
            }
        });
        return view('admin.checkProposallist')->with([
            'users' => $existsUsers,
        ]);
    }
    /**
     * render team list view.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $timeString = Carbon::now()->toDateTimeString();

        $file = Storage::path($id.'/app.zip');
        if (is_file($file)) {
            $this->sendHeaders($file, 'application/zip', "team_$id._$timeString.zip");
            $chunkSize = 1024 * 1024;
            $handle = fopen($file, 'rb');
            while (!feof($handle)) {
                $buffer = fread($handle, $chunkSize);
                echo $buffer;
                ob_flush();
                flush();
            }
            fclose($handle);
            exit;
        }

        return Storage::download("$id/app.zip", "team_$id._$timeString.zip");
    }
    public function proposalDownload($id)
    {
        return Storage::download("$id/proposal.pdf", "$id-proposal.pdf");
    }
    /**
     * qualifiers app download.
     *
     * @return
     */
    public function qualifiersAppDownload()
    {
        $filename = 'qualifiers_app';
        $users = User::whereVerify(true)->whereIn('id', [10, 13, 17, 42, 77, 80, 101, 117, 120, 123, 124, 131, 132, 133, 134, 140, 141, 142, 156, 163, 166, 172])->get();
        $directorys = $users->map(function ($e) {
            $data = null;
            if (Storage::exists($e->id.'/app.zip')) {
                $data = [$e->id.'/app.zip'];
            }

            return collect(['data'=>$data, 'id'=>$e->id, 'name'=>$e->name]);
        });
        $zip = Zipper::make(storage_path().'/app/'.$filename.'.zip');
        foreach ($directorys as $item) {
            if ($item['data'] != null) {
                $zip->folder($item['id'].'_'.$item['name']);
                foreach ($item['data'] as $file) {
                    $zip->add(storage_path().'/app/'.$file);
                }
            }
        }
        $zip->close();
        if (Storage::exists($filename.'.zip')) {
            return Storage::download($filename.'.zip', $filename.'_'.Carbon::now()->toDateTimeString().'.zip');
        } else {
            return back();
        }
    }
}
