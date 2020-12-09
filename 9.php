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

echo '<form action="9.php" method="get">
        <label for="nimi">Sisesta nimi </label>
        <input type="text" name="nimi" id="nimi"><br>

        <input type="submit" value="Väljasta">
    </form>';

$nimi = $_GET['nimi']??'';

$nimi = ucfirst(strtolower($nimi));
if (isset($_GET['nimi'])){
if (strlen($_GET['nimi'])){
echo "Tere, ".$nimi.$break;
}}

$sona = "Stalker";
for ($i=0;$i<strlen($sona);$i++) {
    echo $sona[$i].".";
}

echo '<form action="9.php" method="get">
        <label for="ropp">Sisesta "Sa oled täielik noob" </label>
        <input type="text" name="ropp" id="ropp"><br>

        <input type="submit" value="Asenda">
    </form>';

$ropp = $_GET['ropp']??'';

$asendus = '****';
$otsitav = 'noob';
$nihe = 0;
$asenduse_algus = strpos($ropp, $otsitav, $nihe);
$asenduse_markide_arv = strlen($otsitav);
if (isset($_GET['ropp'])){
if (strlen($_GET['ropp'])) {
    echo substr_replace($ropp, $asendus, $asenduse_algus, $asenduse_markide_arv).$break;
}}

echo '<form action="9.php" method="get">
        <label for="ees">Eesnimi </label>
        <input type="text" name="ees" id="ees"><br>
        
        <label for="pere">Perenimi </label>
        <input type="text" name="pere" id="pere"><br>

        <input type="submit" value="Genereeri meiliaadress">
    </form>';

$ees = $_GET['ees']??'';
$pere = $_GET['pere']??'';

if (isset($_GET['ees']) || isset($_GET['pere'])){
if (strlen($_GET['ees']) || strlen($_GET['pere'])) {

    $ees = strtr($ees, ['ü'=> 'y', 'õ' => 'o', 'ö' => 'o', 'ä' => 'a', 'Õ' => 'o', 'Ö' => 'o', 'Ä' => 'a', 'Ü' => 'y']);
    $pere = strtr($pere, ['ü' => 'y', 'õ' => 'o', 'ö' => 'o', 'ä' => 'a', 'Õ' => 'o', 'Ö' => 'o', 'Ä' => 'a', 'Ü' => 'y']);

    echo strtolower($ees.".".$pere."@khk.ee");

}}


?>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>