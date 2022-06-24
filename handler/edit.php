<?php

require "../dbbr/dbBroker.php";
require "../model/Transaction.php";
session_start();
if (
    isset($_POST['id']) && isset($_POST['title']) && isset($_POST['money'])
    && isset($_POST['date']) && isset($_POST['description']) && isset($_POST['category'])
) {
    $date = date('Y-m-d', strtotime($_POST['date']));
    $transaction = new Transaction($_POST['id'], $_POST['title'], $date, $_POST['description'], $_POST['money'], $_POST['category'], $_SESSION['user_id']);
    $status = $transaction->update($_POST['id'], $conn);

    if ($status) {
        echo 'Success';
    } else {
        echo $status;
        echo "Failed";
    }
}
