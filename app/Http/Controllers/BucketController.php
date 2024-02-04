<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Services\ApiServicePlatform;

class BucketController extends Controller
{
    public function GetBuckets()
    {
        $id = Auth::id();
        $b = DB::select("SELECT IdBucket, NameAlias, ApiKey FROM buckets where UserId = :valor ",["valor"=>$id]);
        return view("buckets", ["buckets" => $b]);
    }
    public function CreateBucket(Request $request)
    {
        $id = Auth::id();
        $servicio = new ApiServicePlatform();
        $r = $servicio->CreateBucket($id, $request->name);
        if(strval($r) == "201")
        {
            return redirect("/dashboard");
        }
        return redirect("/dashboard?code=".$r);
    }
}
