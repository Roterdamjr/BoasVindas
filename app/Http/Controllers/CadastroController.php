<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function edit(){  
        return view('edit' );
    }

    public function show(){  
        return view('show' );
    }
}
