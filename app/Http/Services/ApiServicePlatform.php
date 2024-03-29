<?php
namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

 class ApiServicePlatform
{
    public function GetRequest(String $key) : String
    {
        $url = 'https://api.scroud.app/bucket';

        // Token de acceso Bearer
       

        // Inicializa cURL
        $ch = curl_init();

        // Configura las opciones de cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Agrega el encabezado de autorización con el token Bearer
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $key,
        ]);

        // Ejecuta la solicitud y obtén la respuesta
        $response = curl_exec($ch);

        // Verifica si hubo errores
        if (curl_errno($ch)) {
            echo 'Error al realizar la solicitud: ' . curl_error($ch);
        }

        // Cierra la conexión cURL
        curl_close($ch);

        return $response;
    }

    public function CreateObject(string $key,UploadedFile $file)
    {
        $url = 'https://api.scroud.app/bucket/create/object';

        // Token de acceso Bearer
       

        // Inicializa cURL
        $ch = curl_init();

        // Configura las opciones de cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Agrega el encabezado de autorización con el token Bearer
       // curl_setopt($ch, CURLOPT_HTTPHEADER, [
           // 'Authorization: Bearer ' . $key,
        //]);
        $auth = 'Authorization: Bearer ' . $key;
        $headers = [$auth,'Content-Type: multipart/form-data'];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'archivo' => curl_file_create($file->getRealPath(), $file->getClientMimeType(), $file->getClientOriginalName())
        ]);

        // Ejecuta la solicitud y obtén la respuesta
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // Verifica si hubo errores
        if (curl_errno($ch)) {
            echo 'Error al realizar la solicitud: ' . curl_error($ch);
        }

        // Cierra la conexión cURL
        curl_close($ch);

        return $httpCode;
    }

    public function CreateBucket(string $IdUser, string $Name) : String
    {
        $url = 'https://api.scroud.app/bucket/create';

        // Token de acceso Bearer
       

        // Inicializa cURL
        $ch = curl_init();
        $data = array(
            'name' => $Name,
            'IdUser' => $IdUser
        );
        
        // Convertir el array a formato JSON
        $jsonData = json_encode($data);
        

        // Configura las opciones de cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Agrega el encabezado de autorización con el token Bearer
        //curl_setopt($ch, CURLOPT_HTTPHEADER, [
        //    'Authorization: Bearer ' . $key,
        //]);

        // Ejecuta la solicitud y obtén la respuesta
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // Verifica si hubo errores
        if (curl_errno($ch)) {
            echo 'Error al realizar la solicitud: ' . curl_error($ch);
        }

        // Cierra la conexión cURL
        curl_close($ch);

        return $httpCode;
    }
}

