@extends('layouts.app')
@section('content')
    <div class="container">
        @if ($Reservas)
            <h2 class="my-5">Reservas registradas:</h2>
            <table class="table mt-5 table-striped">
                <thead class="table-success">
                    <tr>
                        <th scope="col">Fecha de Inicio</th>
                        <th scope="col">Fecha fin</th>
                        <th scope="col">dni</th>
                        <th scope="col">cdg_habitacion</th>
                        <th scope="col">transporte</th>
                        <th scope="col">desayuno</th>
                        <th scope="col">almuerzo</th>
                        <th scope="col">cena</th>
                        <th scope="col">cantidadPrendas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva['cdg_reserva'] }}</td>
                            <td>{{ implode('-', $reserva['fecha_inicio']) }}</td>
                            <td>{{ implode('-', $reserva['fecha_fin']) }}</td>
                            <th>{{ $reserva['dni'] }}</th>
                            <td>{{ $reserva['cdg_habitacion'] }}</td>
                            <td>{{ $reserva['transporte'] }}</td>
                            <td>{{ $reserva['desayuno'] }}</td>
                            <td>{{ $reserva['almuerzo'] }}</td>
                            <td>{{ $reserva['cena'] }}</td>
                            <td>{{ $reserva['cantidadPrendas'] }}</td>
                            <td>
                                <a href="" class="btn btn-primary rounded-pill">Editar</a>
                                <a href="" class="btn btn-danger rounded-pill">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="" class="btn btn-primary rounded-pill border-0" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Hacer Reserva</a>
        @else
            <h2>No hay registro</h2>
        @endif
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Reserva</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('guardarReserva')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="marca" placeholder="Marca de la aeronave"
                                class="form-control mx-3">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="asientosPrimeraClase" placeholder="Asientos Primera Clase"
                                class="form-control mx-3">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="asientosPremium" placeholder="Asientos Premium" class="form-control mx-3">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="asientosBasicos" placeholder="Asientos Basicos" class="form-control mx-3">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Guardar Aeronave" class="btn btn-primary rounded-pill">
                        </div>  
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection