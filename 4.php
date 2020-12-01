<!-- Anna-Liisa Saks, ülesanne 4, 01.12.2020 -->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Anna-Liisa Saks</title>
</head>
<body>
<div class="container">
<h1>Hello, world!</h1>
<form action="4.php" method="get">
<label for="nr1">Sisesta esimene number</label>
<input type="number" name="nr1" id="nr1" ><br>

<label for="nr2">Sisesta teine number</label>
<input type="number" name="nr2" id="nr2" ><br>
    <input type="submit" value="Arvuta" name="arvuta"><br>
</form>
    <form action="4.php" method="get">
    <label for="vanus1">Sisesta oma vanus, sõber number 1 </label>
    <input type="number" name="vanus1" id="vanus1" ><br>
    <label for="vanus2">Sisesta oma vanus, sõber number 2 </label>
    <input type="number" name="vanus2" id="vanus2" ><br>

    <input type="submit" value="Võrdle">

</form>
    <form action="4.php" method="get">
        <label for="kulg1">Sisesta küljepikkus </label>
        <input type="number" name="kulg1" id="kulg1" ><br>
        <label for="kulg2">Sisesta küljepikkus </label>
        <input type="number" name="kulg2" id="kulg2" ><br>

        <input type="submit" value="Ruut või ristkülik?">

    </form>
    <form action="4.php" method="get">
        <label for="kp">Sisesta sünniaasta </label>
        <input type="date" name="kp" id="kp" ><br>
        <input type="submit" value="Juubeliaasta?">

    </form>
    <form action="4.php" method="get">
        <label for="kt">Sisesta kt punktide arv </label>
        <input type="number" name="kt" id="kt" ><br>
        <input type="submit" value="Tulemus">

    </form>


<?php


$arv1 = $_GET['nr1'] ?? '';
$arv2 = $_GET['nr2'] ?? '';
if (isset($_GET['nr1']) or isset($_GET['nr2'])) {
    if(strlen($_GET['nr1']) and strlen($_GET['nr2'])) {
        if ($arv2 == 0) {
            echo "Nulliga ei saa jagada!";
        } else {
            $jagamine = $arv1 / $arv2;
            echo "Kahe arvu jagatis on " . $jagamine;
        }
    } else {
        echo "Sisesta kõik andmed!";
    }
}


$vanus1 = $_GET['vanus1'] ?? '';
$vanus2 = $_GET['vanus2'] ?? '';

if (isset($_GET['vanus1']) or isset($_GET['vanus2'])) {
if (strlen($_GET['vanus1']) and strlen($_GET['vanus2'])) {

    if ($vanus1 > $vanus2) {
        echo "Esimene sõber on vanem.";
    } elseif ($vanus1 < $vanus2) {
        echo "Teine sõber on vanem.";
    } else {
        echo "Sõbrad on sama vanad.";
    }
} else {
    echo "Sisesta kõik andmed!";
}
}

$kulg1 = $_GET['kulg1'] ?? '';
$kulg2 = $_GET['kulg2'] ?? '';
if (isset($_GET['kulg1']) or isset($_GET['kulg2'])) {
    if (strlen($_GET['kulg1']) and strlen($_GET['kulg2'])) {

        if($kulg1==$kulg2) {
            echo "Ruut!";
            echo '<img alt="ruut" height="40px" width="auto" src="https://www.thecakedecoratingcompany.co.uk/images/the-cake-decorating-co-red-square-drum-cake-board-p9622-19420_image.jpg">';
        } else {
            echo "Ristkülik!";
            echo '<img alt="ristk" height="40px" width="auto" src="https://lh3.googleusercontent.com/proxy/3cIHYPgKJWkFndveA4zz8cz54ZWLfJ560Do6gzpqEnpdj8fsNhucSjxrUROhuMu-kLueRGqX1xw1G9uYWFZKfkI_NcWNHYMeOgFF">';
        }

    } else {
        echo "Sisesta kõik andmed!";
    }
}
$kp = $_GET['kp'] ?? '';
$curYear = date("Y");
$year = date("Y", strtotime($kp));
$vahe = $curYear-$year;

if (isset($_GET['kp'])) {
    if (strlen($_GET['kp'])) {
        if ($vahe %5 ==0 or $vahe %0 ==0){
            echo "Sel aastal on sinu juubel!";
        }   else {
        echo "Sel aastal ei ole sinu juubel!";
        }
    } else {
        echo "Sisesta kõik andmed!";
    }
}

$kt = $_GET['kt'] ?? '';
if (isset($_GET['kt'])){
    if (strlen($_GET['kt'])) {
    switch ($kt) {
        case ($kt > 10):
            echo 'SUPER!';
            break;
        case(5 <= $kt and $kt <= 9):
            echo 'TEHTUD!';
            break;
        default: echo 'KASIN!';

    }
    } else {
        echo "SISESTA OMA PUNKTID!";

}}



        ?>
</div>





<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>


