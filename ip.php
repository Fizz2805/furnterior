<?php
require_once 'vendor/autoload.php'; // replace with the path to your MaxMind library
use GeoIp2\Database\Reader;

// get the user's IP address
echo $ipAddress = $_SERVER['REMOTE_ADDR'];

// open the MaxMind GeoIP2 database and get the user's country code
$reader = new Reader('path/to/GeoIP2-Country.mmdb'); // replace with the path to your GeoIP2 database
$country = $reader->country($ipAddress)->country->isoCode;

$allowedCountries = array('US', 'CA', 'GB', 'AU'); // replace with your list of allowed countries

if (!in_array($country, $allowedCountries)) {
    // display an error message and prevent the user from proceeding
    echo 'We\'re sorry, but we don\'t currently deliver to your country. Please contact customer support for more information.';
   
} else{ echo'Yes'; }

?>