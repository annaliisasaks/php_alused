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
<form action="12.php" method="get">
    <label for="start">Stardi aeg (hh:mm) </label>
    <input type="text" name="start" id="start" ><br>

    <label for="fin">Lõpu aeg (hh:mm) </label>
    <input type="text" name="fin" id="fin" ><br>
    <input type="submit" value="Arvuta">
</form>

<?php
$start = $_GET['start'] ??'';
$fin = $_GET['fin']??'';
if (isset($_GET['start']) or isset($_GET['fin'])) {
if(strlen($_GET['start']) and strlen($_GET['fin'])) {
    if(strlen($_GET['start'])<5 and strlen($_GET['fin'])<5) {
    echo "Sisesta vähemalt 5 sümboli pikkune aeg.";
    } else {
        echo gmdate("H:i", strtotime($fin) - strtotime($start));
    }

} else{
    echo "Sisesta ikka ajad ka!";
}
}

$mehi="";
$Mpalk=0;
$Msuurim=0;
$naisi="";
$Npalk=0;
$Nsuurim=0;
$file = file('tootajad.csv');
$break = '<br>';
for($i = 1; $i < count($file); $i++) {
    if (array_values(array_unique(explode(';', $file[$i])))[1] == "m"){
        $mehi ++;
        $Mpalk += intval(array_values(array_unique(explode(';', $file[$i])))[2]);
        if(array_values(array_unique(explode(';', $file[$i])))[2] > $Msuurim) {
            $Msuurim = array_values(array_unique(explode(';', $file[$i])))[2];
        }
    } else {
        $naisi ++;
        $Npalk += intval(array_values(array_unique(explode(';', $file[$i])))[2]);
        if(array_values(array_unique(explode(';', $file[$i])))[2] > $Nsuurim) {
            $Nsuurim = array_values(array_unique(explode(';', $file[$i])))[2];
        }
    }
}
echo "Mehi on: ".$mehi.$break."Naisi on: ".$naisi.$break;
echo "Meeste palk kokku on: ".$Mpalk.$break."Naiste palk kokku on: ".$Npalk.$break;
echo "Meeste suurim palk on: ".$Msuurim.$break."Naiste suurim palk on: ".$Nsuurim.$break;
echo "Meeste keskmine on: ".$Mpalk/$mehi.$break."Naiste keskmine on: ".$Npalk/$naisi.$break;



?>



<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>