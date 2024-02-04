<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ObjetsController extends Controller
{
    public function GetObjects(Request $request)
    {
        $id = $request->query("id");
        $objs = DB::select("SELECT ObjectName, Extension, ObjectLink from objects WHERE BucketId = :valor", ["valor"=>$id]);
        return view("objects", ["objects" => $objs]);
    }
}
