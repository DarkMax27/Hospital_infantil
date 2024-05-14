<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Models\Hospital;
use Illuminate\Validation\Rule;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        $hospitales = Hospital::all();
        return view('pacientes.create', compact('hospitales'));
    }

    // En tu controlador PacienteController

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'edad' => [
                'required',
                // Rule::notIn(['Ejemplo', 'de', 'valores', 'no', 'permitidos']), // Valores que no quieres permitir
                function ($attribute, $value, $fail) {
                    if (!is_numeric($value)) {
                        $fail('El campo '.$attribute.' debe ser un número.');
                    }
                },
            ],
            'sexo' => 'string|max:255',
            'fecha_nacimiento' => 'date',
            'ciudad_origen' => 'string|max:255',
            'fecha_inscripcion' => 'date',
            'hospital_id' => 'required|exists:hospitales,id',
            'nombre_del_tutor' => 'string|max:255',
            'telefono_del_tutor' => 'string|max:255',
            function ($attribute, $value, $fail) {
                if (!is_numeric($value)) {
                    $fail('El campo '.$attribute.' debe ser un número.');
                }
            },
        ]);
    
        Paciente::create($request->all());
    
        // Redirecciona a la página de índice de pacientes con un mensaje de éxito
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado exitosamente.');
    }
    


    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        $hospitales = Hospital::all();
        return view('pacientes.edit', compact('paciente', 'hospitales'));
    }
    
    public function update(Request $request, Paciente $paciente)
{
    $request->validate([
        'nombre_completo' => 'required',
        'edad' => 'required|integer', // Validación para asegurar que la edad sea un número entero
        'sexo' => 'required', // Se asume que el sexo es obligatorio, puedes ajustarlo según tus necesidades
        'fecha_nacimiento' => 'required|date', // Validación para asegurar que la fecha de nacimiento sea una fecha válida
        'ciudad_origen' => 'required',
        'fecha_inscripcion' => 'required|date',
        'hospital_id' => 'required|exists:hospitales,id', // Validación para asegurar que el hospital seleccionado existe en la tabla de hospitales
        'nombre_del_tutor' => 'required',
        'telefono_del_tutor' => 'required|numeric', // Validación para asegurar que el teléfono del tutor sea un número
    ]);

    $paciente->update($request->all());

    return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado exitosamente.');
}

    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}
