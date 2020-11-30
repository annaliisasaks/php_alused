<?php
//lisab vormist saadud andmed muutujasse
$alus = $_GET['alus1'];
$alus2 = $_GET['alus2'];
$korguss = $_GET['korgus'];
$summa = $alus+$alus2;
$pindala = round($summa/2 * $korguss,1) ;
$romb = $_GET['romb'];
echo "Trapetsi pindala on: ".$pindala. "<br>";
echo "Rombi ümbermõõt on: ".round($romb*4,1);
