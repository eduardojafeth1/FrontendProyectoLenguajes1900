@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($clientes)
            <h2 class="my-5 text-center">Clientes Registrados</h2>
            <div class="table-responsive">
                <table class="table table-hover table-bordered shadow-sm rounded">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente['dni'] }}</td>
                                <td>{{ $cliente['nombre'] }}</td>
                                <td>{{ $cliente['apellido'] }}</td>
                                <td>{{ $cliente['email'] }}</td>
                                <td>{{ $cliente['telefono'] }}</td>
                                <td>{{ $cliente['contrasena'] }}</td>
                                <td>{{ $cliente['tipo'] }}</td>
                                <td>
                                    <a href="{{ route('editarCliente', ['dni' => $cliente['dni']]) }}"
                                        class="btn rounded-pill btn-outline-primary">Editar</a>
                                    <a href=""
                                        class="btn rounded-pill btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center my-4">
                <a href="#" class="btn btn-lg btn-primary rounded-pill" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Hacer Reserva</a>
            </div>
        @else
            <h2 class="text-center my-5">No hay registros</h2>
        @endif
    </div>
@endsection
