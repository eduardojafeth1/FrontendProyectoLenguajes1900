@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow" style="width: 30rem;">
            <img src="{{ asset('images/logo.png') }}" class="mx-auto" width="140px" alt="">
            <h3 class="text-center text-secondary my-3">Registrarse</h3>
            <form action="{{route('crearCliente')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="dni" placeholder="dni" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="nombre" placeholder="nombre" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="apellido" placeholder="apellido" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="email" placeholder="email" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="telefono" placeholder="telefono" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="contrasena" placeholder="contrasena" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="tipo" placeholder="tipo" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="submit" value="Registrarse" class="btn btn-primary rounded-pill w-100 mx-3">
                </div>
                <div class="input-group mb-3">
                    <a href="{{ route('login') }}" class="text-center mx-auto">Iniciar Sesion</a>
                </div>
            </form>
        </div>
    </div>
@endsection