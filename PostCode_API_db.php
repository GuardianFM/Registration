<?php

//echo lookuppostcode('e174sa');


function lookuppostcode($postcode) {
    $postcode = str_replace(" ", "", $postcode);
    $key = '7HmH9q1YIE-7V9gREezAqA21738&expand=true';
    $request = 'https://api.getAddress.io/v2/uk/' . $postcode . '?api-key=' . $key;
    $response = file_get_contents($request);
    $response = json_decode($response, true);

    $returnData = array();

    $returnData['lat'] = $response['Latitude'];
    $returnData['lon'] = $response['Longitude'];
    $returnData['totalAddresses'] = count($response['Addresses']);
    $addressArray = explode(',', $response['Addresses'][0]);

    $returnData['locality'] = $addressArray[4];
    $returnData['city'] = $addressArray[5];
    $returnData['county'] = $addressArray[6];
    $returnData['addresses'] = array();
    foreach ($response['Addresses'] as $address) {
        $addressArray = explode(',', $address);
        $fullAddress = '';
        foreach ($addressArray as $item) {
            if ($item != ' ') {
                $fullAddress .= $item . "\n";
            }
        }
        $fullAddress = trim($fullAddress, '\n');
        $returnData['addresses'][] = array(
            'line1' => $addressArray[0],
            'line2' => $addressArray[1],
            'line3' => $addressArray[2],
            'line4' => $addressArray[3],
            'locality' => $addressArray[4],
            'city' => $addressArray[5],
            'county' => $addressArray[6],
            'fullAddress' => $fullAddress,
        );
    }
    return $returnData;
}

//Example usage:
$data = lookuppostcode($_GET['postcode']);
//echo "<b>Latitude: </b>" . $data['lat'] . "</br>\n";
//echo "<b>Longitude: </b>" . $data['lon'] . "</br>\n";
//echo "<b>Locality: </b>" . $data['locality'] . "</br>\n";
//echo "<b>City: </b>" . $data['city'] . "</br>\n";
//echo "<b>County: </b>" . $data['county'] . "</br>\n";
//echo "<b>Number of addresses returned: </b>" . $data['totalAddresses'] . "</br>\n";
//echo "</br>\n";
//echo '<b>Addresses: </b>' . "</br>\n";
//$i = 1;
//
//foreach ($data['addresses'] as $address) {
//    echo "<b>Address No " . $i . "</b>" . "</br>\n";
//    echo "Line 1: " . $address['line1'] . "</br>\n";
//    echo "Line 2: " . $address['line2'] . "</br>\n";
//    echo "Line 3: " . $address['line3'] . "</br>\n";
//    echo "Line 4: " . $address['line4'] . "</br>\n";
//    echo "Locality: " . $address['locality'] . "</br>\n";
//    echo "City: " . $address['city'] . "</br>\n";
//    echo "County: " . $address['county'] . "</br>\n";
//    echo "Full Address: " . $address['fullAddress'] . "</br>\n";
//    echo '<br>';
//    $i++;
//}
echo json_encode($data);

//print_r($arr);
