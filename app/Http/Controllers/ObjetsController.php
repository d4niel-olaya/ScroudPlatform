<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Http\Services\ApiServicePlatform;

class ObjetsController extends Controller
{
    public function GetObjects(Request $request)
    {
        $id = $request->query("id");
        $objs = DB::select("SELECT ObjectName, Extension, ObjectLink from objects WHERE BucketId = :valor", ["valor"=>$id]);
        $key = DB::select("SELECT ApiKey from buckets WHERE IdBucket = :clave", ["clave"=>$id]);
        return view("objects", ["objects" => $objs, "key" => $key]);
    }

    public function CreateObject(Request $request)
    {
        $archivo = $request->file('archivo');
        $servicio = new ApiServicePlatform();
        $r = $servicio->CreateObject($request->clave,$archivo);
        if(strval($r) == "201")
        {
            return redirect("/dashboard");
        }
        return redirect("/dashboard?code=".$r);
    }
}
