<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        //eventualmente questo to() potrebbe essere specificato nel file env, come fatto da Florian, così che dati privati non vengano pubblicati
        Mail::to("giuliano.plrimavera@gmail.com")->send(new SendNewMail($data));

    }
}
