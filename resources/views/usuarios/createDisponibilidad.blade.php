@extends('layouts.dashboard')

@section('contenido')
<div class="back">
    <a class="btn btn-link" href="{{route('disponibilidad.index')}}">
        <i class="fas fa-arrow-left"></i>
        Volver
    </a>
</div>
<div class="title-contenido">
    <h2>Registrar</h2>
    <h1>Disponibilidad</h1>
</div>
<div class="content-dispo">
    <div class="register-dispo">
        @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form method="POST" action="{{ route('disponibilidad.store') }}">
            @csrf
            <div class="form-group">
                <label for="periodo">{{__('Periodo')}}</label>
                <select name="periodo" id="periodo" class="form-control" required>
                    <option value="">Seleccione el periodo</option>
                    @foreach($periodos as $periodo)
                    <option value="{{$periodo->id}}">Periodo {{$periodo->año}}-0{{$periodo->periodo}}</option>
                    @endforeach
                </select>
            </div>
            <table class="table table-ligth disponibilidad">
                <thead>
                    <tr>
                        <th scope="col">Jornada</th>
                        <th scope="col">Lunes</th>
                        <th scope="col">Martes</th>
                        <th scope="col">Miercoles</th>
                        <th scope="col">Jueves</th>
                        <th scope="col">Viernes</th>
                        <th scope="col">Sábado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">
                            07:00 am - 10:00 am
                        </th>
                        <td><input type="checkbox" class="form-check-input" id="11" name="check_11" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="12" name="check_12" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="13" name="check_13" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="14" name="check_14" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="15" name="check-15"></td>
                        <td><input type="checkbox" class="form-check-input" id="16" name="check_16" value="1"></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            10:00 am - 01:00 pm
                        </th>
                        <td><input type="checkbox" class="form-check-input" id="21" name="check_21" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="22" name="check_22" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="23" name="check_23" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="24" name="check_24" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="25" name="check_25" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="26" name="check_26" value="1"></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            01:00 pm - 06:00 pm
                        </th>
                        <td><input type="checkbox" class="form-check-input" id="31" name="check_31" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="32" name="check_32" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="33" name="check_33" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="34" name="check_34" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="35" name="check_35" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="36" name="check_36" value="1"></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            06:30 pm - 09:30 pm
                        </th>
                        <td><input type="checkbox" class="form-check-input" id="41" name="check_41" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="42" name="check_42" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="43" name="check_43" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="44" name="check_44" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="45" name="check_45" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="46" name="check_46" value="1"></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Todo el día
                        </th>
                        <td><input type="checkbox" class="form-check-input" id="51" name="check_51" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="52" name="check_52" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="53" name="check_53" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="54" name="check_54" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="55" name="check_55" value="1"></td>
                        <td><input type="checkbox" class="form-check-input" id="56" name="check_56" value="1"></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group buttons">
                <span></span>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    {{ __('Registrar') }}
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar disponibilidad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Una vez registre su disponibilidad, esta no se puede modificar.
                            A partir de esta información se realizara su carga academica.
                            Si requiere algún cambio, por favor hablar con el director del programa.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection