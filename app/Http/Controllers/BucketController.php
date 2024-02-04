<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BucketController extends Controller
{
    public function GetBuckets()
    {
        $id = Auth::id();
        $b = DB::select("SELECT IdBucket, NameAlias, ApiKey FROM buckets where UserId = :valor ",["valor"=>$id]);
        return view("buckets", ["buckets" => $b]);
    }
}
