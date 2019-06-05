<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    public function home(Request $request)
    {
        return Despesa::listarDespesas($request);
    }
}
