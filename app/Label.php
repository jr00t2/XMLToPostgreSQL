<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $table = 'labels';

    public static $filename = 'LabelList.xml';

    protected $fillable = array('labelId','labelcode', 'labelname', 'labelshortname', 'gvlmandant', 'musikherkunft');

    public static function listFromXml() {
        $xml = simplexml_load_file('xml/LabelList.xml', "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        $xmldata = $array["Labels"]["Label"];
        $labels = [];
        foreach($xmldata as $xml) {
            $label = [];
            $label['labelId'] = ($xml['ID'] != null) ?$xml['ID'] : "" ;
            $label['labelcode'] = $xml['Labelcode'];
            $label['labelname'] = $xml['Labelname'];
            $label['labelshortname'] = ($xml['Labelshortname'] != array()) ? $xml['Labelshortname'] : "";
            $label['gvlmandant'] = $xml['GvlMandant'];
            $label['musikherkunft'] = $xml['MusikHerkunft'];

            $labels[] = $label;
        }
        return $labels;
    }
}
