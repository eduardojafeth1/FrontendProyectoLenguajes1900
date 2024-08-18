<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HabitacionController extends Controller
{
   /* public function login()
    {
        return view('login');
    }

    public function registro()
    {
        return view('registro');
    }
    */

    public function crearHabitacion(Request $request)
    {
        $cdg_habitacion = $request->input('cdg_habitacion');
        $numero = $request->input('numero');
        $piso = $request->input('piso');
        $precio_noche = $request->input('precio_noche');
        $tipo = $request->input('tipo');
        $estado = $request->input('estado');
        $descripcion = $request->input('descripcion');
        $client = new Client();
        try {
            $response = $client->request('POST', 'http://localhost:8080/api/habitacion/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'cdg_habitacion' => $cdg_habitacion,
                    'numero' => $numero,
                    'piso'=>$piso,
                    'precio_noche' => $precio_noche,
                    'tipo'=>$tipo,
                    'estado' => $estado,
                    'descripcion' => $descripcion
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('crearHabitacion');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }
}