<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class InitController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function registro()
    {
        return view('registro');
    }
    
    public function crearCliente(Request $request)
    {
        $dni = $request->input('dni');
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $contrasena = $request->input('contrasena');
        $tipo = $request->input('tipo');
        $client = new Client();
        try {
            $response = $client->request('POST', 'http://localhost:8080/api/clientes/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'dni'=>$dni,
                    'nombre' => $nombre,
                    'apellido'=>$apelllido,
                    'telefono' => $telefono,
                    'email' => $email,
                    'contrasena' => $contrasena,
                    'tipo' => $tipo,
                    'clienteRegistrado' => true
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('login');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}