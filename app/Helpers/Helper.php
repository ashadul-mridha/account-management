<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class Helper
{
    public static function profileData()
    {
        $id = session('id');
        $data = DB::table('users')->select('*')->where('id', $id)->get();
        $result['image'] = $data[0]->image;
        return $result;
    }
}