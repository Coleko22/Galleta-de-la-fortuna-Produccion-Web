<?php

namespace App\Http\Controllers;

use App\Models\GalletaAbierta;
use Illuminate\Support\Facades\Auth;


class HistorialController extends Controller
{
    public function index()
    {
        $galletas = GalletaAbierta::where('user_id', Auth::id())
            ->latest('abierta_en')
            ->paginate(10);

        return view('historial.index', ['galletas' => $galletas]);
    }
}
