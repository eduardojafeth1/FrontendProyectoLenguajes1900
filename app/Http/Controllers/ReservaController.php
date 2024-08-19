<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
   /* public function login()
    {
        return view('login');
    }
*/
    public function vistaReserva()
    {
        return view('reservaCrear');
    }


    public function obtenerReservas(){
        try{
            $responseReservas = $client->request('GET', 'http://localhost:8080/api/reservas/obtener');
            $reservas = json_decode($responseRservas->getBody(), true);
        
            return view('registroReservas', [
                'reservas' => $reservas
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
    }



    public function crearReserva(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $dni = $request->input('dni');
        $cdg_habitacion = $request->input('cdg_habitacion');
        $transporte = $request->input('transporte');
        $desayuno = $request->input('desayuno');
        $almuerzo = $request->input('almuerzo');
        $cena = $request->input('cena');
        $client = new Client();
        try {
            $response = $client->request('POST', 'http://localhost:8080/api/reserva/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'fecha_inicio' => $fecha_inicio,
                    'fecha_fin' => $fecha_fin,
                    'dni'=>$dni,
                    'cdg_habitacion' => $cdg_habitacion,
                    'transporte'=>$transporte,
                    'desayuno' => $desayuno,
                    'almuerzo' => $almuerzo,
                    'cena' => $cena
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('reserva');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }


    public function editarReserva($cdg_reserva)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', 'http://localhost:8080/api/reserva/buscar/' . $cdg_reserva);
            $reserva =  json_decode($response->getBody(), true);

            if ($response->getStatusCode() == 200) {
                return view('reservaEditar', ['reserva' => $reserva]);
            }
        } catch (\Exception $ex) {
            return "Error al editar avion " . $ex;
        }
    }


    public function actualizarReserva(Request $request, $cdg_habitacion)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $dni = $request->input('dni');
        $cdg_habitacion = $request->input('cdg_habitacion');
        $transporte = $request->input('transporte');
        $desayuno = $request->input('desayuno');
        $almuerzo = $request->input('almuerzo');
        $cena = $request->input('cena');
        $client = new Client();
        try {
            $response = $client->put('http://localhost:8080/api/reserva/actualizar' . $cdg_habitacion, [
                'Content-Type' => 'application/json',
                'json' => [
                    'fecha_inicio' => $fecha_inicio,
                    'fecha_fin' => $fecha_fin,
                    'dni'=>$dni,
                    'cdg_habitacion' => $cdg_habitacion,
                    'transporte'=>$transporte,
                    'desayuno' => $desayuno,
                    'almuerzo' => $almuerzo,
                    'cena' => $cena
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('reserva');
            }
        } catch (\Exception $e) {
            return 'Error al actualizar: ' .$ex;
        }
    }
}