@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Patient Details</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $paciente->nombre_completo }}</td>
                            </tr>
                            <tr>
                                <th>Edad</th>
                                <td>{{ $paciente->edad }}</td>
                            </tr>
                            <tr>
                                <th>Sexo</th>
                                <td>{{ $paciente->sexo }}</td>
                            </tr>
                            <tr>
                                <th>Fecha de Nacimiento</th>
                                <td>{{ $paciente->fecha_nacimiento }}</td>
                            </tr>
                            <tr>
                                <th>Ciudad de Origen</th>
                                <td>{{ $paciente->ciudad_origen }}</td>
                            </tr>
                            <tr>
                                <th>Fecha de Inscripción</th>
                                <td>{{ $paciente->fecha_inscripcion }}</td>
                            </tr>
                            <tr>
                                <th>Hospital de Origen</th>
                                <td>{{ $paciente->hospital->nombre_del_hospital }}</td>
                            </tr>
                            <tr>
                                <th>Nombre del Tutor</th>
                                <td>{{ $paciente->nombre_del_tutor }}</td>
                            </tr>
                            <tr>
                                <th>Teléfono del Tutor</th>
                                <td>{{ $paciente->telefono_del_tutor }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('pacientes.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
