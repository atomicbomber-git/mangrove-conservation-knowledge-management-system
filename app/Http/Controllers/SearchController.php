<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        return view('search');
    }

    public function processSearch()
    {
        $data = $this->validate(request(), [
            'keyword' => 'required|string'
        ]);

        return redirect("https://scholar.google.co.id/scholar?as_q=$data[keyword]&as_epq=&as_oq=&as_eq=&as_occt=any&as_sauthors=&as_publication=&as_ylo=&as_yhi=&hl=en&as_sdt=0%2C5");
    }
}
