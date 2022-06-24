<?php
require "../dbbr/dbBroker.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../style/homestyle.css">
</head>

<body>
    <?php
    require '../navigation/navbar.php';
    ?>

    <div class="main-container">
        <div class="search">
            <input id="searchbar" class="searchbar" type="text" name="searchbar" placeholder="Pretraga..." />
        </div>
        <div class="container">
            <div class="card">
                <div class="preview">
                    <h6>money</h6>
                    <h2>100 RSD</h2>
                    <a href="#">22/06/2022</a>
                </div>
                <div class="info">
                    <h6>tracker</h6>
                    <h2>Naziv transakcije</h2>
                    <p class="p-trunc">Opis transakcije koja je dodata ng elit.
                        Doloribus maxime explicabo voluptates fuga ipsam? S
                        landitiis. Nihil eius tempora aspernatur porro architecto.</p>
                    <button id="btn-edit" class="btn">Izmeni</button>
                    <button id="btn-delete" class="btn">Izbrisi</button>

                </div>
            </div>


            <div class="card">
                <div class="preview">
                    <h6>money</h6>
                    <h2>102021 RSD</h2>
                    <a href="#">22/06/2022</a>
                </div>
                <div class="info">
                    <h6>tracker</h6>
                    <h2>Naziv transakcije</h2>
                    <p class="p-trunc">Opis transakcije koja je dodata</p>
                    <button id="btn-edit" class="btn">Izmeni</button>
                    <button id="btn-delete" class="btn">Izbrisi</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>