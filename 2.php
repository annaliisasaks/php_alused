// Ulesanne 2; Anna-Liisa Saks; 26.11.2020
<?php
//muutujad
$arv1 = 3;
$arv2 = 33;
//tehted ja valjundatavad
$liitmine = $arv1+$arv2;
$liitm = "$arv1+$arv2=" . "$liitmine\n";
$lahutamine = $arv1-$arv2;
$lahutam = "$arv1-$arv2="."$lahutamine\n";
$korrutamine = $arv1*$arv2;
$korrutam = "$arv1*$arv2="."$korrutamine\n";
$jagamine = round($arv1/$arv2,2);
$jagam = "$arv1/$arv2="."$jagamine\n";
$jaak = $arv1%$arv2;
$jack = "$arv1%$arv2="."$jaak\n";


echo $liitm. $lahutam. $korrutam.$jagam.$jack;
//Teisendamine
$mm = 1234;
$cm = $mm/100;
$m = $mm/10000;
$break = "\n";

echo "Teisendame millimeetrid (1234) sentimeetriteks=".(round($cm,2).$break);
echo "Teisendame millimeetrid (1234) meetriteks=".(round($m,2).$break);


//Kolmnurk
$a = 2;
$b=3;
$c=4;

$alus = 4;
$korgus=5;

$umbermoot = round($a+$b+$c);
$pindala = round($alus*$korgus/2);

echo "Kui kolmnurga küljed on pikkustega 2, 3 ja 4, siis on
selle kolmnurga ümbermõõt ".$umbermoot.$break;
echo "Kui kolmnurga alus on 4 ja kõrgus 5, siis
on selle kolmnurga pindala ".$pindala;



