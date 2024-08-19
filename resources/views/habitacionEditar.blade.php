@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow" style="width: 30rem">
            <div class="card-header bg-primary">
                <h3 class="text-white">Editar "{{ $habitacion['id'] }}"</h3>
            </div>
            <div class="card-body">
                <form action="{{route('actualizarHabitacion',['id'=>$habitacion['id']])}}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="numero" value="{{$habitacion['numero']}}" placeholder="numero" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="piso" value="{{$habitacion['piso']}}" placeholder="piso" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="precio_noche" placeholder="precio_noche" value="{{$habitacion['precio_noche']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="descripcion" placeholder="descripcion" value="{{$habitacion['descripcion']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="tipo" placeholder="tipo" value="{{$habitacion['tipo']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="estado" placeholder="estado" value="{{$habitacion['estado']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" value="Actualizar" class="btn btn-primary rounded-pill w-100 m-3">
                        <a href="{{ route('obtenerTodosHabitaciones') }}" class="btn btn-outline-primary rounded-pill w-100 mx-3">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection