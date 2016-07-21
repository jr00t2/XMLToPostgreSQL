<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table = 'manufacturers';

    public static $filename = 'ManufacturerList.xml';

    protected $fillable = ["gvlcode", "firstname", "secondname", "thirdname", "street",
                            "countrycode", "zip", "location", "postbox", "phone",
                            "fax", "ifpiaccount"];

    public static function listFromXml() {
        $xml = simplexml_load_file('xml/ManufacturerList.xml', "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        $xmldata = $array["Manufacturers"]["Manufacturer"];
        $manufacturers = [];
        foreach($xmldata as $xml) {
            $manufacturer = [];
            $manufacturer['gvlcode'] = ($xml['GvlCode'] != null) ? $xml['GvlCode'] : "";
            $manufacturer['firstname'] = (!is_array($xml['Name1'])) ? $xml['Name1'] : "";
            $manufacturer['secondname'] = (!is_array($xml['Name2'])) ? $xml['Name2'] : "";
            $manufacturer['thirdname'] = (!is_array($xml['Name3'])) ? $xml['Name3'] : "";
            $manufacturer['street'] = (!is_array($xml['Street'])) ? $xml['Street'] : "";
            $manufacturer['countrycode'] = (!is_array($xml['CountryCode'])) ?  $xml['CountryCode'] : "";
            $manufacturer['zip'] = (!is_array($xml['Zip'])) ? $xml['Zip'] : "";
            $manufacturer['location'] = (!is_array($xml['Location'])) ? $xml['Location'] : "";
            $manufacturer['postbox'] = (!is_array($xml['Postbox'])) ? $xml['Postbox'] : "";
            $manufacturer['phone'] = (!is_array($xml['Phone'])) ? $xml['Phone'] :  "";
            $manufacturer['fax'] = (!is_array($xml['Fax'])) ? $xml['Fax'] : "";
            $manufacturer['ifpiaccount'] = (!is_array($xml['IfpiAccount'])) ? $xml['IfpiAccount'] : "";

            $manufacturers[] = $manufacturer;
        }
        return $manufacturers;
    }
}
