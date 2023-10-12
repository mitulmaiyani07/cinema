<?php
if (session_id() === "")
    session_start();
require('../config.php');
$json = array();

ob_start();

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

$clientId = $_POST['client_id'];

$amount = $_POST['amount'];

$package = $_POST['package'];

$purchaseData = array(
    'client_id' => $clientId,
    'brand_id' => 'ab71c088-df8d-44a4-ac48-869705ae5e9a',
    'purchase' => array(
        'currency' => 'INR',
        'products' => array(
            array(
                'name' => 'Cinema - Booking',
                'price' => $amount * 100,
            )
        ),
    ),
    'payment_method_whitelist' => array("visa", "mastercard", "maestro", ),
    'skip_capture' => false,
    'success_redirect' => 'http://localhost/cinema/account.php?payment=success',
    'failure_redirect' => 'http://localhost/cinema/account.php?payment=failed',
);

$postData = json_encode($purchaseData);

$endpoint = 'v1/purchases/';

$clientObj = callAPIService('POST', $endpoint, $postData);

$resultArr = (array) $clientObj;

if (array_key_exists('__all__', $resultArr)) {

    $json['response'] = array(

        'isSuccess' => false,

        'errorMessage' => $resultArr['__all__'][0]->message,

        // 'code' => $resultArr['__all__'][0]->code
    );
} else {

    $json['response'] = array(

        'isSuccess' => true,

        'errorMessage' => null,

        'data' => $resultArr,

    );
}

$json['content'] = ob_get_clean();

echo json_encode($json);

exit;