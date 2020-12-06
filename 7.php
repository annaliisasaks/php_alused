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
<?php
$break = "<br>";

// tervitus
function tervitus(){
    echo "Tere päiksekesekene!";
}
echo tervitus().$break.$break;

// uudiskiri

function uudiskiri() {
    echo '<form action="7.php" method="get">
        <label for="kiri">Liitu uudiskirjaga </label>
        <input type="text" name="kiri" id="kiri" ><br>

        <input type="submit" value="Liitu">
    </form>';
}

echo uudiskiri().$break;


// k-nimi ja email
function kasutaja($nimi) {
    $break = "<br>";
    echo strtolower($nimi).$break;
    echo strtolower($nimi)."@hkhk.edu.ee".$break;
    echo "Kood: ".rand(1000000,9999999).$break;
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'.$break;
    echo 'Kood2: '.substr(str_shuffle($permitted_chars), 6, 7).$break;
}
error_reporting( 0);

echo kasutaja(ALSakS);

// arvud

echo '<form action="7.php" method="get">
        <label for="nr1">Vali esimene number </label>
        <input type="number" name="nr1" id="nr1" ><br>

        <label for="nr2">Vali teine number </label>
        <input type="number" name="nr2" id="nr2" ><br>
        
        <label for="nr3">Samm </label>
        <input type="number" name="nr3" id="nr3" ><br>
        <input type="submit" value="Arvujada">
    </form>';

$nr1 = $_GET['nr1']??'';
$nr2 = $_GET['nr2']??'';
$nr3 = $_GET['nr3']??'';

function jada($nr1,$nr2,$nr3) {
    if($nr3 >0) {
    for($y=$nr1;$y<=$nr2;$y += $nr3) {
        echo $y."<br>";
    }}

}
echo jada($nr1,$nr2,$nr3);

// ristkuliku pindala

echo '<form action="7.php" method="get">
        <label for="alus">Ristküliku alus </label>
        <input type="number" name="alus" id="alus" ><br>

        <label for="korgus">Kõrgus </label>
        <input type="number" name="korgus" id="korgus" ><br>
        
        <input type="submit" value="Arvuta pindala">
    </form>';

$alus = $_GET['alus']??'';
$korgus = $_GET['korgus']??'';

function pindala($alus, $korgus) {
    echo "Pindala on ".$alus*$korgus."<br>";
}

echo pindala($alus,$korgus);

// isikukood

echo '<form action="7.php" method="get">
        <label for="kood">Isikukood </label>
        <input type="number" name="kood" id="kood" ><br>
        
        <input type="submit" value="Submit">
    </form>';

$kood = $_GET['kood']??'';

function kood($kood) {
if (isset($_GET['kood'])) {
if(strlen($_GET['kood'])) {
    if(strlen($kood) == 11) {
        echo "Isikukood on õige pikkusega. "."<br>";
        if (substr($kood,0,1) == 3 || substr($kood,0,1) == 5) {
            echo "Sa oled mees"."<br>";
        } else {
            echo "Sa oled naine"."<br>";
        }
        echo "Sinu sünniaeg on: ".substr($kood, 5, 2).".".substr($kood, 3, 2).".".substr($kood, 1, 2)."<br>";


    } else {
        echo "Isikukood on vale pikkusega"."<br>";
    }
}}}

echo kood($kood);

// head motted

function mote() {
    $alus = array("alus1", "alus2", "alus3");
    $oeldis = array("oeldis1", "oeldis2", "oeldis3");
    $sihitis = array("sihitis1", "sihitis2", "sihitis3");

    $nr1 = rand(0,2);
    $nr2 = rand(0,2);
    $nr3 = rand(0,2);
      echo $alus[$nr1]." ".$oeldis[$nr2]." ".$sihitis[$nr3]."<br>";

}
echo mote();


?>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>