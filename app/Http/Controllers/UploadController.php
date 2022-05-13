<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller {
    public function onUpload(Request $request) {
        // $path = $request->file('fileKey')->store('images');
        $path = $request->fileKey->store('images');
        $result = DB::table('my_file')->insert(['file_path' => $path]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
