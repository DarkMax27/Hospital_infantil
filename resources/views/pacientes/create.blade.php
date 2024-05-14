@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add New Patient</div>
                <div class="card-body">
                    <form action="{{ route('pacientes.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre_completo">Nombre Completo</label>
                            <input type="text" name="nombre_completo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="edad">Edad</label>
                            <input type="number" name="edad" class="form-control @error('edad') is-invalid @enderror">
                            @error('edad')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <input type="text" name="sexo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ciudad_origen">Ciudad de Origen</label>
                            <input type="text" name="ciudad_origen" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fecha_inscripcion">Fecha de Inscripción</label>
                            <input type="date" name="fecha_inscripcion" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="hospital_id">Hospital de Origen</label>
                            <select name="hospital_id" class="form-control">
                                @foreach($hospitales as $hospital)
                                    <option value="{{ $hospital->id }}">{{ $hospital->nombre_del_hospital }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre_del_tutor">Nombre del Tutor</label>
                            <input type="text" name="nombre_del_tutor" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telefono_del_tutor">Teléfono del Tutor</label>
                            <input type="number" name="telefono_del_tutor" class="form-control @error('telefono_del_tutor') is-invalid @enderror">
                            @error('telefono_del_tutor')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
