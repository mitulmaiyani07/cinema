<?php
if (session_id() === "")
    session_start();
require('../config.php');
$json = array();

ob_start();

$postData = json_encode($_POST['customerData']);

$endpoint = 'v1/clients/';

function callAPIService($method, $endpoint, $postData = '')
{
    $config = getAPIConfig();

    $headers = array(
        'Authorization: Bearer ' . $config['api_token'],
        'Content-Type: application/json',
        'Accept: application/json',
    );

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $config['api_url'] . $endpoint);

    if ($method == "POST") {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $jsonData = curl_exec($ch);

    return json_decode($jsonData);
}

function getAPIConfig()
{
    return array(
        'api_url' => "https://gate.reviopay.com/api/",
        'api_token' => "png4V112PIf3LFFJGICq0Y40ziJX8ZANFmnun48KYnHJGj05IgDYLpka1kRUmsBTtdTdIL6dS12swmkImiKy5A==",
    );
}

$sql = "SELECT * from users where id = " . $_SESSION['id'];
$user_result = $conn->query($sql);
$client_data = mysqli_fetch_assoc($user_result);
if (($client_data['client_id']) == "") {

    $clientObj = callAPIService('POST', $endpoint, $postData);

    $resultArr = (array)$clientObj;

    if (array_key_exists('__all__', $resultArr)) {

        $json['response'] = array(

            'isSuccess' => false,

            'errorMessage' => $resultArr['__all__'][0]->message,

            'code' => $resultArr['__all__'][0]->code
        );
    } else {
        $client_id = $resultArr['id'];
        $update_sql = "update users set client_id = '$client_id' where id = " . $_SESSION['id'];
        if (mysqli_query($conn, $update_sql)) {
            $json['response'] = array(

                'isSuccess' => true,

                'errorMessage' => null,

                'data' => $resultArr,

            );
        }
    }
} else {

    $json['response'] = array(

        'isSuccess' => true,

        'errorMessage' => null,

        'data' => array(
            'id' => $client_data['client_id'],
            'email' => $client_data['email']
        ),

    );
}

$json['content'] = ob_get_clean();

echo json_encode($json);

exit;
