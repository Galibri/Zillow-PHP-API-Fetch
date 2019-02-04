<?php
/**
 * Reutrn Data
 * Version 1.0
 */
if(isset($_REQUEST['address'])) {

    $zwsid = "X1-ZWz184l7ayj0uj_6frtk";
    $prefixurl = "http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=";

    $address = urlencode($_REQUEST['address']);

    $city = urlencode($_REQUEST['city']);
    $state = urlencode($_REQUEST['state']);

    $csz = $city."%2C+".$state;

    $query = $prefixurl . $zwsid . "&address=" . $address . "&citystatezip=" . $csz . "&rentzestimate=true";

    // $s = simplexml_load_file(trim($query));


    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $query);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
      $data = curl_exec($ch);
      curl_close($ch);

    $s = simplexml_load_string($data);



    if($s) {
        echo json_encode($s);
    } else {
        echo 'failed';
    }
}

?>