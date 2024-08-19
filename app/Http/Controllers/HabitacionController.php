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
    */
    public function habitacion()
    {
        return view('habitacionCrear');
    }
    

    public function crearHabitacion(Request $request)
    {
        $numero = $request->input('numero');
        $piso = $request->input('piso');
        $precio_noche = $request->input('precio_noche');
        $descripcion = $request->input('descripcion');
        $tipo = $request->input('tipo');
        $estado = $request->input('estado');
        
        $client = new Client();
        try {
            $response = $client->request('POST', 'http://localhost:8080/habitacion/crear', [
                'Content-Type' => 'application/json',
                'json' => [
                    'numero' => $numero,
                    'piso'=>$piso,
                    'precio_noche' => $precio_noche,
                    'descripcion' => $descripcion,
                    'tipo'=>$tipo,
                    'estado' => $estado
                    
                ],
            ]);
            if ($response->getStatusCode() == 200) {
                return redirect()->route('obtenerTodosHabitaciones');
            }
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }

     //obtener todos los habitaciones
     public function obtenerHabitaciones(){
        $client = new Client();
        try{
            $responseHabitaciones = $client->request('GET', 'http://localhost:8080/habitacion/ver');
            $habitaciones = json_decode($responseHabitaciones->getBody(), true);
        
            return view('habitacionAll', [
                'habitaciones' => $habitaciones
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
    }


     //editar habitacion por ID
     public function editarHabitacion($id)
     {
         $client = new Client();
         try {
             $response = $client->request('GET', 'http://localhost:8080/habitacion/buscar/' . $id);
             $habitacion =  json_decode($response->getBody(), true);
 
             if ($response->getStatusCode() == 200) {
                 return view('habitacionEditar', ['habitacion' => $habitacion]);
             }
         } catch (\Exception $ex) {
             return "Error al editar cliente " . $ex;
         }
     }
 
 
     //Actualizar habitaciones
     public function actualizarHabitacion(Request $request, $id)
     {
        $numero = $request->input('numero');
        $piso = $request->input('piso');
        $precio_noche = $request->input('precio_noche');
        $descripcion = $request->input('descripcion');
        $tipo = $request->input('tipo');
        $estado = $request->input('estado');
        
 
         $client = new Client();
         try {
             $response = $client->put('http://localhost:8080/habitacion/editar/' . $id, [
                 'Content-Type' => 'application/json',
                 'json' => [
                    'numero' => $numero,
                    'piso'=>$piso,
                    'precio_noche' => $precio_noche,
                    'tipo'=>$tipo,
                    'estado' => $estado,
                    'descripcion' => $descripcion
                 ],
             ]);
             if ($response->getStatusCode() == 200) {
                 return redirect()->route('obtenerTodosHabitaciones');
             }
         } catch (\Exception $ex) {
             return "Error al actualizar: " . $ex;
         }
     }

     //Eliminar habitacion
     public function verEliminarHabitacion($id)
     {
         $client = new Client();
         try {
             $response = $client->request('GET', 'http://localhost:8080/habitacion/buscar/' . $id);
             $habitacion =  json_decode($response->getBody(), true);
             if ($response->getStatusCode() == 200) {
                 return view('habitacionEliminar', ['habitacion' => $habitacion]);
             }
         } catch (\Exception $ex) {
             return "Error al eliminar habitacion " . $ex;
         }
     }
 
     
     public function eliminarHabitacion($id)
     {
         $client = new Client();
         try {
             $response = $client->delete('http://localhost:8080/habitacion/borrar/' . $id);
 
             if ($response->getStatusCode() == 200) {
                 return "Habitacion Eliminada". redirect()->route('obtenerTodosHabitaciones');
             }
         } catch (\Exception $ex) {
             return "Error al eliminar habitacion " . $ex;
         }
     }
 
 
 
 
 }
