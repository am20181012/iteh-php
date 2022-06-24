<?php
require "../dbbr/dbBroker.php";
require "../model/User.php";

session_start();

$emailError = $usernameError = $passError = $passCmfError = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $passCmf = $_POST['passwordCmf'];

    $result = true;
    //VALIDACIJA
    if (empty($email)) {
        $emailError = 'Obavenzno polje';
        $result = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Neispravan format email adrese';
        $result = false;
    } else if (User::checkEmeil($email, $conn)) {
        $emailError = 'Korisnik sa datom email adresom vec postoji';
        $result = false;
    }

    if (empty($uname)) {
        $usernameError = 'Obavenzno polje';
        $result = false;
    } else if (User::checkUsername($uname, $conn)) {
        $usernameError = 'Korisnik sa datim korisnickim imenom vec postoji';
        $result = false;
    }

    if (empty($pass)) {
        $passError = 'Obavenzno polje';
        $result = false;
    }

    if (empty($passCmf)) {
        $passCmfError = 'Obavenzno polje';
        $result = false;
    }

    if ($pass !== $passCmf) {
        $passCmfError = 'Potvrdite lozinku';
        $result = false;
    }

    if ($result) {
        $korisnik = new User(null, $email, $uname, $pass);
        $result = User::registerUser($korisnik, $conn);
        $_SESSION['user_id'] = $result;
        header('Location: home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" type="text/css" href="../style/pagestyle.css">
</head>

<body>
    <section>
        <div class="imageBox">
            <img src="../image/budget.jpg">
        </div>
        <div class="contentBox">
            <div class="formBox">
                <h2>registracija</h2>
                <form method="POST" action="#" id="addUser">
                    <div class="inputBox">
                        <span>Email</span>
                        <input type="email" name="email" />
                        <p name="emailError" style="color: red"><?php if (isset($emailError)) echo ($emailError) ?></p>
                    </div>
                    <div class="inputBox">
                        <span>Korisnicko ime</span>
                        <input type="text" name="username" />
                        <p name="usernameError" style="color: red"><?php if (isset($usernameError)) echo ($usernameError) ?></p>
                    </div>
                    <div class="inputBox">
                        <span>Lozinka</span>
                        <input type="password" name="password" />
                        <p name="passwordError" style="color: red"><?php if (isset($passError)) echo ($passError) ?></p>
                    </div>
                    <div class="inputBox">
                        <span>Potvrdi lozinku</span>
                        <input type="password" name="passwordCmf" />
                        <p name="" style="color: red"><?php if (isset($passCmfError)) echo ($passCmfError) ?></p>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Registruj se" name="" />
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>