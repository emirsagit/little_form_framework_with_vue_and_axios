<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create()
    {
        return view('welcome', [
            'forms', Form::all()
        ]);
    } 

    public function store(Request $request)
    {
        Form::create($request->validate([
            'name' => 'required',
            'body' => 'required',
        ]));
        
        return with(['message' => 'project created']);
    } 
}
