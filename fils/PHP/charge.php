<?php
require_once "config.php";

if (isset($_POST['submit'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $amount = $_POST['amount'];
    $id_reservation = $_POST["id_reservation"];
    try {
        $creditCard = new Omnipay\Common\CreditCard([
            'number' => $_POST['cc_number'],
            'expiryMonth' => $_POST['expiry_month'],
            'expiryYear' => $_POST['expiry_year'],
            'cvv' => $_POST['cvv'],
        ]);

        $transactionId = rand(100000000, 999999999);

        $response = $gateway->authorize([
            'amount' => $_POST['amount'],
            'currency' => 'USD',
            'transactionId' => $transactionId,
            'card' => $creditCard,
        ])->send();

        if ($response->isSuccessful()) {
            echo $response->getMessage();
        } else {

            $transactionReference = $response->getTransactionReference();

            $response = $gateway->capture([
                'amount' => $_POST['amount'],
                'currency' => 'USD',
                'transactionReference' => $transactionReference,
            ])->send();

            $transaction_id = $response->getTransactionReference();

            $prefix = 'PAY';
            $length = 12;
            $randomPart = substr(uniqid(), - ($length - strlen($prefix)));
            $orderPaymentNumber = $prefix . $randomPart;




            $insert = $db->query("INSERT INTO payments(id_reservation,transaction_id, amount, currency, payment_status) VALUES('$id_reservation','$orderPaymentNumber', '$amount', 'DH', 'Non Paye')");

            if ($insert) {
                header("Location: successfully.php?id_reservation=$id_reservation");
            }
        }
    } catch (Exception $e) {

        header("Location: ../reservation.php?errorPaye=true&id_reservation=$id_reservation&prix=$amount");

        // echo $e->getMessage();
    }
}
