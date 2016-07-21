<?php

namespace App\Http\Controllers;

use App\Label;
use App\Manufacturer;
use App\Track;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function import() {
        \ini_set('MAX_EXECUTION_TIME', -1);
        \ini_set('memory_limit','1048M');
        DB::enableQueryLog();
        $this->importLabels();
        $this->importManufacturers();
        $this->importTracks();
    }

    public function importLabels() {
        $labels = Label::listFromXml();
        foreach ($labels as $label) {
            $dbLabel = Label::where('id' , $label["id"])->first();
            if(!$dbLabel) {
                $label = new Label($label);
                $label->save();
            } else {
                $dbLabel->update($label);
            }
        }
    }

    public function importManufacturers() {
        $manufacturers = Manufacturer::listFromXml();
        foreach ($manufacturers as $manufacturer) {
            $dbmanufacturer = Manufacturer::where('gvlcode',$manufacturer["gvlcode"])->first();
            if(!$dbmanufacturer) {
                $manufacturer = new Manufacturer($manufacturer);
                $manufacturer->save();
            } else {
                $dbmanufacturer->update($manufacturer);
            }
        }
    }

    public function importTracks() {
        $tracks = Track::listFromXml();
        foreach ($tracks as $track) {
            $dbTrack = Track::where('manr',$track["manr"])->first();
            if(!$dbTrack) {
                $track = new Track($track);
                $track->save();
            } else {
                $dbTrack->update($track);
            }
        }
    }


}
