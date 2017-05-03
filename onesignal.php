<?php

//function to send pushnotification
function sendMessage(){
    $content = array(
        "en" => 'Welcome to the P Hub.' //message to be send
        );

    $fields = array(
        'app_id' => "YOUR-APP-ID",
        'include_player_ids' => array("YOUR-PLAYER-ID"), //player id is device id
        'contents' => $content
    );

    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);

//initialize curl
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                               'Authorization: Basic MDJkMTFmZjQtYjQyOS00YjEwLWJkNWYtYzZiYWQzMjRkNjQ2'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

$response = sendMessage();
$return["allresponses"] = $response;
$return = json_encode( $return);

//Output
print("\n\nJSON received:\n");
print($return);
print("\n");
?>
