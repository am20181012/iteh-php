<?php

require "../dbbr/dbBroker.php";
require "../model/Transaction.php";

session_start();

if (
    isset($_POST['title']) && isset($_POST['money'])
    && isset($_POST['date']) && isset($_POST['description']) && isset($_POST['category'])
) {
    //postavljanje datuma u format koji je dat u bazi
    $date = date('Y-m-d', strtotime($_POST['date']));
    $transaction = new Transaction(null, $_POST['title'], $date, $_POST['description'], $_POST['money'], $_POST['category'], $_SESSION['user_id']);
    $status = Transaction::insert($transaction, $conn);

    if ($status) {
        echo 'Success';
    } else {
        echo $status;
        echo "Failed";
    }
}
