<?php
require "../dbbr/dbBroker.php";
require "../model/User.php";

session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $pass = $_POST['password'];


    $korisnik = new User(null, null, $uname, $pass);
    $odg = User::logInUser($korisnik, $conn);

    if ($odg->num_rows == 1) {
        echo
        `<script>
            console.log("Uspesno ste se prijavili.");
            </script>`;
        $_SESSION['user_id'] = $odg->fetch_array(1)['id'];
        header('Location: home.php');
        exit();
    } else {
        $err = "Pogresno korisnicko ime ili lozinka";
        echo
        `<script>
            console.log("Niste ste se prijavili.");
            </script>`;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../style/loginstyle.css">
</head>

<body>
    <section>
        <div class="imageBox">
            <img src="../image/budget.jpg">
        </div>
        <div class="contentBox">
            <div class="formBox">
                <h2>login</h2>
                <form method="POST" action="#">
                    <div class="inputBox">
                        <span>Korisnicko ime</span>
                        <input type="text" name="username" />
                    </div>
                    <div class="inputBox">
                        <span>Lozinka</span>
                        <input type="password" name="password" />
                    </div>
                    <div class="inputBox">
                        <label name="error" style="color: red"><?php if (isset($err)) echo ($err) ?></label>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Prijavi se" name="" />
                    </div>
                    <div class="inputBox">
                        <p>Nemate nalog? <a href="./registration.php">Registrujte se</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>