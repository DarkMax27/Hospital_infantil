@extends('layouts.app')

@section('content')
<x-navbars.nav-auth titlePage="Pacientes" />

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Pacientes
                        <a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-sm float-end">Agregar Nuevo Paciente</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre Completo</th>
                                    <th>Edad</th>
                                    <th>Sexo</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Ciudad de Origen</th>
                                    <th>Fecha de Inscripción</th>
                                    <th>Hospital de Origen</th>
                                    <th>Nombre del Tutor</th>
                                    <th>Teléfono del Tutor</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pacientes as $paciente)
                                    <tr>
                                        <td>{{ $paciente->nombre_completo }}</td>
                                        <td>{{ $paciente->edad }}</td>
                                        <td>{{ $paciente->sexo }}</td>
                                        <td>{{ $paciente->fecha_nacimiento }}</td>
                                        <td>{{ $paciente->ciudad_origen }}</td>
                                        <td>{{ $paciente->fecha_inscripcion }}</td>
                                        <td>{{ $paciente->hospital->nombre_del_hospital }}</td>
                                        <td>{{ $paciente->nombre_del_tutor }}</td>
                                        <td>{{ $paciente->telefono_del_tutor }}</td>
                                        <td>
                                            <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST">
                                                <div style="display: flex; flex-direction: column; gap: 5px;">
                                                    <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info btn-sm">Ver</a>
                                                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este paciente?')">Eliminar</button>
                                                </div>
                                            </form>
                                        </td>                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
