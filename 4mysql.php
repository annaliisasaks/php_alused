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

$paring = "SELECT arved.arve_nr, album.artist, album.album, klient.eesnimi, klient.perenimi
			FROM arved
			JOIN album ON arved.id=album.id 
			JOIN klient ON arved.id=klient.kliendi_id";

$valjund = mysqli_query($yhendus, $paring);
while($rida = mysqli_fetch_assoc($valjund)){
    echo 'Arve number: '.$rida['arve_nr'].'<br>';
    echo 'Eesnimi: '.$rida['eesnimi'].'<br>';
    echo 'Perenimi: '.$rida['perenimi'].'<br>';
    echo 'Toote nimetus: '.$rida['artist'].'-'.$rida['album'].'<br><br>';
}
