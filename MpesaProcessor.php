<?php
require __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;

$mysqli = mysqli_connect("localhost", "root", "", "kandympesa");

// initializig variables

$fullname = "";
$price = "";
$item = "";
$phone = "";

if (isset($_POST['price'])) {
    // getting input from the form
    $fullname = mysqli_real_escape_string($mysqli, $_POST['fullname']);
    $item = mysqli_real_escape_string($mysqli, $_POST['product']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
    $paidamount = $_REQUEST['price'];
    $phone = $_REQUEST['phone'];

    if (empty($fullname) || empty($item) || empty($price)) {
        echo "<script>window.alert('Please fill in all the fields')</script>";
    } else {
        // insert items into the database
        $sql = "INSERT into payment(Fullname, Item, Price, phone) VALUES('$fullname', '$item', '$price', '$phone')";
        $res = mysqli_query($mysqli, $sql);
        if ($res) {
            echo "<script>window.alert('Records inserted successfully into the database')</script>";
            stkPush($paidamount, $phone);
        } else {
            echo "<script>window.alert('There was an error during the insertion to the database')</script>";
        }
    }
}
function lipaNaMpesaPassword()
{
    //timestamp
    $timestamp = Carbon::rawParse('now')->format('YmdHms');
    //passkey
    $passKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
    $businessShortCOde = 174379;
    //generate password
    $mpesaPassword = base64_encode($businessShortCOde . $passKey . $timestamp);

    return $mpesaPassword;
}


function newAccessToken()
{
    $consumer_key = "5JyjPGupH4k1QQido6tVnBc2VrcAwJS6";
    $consumer_secret = "DfxbRrwztjRbxRvm";
    $credentials = base64_encode($consumer_key . ":" . $consumer_secret);
    $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic " . $credentials, "Content-Type:application/json"));
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    $access_token = json_decode($curl_response);
    curl_close($curl);

    return $access_token->access_token;
}
function stkPhone($phone)
{

    $formatedPhone = substr($phone, 1); //726582228
    $code = "254";
    $phoneNumber = $code . $formatedPhone; //254726582228
}

function stkPush($paidamount, $phone)
{
    $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $curl_post_data = [
        'BusinessShortCode' => 174379,
        'Password' => lipaNaMpesaPassword(),
        'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
        'TransactionType' => 'CustomerPayBillOnline',
        'Amount' => $paidamount,
        'PartyA' => $phone,
        'PartyB' => 174379,
        'PhoneNumber' => 254742268757,
        'CallBackURL' => 'https://60a8b840129d.ngrok.io/callback',
        "AccountReference" => "VlmSystems",
        "TransactionDesc" => "Vehicle Leasing Charges"
    ];


    $data_string = json_encode($curl_post_data);


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . newAccessToken()));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    $curl_response = curl_exec($curl);
    print_r($curl_response);
}
