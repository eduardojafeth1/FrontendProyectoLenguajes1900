@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center mt-5">
        <div class="card shadow" style="width: 30rem">
            <div class="card-header bg-primary">
                <h3 class="text-white">Editar "{{ $cliente['dni'] }}"</h3>
            </div>
            <div class="card-body">
                <form action="{{route('actualizarCliente',['dni'=>$cliente['dni']])}}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="nombre" value="{{$cliente['nombre']}}" placeholder="nombre" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="apellido" value="{{$cliente['apellido']}}" placeholder="apellido" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="email" placeholder="email" value="{{$cliente['email']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="telefono" placeholder="telefono" value="{{$cliente['telefono']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="contrasena" placeholder="contrasena" value="{{$cliente['contrasena']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="tipo" placeholder="tipo" value="{{$cliente['tipo']}}" class="form-control rounded-pill mx-3">
                    </div>
                    <div class="input-group mb-3">
                        <input type="submit" value="Actualizar" class="btn btn-primary rounded-pill w-100 m-3">
                        <a href="{{ route('obtenerTodos') }}" class="btn btn-outline-primary rounded-pill w-100 mx-3">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection