<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller {
    public function onDelete() {
        Storage::delete('images/');
    }
    public function onDataBaseDelete() {
        $result = DB::table('my_file')->delete(['id' => 17]);
        return $result;
    }
}
