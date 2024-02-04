<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark" data-theme="sunset">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="The Cloud Storage for developers">
        <title>Scroud</title>

        <!-- Fonts -->
      
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="bg-base-100">
        @include("partials.navbar")
        <form method="POST" action="{{route("CreateB")}}" >
            @csrf("POST")
            <div class="mx-auto">

                <label class="label">Name :</label>
                <input type="text" name="name" class="input input-bordered w-full max-w-xs" >
                <br>
                <button class="btn btn-primary">Create Bucket</button>
            </div>
        </form>
        <div class="flex flex-wrap">
            @foreach ($buckets as $item)
                <div class="card w-96 bg-base-100 shadow-xl">
                    <div class="card-body">
                    <h2 class="card-title">{{$item->NameAlias}}</h2>
                    <div class="card-actions justify-end">
                        <a class="btn btn-primary" href="/objects?id={{$item->IdBucket}}">View objects</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
</html>
