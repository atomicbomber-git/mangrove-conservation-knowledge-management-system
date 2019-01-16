<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;

class InformationController extends Controller
{
    public function index(Information $information) {
        return view('information.index', compact('information'));
    }

    public function edit(Information $information) {
        return view('information.edit', compact('information'));
    }

    public function update(Information $information) {
        $data = $this->validate(request(), [
            'title' => 'string|required',
            'content' => 'string|required'
        ]);

        $information->update($data);
    }
}
