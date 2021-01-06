<?php
$break = "\n";
class auto {
    var $varv;
    var $tootja;
    var $kiirus;
    function kiirendus() {
        for ($x=10; $x<=100; $x+=10) {
            echo "Kiirus: ".$x."\n";
        }
    }
}

$soiduk = new auto;
echo "Minu uus ".$soiduk ->tootja="audi"." on ".$soiduk ->varv="punane".$break;
$soiduk ->kiirendus();