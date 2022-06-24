<?php

require "../dbbr/dbBroker.php";
require "../model/Transaction.php";

if (isset($_POST['deleted_id'])) {
    $transaction = new Transaction($_POST['deleted_id']);
    $status = $transaction->deleteById($conn);
    if ($status) {
        echo 'Success';
    } else {
        echo "Failed";
    }
}
