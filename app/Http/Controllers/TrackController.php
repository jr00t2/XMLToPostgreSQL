<?php

namespace App\Http\Controllers;

use App\Track;
use Illuminate\Http\Request;

use App\Http\Requests;

class TrackController extends Controller
{
    public function index(Request $request) {
        $search = $request->get('search');

        $tracks = Track::where('manr', 'like', "%$search%")->orWhere('track', 'like', "%$search%")->paginate(15);

        return view('track.index', ['tracks' => $tracks]);
    }
}
