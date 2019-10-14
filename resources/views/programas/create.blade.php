@extends('layouts.dashboard')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="mt-4">

                <form method="post" action="{{route('programas.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupcodigoInput">C&oacute;digo</label>
                        <input type="text" class="form-control" id="formGroupcodigoInput" name="snies"
                               placeholder="C&oacute;digo">
                    </div>
                    <div class="form-group">
                        <label for="formGroupNombreInput">Nombre</label>
                        <input type="text" class="form-control" id="formGroupNombreInput" name="nombre"
                               placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="formGroupDescripcionInput">Descripci&oacute;n</label>
                        <input type="text" class="form-control" id="formGroupDescripcionInput" name="descipcion"
                               placeholder="Descripci&oacute;n">
                    </div>
                    <div class="form-group">
                        <label for="formGroupDuracionInput">Duraci&oacute;n</label>
                        <input type="number" step="1" class="form-control" id="formGroupDuracionInput" name="duracion"
                               placeholder="Duraci&oacute;n">
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Directores</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="id_director">
                                <option selected>Escoja un director</option>
                                @foreach($directores as $director)
                                    <option value="{{$director->id}}">
                                        {{$director->identificacion}} - {{$director->nombres}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Modalidades</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="id_modalidad">
                                <option selected>Escoja una modalidad</option>
                                @foreach($modalidades as $modalidad)
                                    <option value="{{$modalidad->id}}">
                                        {{$modalidad->nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Facultades</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="id_facultad">
                                <option selected>Escoja una facultad</option>
                                @foreach($facultades as $facultad)
                                    <option value="{{$facultad->id}}">
                                        {{$facultad->nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Tipo de programa</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="id_tipo_programa">
                                <option selected>Escoja un tipo de programa</option>
                                @foreach($tipoProgramas as $tipoPrograma)
                                    <option value="{{$tipoPrograma->id}}">
                                        {{$tipoPrograma->nombre}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">
                        crear
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
