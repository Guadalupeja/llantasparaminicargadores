<?php

namespace App\Http\Controllers;

use App\Mail\MinicargadorLeadMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MinicargadorLeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:150'],
            'empresa' => ['nullable', 'string', 'max:150'],
            'tipo_llanta' => ['required', 'string', 'max:100'],
            'medida' => ['required', 'string', 'max:100'],
            'telefono' => ['required', 'string', 'max:50'],
            'correo' => ['required', 'email', 'max:150'],
            'mensaje' => ['nullable', 'string', 'max:2000'],
            'origen' => ['nullable', 'string', 'max:150'],
        ]);

        Mail::to('bsh@bombasellos.com.mx')->send(
            new MinicargadorLeadMail($validated)
        );

        return response()->json([
            'ok' => true,
            'message' => 'Gracias. En breve será contactado por el departamento de ventas.',
        ]);
    }
}