@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow" style="width: 30rem">
            <div class="card-header bg-primary">
                <h3 class="text-white">Editar "{{ $reserva['dni'] }}"</h3>
            </div>
            <div class="card-body">
                <form action="{{route('actualizarReserva',['cdg_reserva'=>$reserva['cdg_reserva']])}}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="fecha_inicio" value="{{$reserva['fecha_inicio']}}" placeholder="fecha_inicio" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="fecha_fin" value="{{$reserva['fecha_fin']}}" placeholder="fecha_fin" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="dni" placeholder="dni" value="{{$reserva['dni']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="cdg_habitacion" placeholder="cdg_habitacion" value="{{$reserva['cdg_habitacion']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="transporte" placeholder="transporte" value="{{$reserva['transporte']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="desayuno" placeholder="desayuno" value="{{$reserva['desayuno']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="almuerzo" placeholder="almuerzo" value="{{$reserva['almuerzo']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="cena" placeholder="cena" value="{{$reserva['cena']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="cantidadPrendas" placeholder="cantidadPrendas" value="{{$reserva['cantidadPrendas']}}" class="form-control rounded-pill mx-3">
                    </div>
                    
                    <div class="input-group mb-3">
                        <input type="submit" value="Actualizar" class="btn btn-primary rounded-pill w-100 m-3">
                        <a href="{{ route('reservaAll') }}" class="btn btn-outline-primary rounded-pill w-100 mx-3">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection