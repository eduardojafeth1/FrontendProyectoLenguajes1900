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
    
    //metodo crear cliente
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
            $response = $client->request('POST', 'http://localhost:8080/usuarios/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'dni'=>$dni,
                    'nombre' => $nombre,
                    'apellido'=>$apellido,
                    'telefono' => $telefono,
                    'email' => $email,
                    'contrasena' => $contrasena,
                    'tipo' => $tipo
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('obtenerTodos');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }

    //obtener todos los clientes
    public function obtenerClientes(){
        $client = new Client();
        try{
            $responseClientes = $client->request('GET', 'http://localhost:8080/usuarios/verTodos');
            $clientes = json_decode($responseClientes->getBody(), true);
        
            return view('clientesAll', [
                'clientes' => $clientes
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    //editar cliente por ID
    public function editarCliente($dni)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:8080/usuarios/ver/' . $dni);
            $cliente =  json_decode($response->getBody(), true);

            if ($response->getStatusCode() == 200) {
                return view('clientesEditar', ['cliente' => $cliente]);
            }
        } catch (\Exception $ex) {
            return "Error al editar cliente " . $ex;
        }
    }


    //Actualizar clientes
    public function actualizarCliente(Request $request, $dni)
    {
        $nombre = $request->input('nombre');
        $apellido = $request->input('apellido');
        $email = $request->input('email');
        $telefono = $request->input('telefono');
        $contrasena = $request->input('contrasena');
        $tipo = $request->input('tipo');

        $client = new Client();
        try {
            $response = $client->put('http://localhost:8080/usuarios/editar/' . $dni, [
                'Content-Type' => 'application/json',
                'json' => [
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'telefono' => $telefono,
                    'contrasena' => $contrasena,
                    'tipo' => $tipo

                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('obtenerTodos');
            }
        } catch (\Exception $ex) {
            return "Error al actualizar: " . $ex;
        }
    }

}