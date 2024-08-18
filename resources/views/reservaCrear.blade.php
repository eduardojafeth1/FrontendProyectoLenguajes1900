@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="card shadow" style="width: 30rem;">
            <h3 class="text-center text-secondary my-3">Crear Reserva</h3>
            <form action="{{route('crearReserva')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="fecha_inicio" placeholder="Fecha Inicio" class="form-control rounded-pill mx-3" required>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="fecha_fin" placeholder="Fecha Fin" class="form-control rounded-pill mx-3" required>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="dni" placeholder="DNI" class="form-control rounded-pill mx-3" required>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="cdg_habitacion" placeholder="Código Habitación" class="form-control rounded-pill mx-3" required>
                </div>

                <h5 class="my-3">Seleccione servicios adicionales:</h5>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="transporte" id="servicioTransporte" value="true">
                    <label class="form-check-label" for="servicioTransporte">
                        Transporte
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="lavanderia" id="servicioLavanderia" value="true">
                    <label class="form-check-label" for="servicioLavanderia">
                        Lavandería
                    </label>
                </div>
                <div id="lavanderiaOptions" class="mt-3" style="display:none;">
                    <h6>Lavandería</h6>
                    <div class="input-group mb-3">
                        <input type="text" name="cantidad_prendas" placeholder="Cantidad de Prendas" class="form-control rounded-pill mx-3">
                    </div>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="alimento" id="servicioAlimento" value="true">
                    <label class="form-check-label" for="servicioAlimento">
                        Alimento
                    </label>
                </div>
                <div id="alimentoOptions" class="mt-3" style="display:none;">
                    <h6>Alimento</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="desayuno" id="desayuno" value="true">
                        <label class="form-check-label" for="desayuno">
                            Desayuno
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="almuerzo" id="almuerzo" value="true">
                        <label class="form-check-label" for="almuerzo">
                            Almuerzo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cena" id="cena" value="true">
                        <label class="form-check-label" for="cena">
                            Cena
                        </label>
                    </div>
                </div>

                <div class="modal-footer mt-4">
                    <button type="button" class="btn btn-outline-primary rounded-pill"
                        data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Guardar Reserva" class="btn btn-primary rounded-pill">
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const lavanderiaOption = document.getElementById('lavanderiaOptions');
            const alimentoOption = document.getElementById('alimentoOptions');
            const lavanderiaCheckbox = document.getElementById('servicioLavanderia');
            const alimentoCheckbox = document.getElementById('servicioAlimento');

            lavanderiaCheckbox.addEventListener('change', function () {
                lavanderiaOption.style.display = this.checked ? 'block' : 'none';
            });

            alimentoCheckbox.addEventListener('change', function () {
                alimentoOption.style.display = this.checked ? 'block' : 'none';
            });
        });
    </script>
@endsection

