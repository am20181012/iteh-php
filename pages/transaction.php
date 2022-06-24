<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" type="text/css" href="../style/loginstyle.css">
</head>

<body>
    <?php
    require '../navigation/navbar.php';
    ?>
    <section>
        <div class="imageBox">
            <img src="../image/budget.jpg">
        </div>
        <div class="contentBox">
            <div class="formBox">
                <h2>Dodaj transakciju</h2>
                <form>
                    <div class="inputBox">
                        <span>Naziv</span>
                        <input type="text" name="" />
                    </div>
                    <div class="inputBox">
                        <span>Iznos</span>
                        <input type="text" name="" />
                    </div>
                    <div class="inputBox">
                        <span>Datum</span>
                        <input type="date" name="" />
                    </div>
                    <div class="inputBox">
                        <span>Opis</span>
                        <textarea type="text" name=""></textarea>
                    </div>
                    <div class="inputBox">
                        <span>Kategorija</span>
                        <select name="category">
                            <option value="1">prihodi</option>
                            <option value="2">hrana</option>
                            <option value="3">racuni</option>
                            <option value="4">zabava</option>
                            <option value="5">kuca</option>
                            <option value="6">ostalo</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Dodaj" name="" />
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>