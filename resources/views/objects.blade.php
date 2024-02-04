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
        <form method="POST" action="{{route("CreateObj")}}" enctype="multipart/form-data" >
            @csrf("POST")
            <input type="text" name="clave" value="{{$key[0]->ApiKey}}">
            <input type="file" name="archivo" class="file-input w-full max-w-xs" >
            <button class="btn btn-primary">Upload File</button>
        </form>
       <div class="overflow-x-auto">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th></th>
              <th>File Name</th>
              <th>Link</th>
              <th>Extension</th>
            </tr>
          </thead>
          <tbody>
            <!-- row 1 -->
            @foreach ($objects as $item)
            <tr>
                <td></td>
                <td>{{$item->ObjectName}}</td>
                <td><a href={{$item->ObjectLink}} target="_blank">{{$item->ObjectLink}}</a></td>
                <td>{{$item->Extension}}</td>
            </tr>
            @endforeach
           
          </tbody>
        </table>
      </div>
    </body>
</html>
