<?php

namespace App\Http\Controllers;

use App\Label;
use Illuminate\Http\Request;

use App\Http\Requests;

class LabelController extends Controller
{
    public function index(Request $request) {
        $search = (int)$request->get('search');

        $labels = Label::where('labelId', 'like', "%$search%")->paginate(15);

        return view('label.index', ['labels' => $labels]);
    }
}
