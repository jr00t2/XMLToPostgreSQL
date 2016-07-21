<?php

namespace App\Http\Controllers;

use App\Track;
use Illuminate\Http\Request;

use App\Http\Requests;

class TrackController extends Controller
{
    public function index() {
        $tracks = Track::paginate(15);

        return view('track.index', ['tracks' => $tracks]);
    }
}
