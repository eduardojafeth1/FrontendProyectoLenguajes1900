@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($habitaciones)
            <h2 class="my-5 text-center">Clientes Registrados</h2>
            <div class="table-responsive">
                <table class="table table-hover table-bordered shadow-sm rounded">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Numero</th>
                            <th scope="col">Piso</th>
                            <th scope="col">Precio_Noche</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($habitaciones as $habitacion)
                            <tr>
                                <td>{{ $habitacion['id'] }}</td>
                                <td>{{ $habitacion['numero'] }}</td>
                                <td>{{ $habitacion['piso'] }}</td>
                                <td>{{ $habitacion['precio_noche'] }}</td>
                                <td>{{ $habitacion['descripcion'] }}</td>
                                <td>{{ $habitacion['tipoHabitacion']['tipo'] }}</td>
                                <td>{{ $habitacion['estadoHabitacion']['estado'] }}</td>
                                <td>
                                    <a href="{{ route('editarHabitacion', ['id' => $habitacion['id']]) }}"
                                        class="btn rounded-pill btn-outline-primary">Editar</a>
                                    <a href="{{ route('verEliminarHabitacion', ['id' => $habitacion['id']]) }}"
                                        class="btn rounded-pill btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center my-4">
                <div class="text-center my-4">
                    <a href="{{ route('nuevaHabitacion') }}"
                        class="btn rounded-pill btn-outline-primary">Nueva Habitacion</a>
                </div>
            </div>
        @else
            <h2 class="text-center my-5">No hay registros</h2>
        @endif
    </div>
@endsection
