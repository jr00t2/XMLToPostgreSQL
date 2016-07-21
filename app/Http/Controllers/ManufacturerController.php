<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;

use App\Http\Requests;

class ManufacturerController extends Controller
{
    public function index(Request $request) {
        $search = $request->get('search');

        $manufacturers = Manufacturer::where('gvlcode', 'like', "%$search%")->paginate(15);

        return view('manufacturer.index', ['manufacturers' => $manufacturers]);
    }
}
