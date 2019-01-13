<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mangrove;

class MangroveController extends Controller
{
    public function index()
    {
        $records = Mangrove::all()
            ->mapWithKeys(function ($record) {
                return [$record->key => $record->value];
            });

        return view('mangrove.index', compact('records'));
    }

    public function edit()
    {
        $records = Mangrove::all()
            ->mapWithKeys(function ($record) {
                return [$record->key => $record->value];
            });

        return view('mangrove.edit', compact('records'));
    }

    public function update()
    {
        $data = $this->validate(request(), [
            'title' => 'string|required',
            'content' => 'string|required'
        ]);

        foreach ($data as $key => $value) {
            Mangrove::where('key', $key)
                ->update(['value' => $value]);
        }
    }
}
