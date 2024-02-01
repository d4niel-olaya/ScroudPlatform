<?php

class ApiService
{
    public function GetRequest(String $key) : String
    {
        $url = 'https://api.scroud.app/demo/bucket';

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
}

