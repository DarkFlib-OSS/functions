<?php

namespace App;
use GeoIp2\Database\Reader;

/**
 * Class Handler
 * @package App
 */
class Handler
{
    /**
     * @param $data
     * @return
     */
    public function handle($data) {
        echo json_encode($this->geoIPLookup(trim($data)));
    }

    protected function geoIPLookup($_ip)
    {
        $_reader = new Reader('/home/app/function/GeoLite2-City.mmdb');
 
            try // & get geoip info
            {
                $_record = $_reader->city($_ip);
 
                $_geoIPData=array(
                    'ip' => $_ip,
                    'country' => $_record->country->name,
                    'isocode' => $_record->country->isoCode,
                    'region' => $_record->mostSpecificSubdivision->name,
                    'city' => $_record->city->name,
                    'postcode' => $_record->postal->code,
                    'latitude' => $_record->location->latitude,
                    'longitude' => $_record->location->longitude,
                    'googlemap' => 'https://maps.google.com/?q='. $_record->location->latitude. ','. $_record->location->longitude
                );
            }
            catch (\Exception $e)
            {
                $_geoIPData=array(
                    'ip' => $_ip,
                    'country' => 'Not Found',
                    'isocode' => 'Not Found',
                    'region' => 'Not Found',
                    'city' => 'Not Found',
                    'postcode' => 'Not Found',
                    'latitude' => 'Not Found',
                    'longitude' => 'Not Found',
                    'googlemap' => 'Not Found',
                    'exception' => $e->getMessage()
                );
            }
 
        unset($_reader);
 
        return ($_geoIPData);
 
    }



}
