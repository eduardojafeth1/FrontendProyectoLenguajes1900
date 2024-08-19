@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow" style="width: 30rem;">
            <img src="{{ asset('images/logo.png') }}" class="mx-auto" width="140px" alt="">
            <h3 class="text-center text-secondary my-3">Registrarse</h3>
            <form action="{{route('crearHabitacion')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="numero" placeholder="numero" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="piso" placeholder="piso" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="precio_noche" placeholder="precio_noche" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="descripcion" placeholder="descripcion" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="tipo" placeholder="tipo" class="form-control rounded-pill mx-3">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="estado" placeholder="estado" class="form-control rounded-pill mx-3">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary rounded-pill"
                        data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Guardar Habitacion" class="btn btn-primary rounded-pill">
                </div>
            </form>
        </div>
    </div>
@endsection