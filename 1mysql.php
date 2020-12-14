<?php
//***protseduuriline***//
//sinu andmed
$db_server = 'localhost';
$db_andmebaas = 'muusikapood';
$db_kasutaja = 'alsaks';
$db_salasona = 'qwerty';
//ühendus andmebaasiga
$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);
//ühenduse kontroll
if(!$yhendus){
    die('Ei saa ühendust andmebaasiga');
}

//päring
$paring = 'SELECT * FROM album';
$valjund = mysqli_query($yhendus, $paring);
while($rida = mysqli_fetch_row($valjund)){
    //var_dump($rida);
    echo '<strong>Album: '.$rida[1].' - '.$rida[2].'</strong><br>';
    echo 'Aasta: '.$rida[3].'<br>';
    echo 'Hind: '.$rida[4].'<br><br>';
}
//päring2
$paring = 'SELECT * FROM album ORDER BY artist DESC';
$valjund = mysqli_query($yhendus, $paring);
while($rida = mysqli_fetch_row($valjund)){
    //var_dump($rida);
    echo '<strong>Album: '.$rida[1].' - '.$rida[2].'</strong><br>';
}
echo "<br><br>";
//päring3
echo "Väljastan 2000st uuemad!!"."<br>";
$paring = 'SELECT * FROM album WHERE aasta>2000';
$valjund = mysqli_query($yhendus, $paring);
while($rida = mysqli_fetch_row($valjund)){
    //var_dump($rida);
    echo '<strong>Album: '.$rida[1].' - '.$rida[2].'</strong><br>';
}

//päring 4
echo "<br><br>";
$paring = 'SELECT AVG(hind) AS "Keskmine hind", COUNT(*) AS "Albumeid kokku", SUM(hind) AS "Koguv22rtus" FROM album';
//mysql käsu saatmine andmebaasile
$valjund = mysqli_query($yhendus, $paring);
//väljastamine
while($rida = mysqli_fetch_assoc($valjund)){
    printf("Keskmine hind: %0.2f eur<br>", $rida['Keskmine hind']);
    printf("Albumeid kokku: %d tk<br>", $rida['Albumeid kokku']);
    printf("Hind kokku: %0.2f eur<br>", $rida['Koguv22rtus']);

}
echo "<br><br>";
//päring5
$paring = 'SELECT * FROM album WHERE aasta=(SELECT MIN(aasta) FROM album)';
$valjund = mysqli_query($yhendus, $paring);
while($rida = mysqli_fetch_row($valjund)){
    //var_dump($rida);
    echo '<strong>Vanim album: '.$rida[1].' </strong><br>';
}

//p2ring6
$paring = 'SELECT * FROM album WHERE hind>(SELECT AVG(hind) FROM album)';
$valjund = mysqli_query($yhendus, $paring);
while($rida = mysqli_fetch_row($valjund)){
    //var_dump($rida);
    echo '<strong>Keskmisest kallim: '.$rida[1].' </strong><br>';
}
echo "<br><br>";
mysqli_free_result($valjund);
mysqli_close($yhendus);

?>
<form method="post" action="">
<label for="cars" >Vali: </label>
<select id="cars" name="cars">
    <option value="artist" name="artist">Artist</option>
    <option value="album" name="album">Album</option>
</select><br>
    <label for="fname">Otsingus6na:</label>
    <input type="text" id="fname" name="otsi"><br>
    <input type="submit" name="submit">
</form>

<?php include('config.php');
$otsi = $_POST['otsi'] ??'';
$find = 'album';
$pos = strpos($otsi, $find);
$artist="";
$album="";
if(isset($_POST['submit'])){
    if(!empty($_POST['cars'])) {
        $selected = $_POST['cars'];

    if($selected==="album") {
        echo "Valisid otsinguks albumi"."<br>";
        if (strpos($otsi, 'album') !== false) {

        $paring = 'SELECT * FROM album WHERE album LIKE "'.$otsi.'"';
        $valjund = mysqli_query($yhendus, $paring);

        echo 'Otsingusõna: '.$otsi.'<br>';
        echo 'Vastused: <br>';
            while($rida = mysqli_fetch_assoc($valjund)){
                echo $rida['artist'].' - '.$rida['album'].' - '.$rida['aasta'].'<br>';
            }

        } else {
            echo "Sisestatud albumit ei leitud";
        }
    } else {
        echo "Valisid otsinguks artisti"."<br>";
        if (strpos($otsi, 'artist') !== false) {
            $paring = 'SELECT * FROM album WHERE artist LIKE "'.$otsi.'"';
            $valjund = mysqli_query($yhendus, $paring);

            echo 'Otsingusõna: '.$otsi.'<br>';
            echo 'Vastused: <br>';
            while($rida = mysqli_fetch_assoc($valjund)){
                echo $rida['artist'].' - '.$rida['album'].' - '.$rida['aasta'].'<br>';
            }

        } else {
            echo "Sisestatud artisti ei leitud";
        }
    }} else {
    echo 'Please select the value.';
}


}




?>