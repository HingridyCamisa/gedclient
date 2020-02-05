<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class FileDownloadController extends Controller
{   

    public function index($filename) {

        
        $file = '../storage/app/'.$filename.'';
        $name = basename($file);
        return response()->download($file, $name);
    }
}
