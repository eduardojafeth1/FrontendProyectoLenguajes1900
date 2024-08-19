@extends('layouts.app')
@section('content')
    <div class="container p-0">
        <div class="card m-0">
            <div class="card-header bg-primary"> <!-- Cambio realizado aquí -->
                <h3 class="text-white">Eliminar Habitacion</h3>
            </div>
            <div class="card-body text-center p-5">
                <p class="fs-3 text-secondary">¿Está seguro que desea eliminar el Cliente "{{ $cliente['dni'] }}"?</p>
                <a href="{{ route('obtenerTodosHabitaciones') }}" class="btn btn-outline-primary me-2">Volver</a>
                <a href="{{ route('eliminarHabitacion', ['id'=>$habitacion['id']]) }}" class="btn btn-primary">Sí, eliminar</a>
            </div>
        </div>
    </div>
@endsection
