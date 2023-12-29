<?php

require 'vendor/autoload.php';

use GeoIp2\Database\Reader;

 
function getCountryCodeFromIP($ipAddress) {
$reader = new Reader(  DIR_STORAGE . 'vendor/geolite2/GeoLite2-Country.mmdb');

try {
    $record = $reader->country($ipAddress);
    $countryCode = $record->country->isoCode;
    return $countryCode;
} catch (Exception $e) {
    return "Error: " . $e->getMessage();
}

}