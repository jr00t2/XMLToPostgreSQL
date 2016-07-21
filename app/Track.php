<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $table = 'tracks';

    public static $filename = 'TrackList.xml';

    protected $fillable = ["manr", "track", "labelcode", "label", "isrc",
        "catalogno", "ean", "release_date", "composer"];

    public static function listFromXml() {
        $xml = simplexml_load_file('xml/TrackList.xml', "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        unset($json);
        $xmldata = $array["Tracks"]["Track"];
        $tracks = [];
        foreach($xmldata as $xml) {
            $track = [];
            $track['manr'] = ($xml['TRK_MANR'] != null) ? $xml['TRK_MANR'] : "";
            $track['track'] = (!is_array($xml['TRK_TRACK'])) ? $xml['TRK_TRACK'] : "";

            $track['labelcode'] = (!is_array($xml['LBL_LABELCODE'])) ? $xml['LBL_LABELCODE'] : "";
            $track['labelcode'] = ($track['labelcode'] == "-") ? "" : $track['labelcode'];

            $track['label'] = (!is_array($xml['LBL_LABEL'])) ? $xml['LBL_LABEL'] : "";

            $track['isrc'] = (!is_array($xml['TRK_ISRC'])) ? $xml['TRK_ISRC'] : "";
            $track['isrc'] = ($track['isrc'] == "-") ? "" : $track['isrc'];

            $track['catalogno'] = (!is_array($xml['TRK_CATALOGNO'])) ?  $xml['TRK_CATALOGNO'] : "";
            $track['catalogno'] = ($track['catalogno'] == "-") ? "" : $track['catalogno'];

            $track['ean'] = (!is_array($xml['TRK_EAN'])) ? $xml['TRK_EAN'] : "";
            $track['ean'] = ($track['ean'] == "-") ? "" : $track['ean'];

            $track['release_date'] = (!is_array($xml['TRK_RELEASE_DATE'])) ? $xml['TRK_RELEASE_DATE'] : "";
            $track['composer'] = (!is_array($xml['TRK_COMPOSER'])) ? $xml['TRK_COMPOSER'] : "";
            $tracks[] = $track;
        }
        return $tracks;
    }
}
