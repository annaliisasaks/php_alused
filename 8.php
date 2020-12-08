<?php
// Anna-Liisa Saks, ulesanne 8, 08.12.2020

$break = "\n";
date_default_timezone_set('Europe/Tallinn');
echo date('d.m.Y H:i T', time()).$break;

$birthDate = "13.05.1998";
//explode the date to get month, day and year
$birthDate = explode(".", $birthDate);
//get age from date or birthdate
$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
echo "Minu vanus on: " . $age.$break;

$cdate = mktime(0, 0, 0, 05, 31, 2021);
$today = time();
$difference = $cdate - $today;
if ($difference < 0) { $difference = 0; }
echo "Kooliaasta lõpuni on ". floor($difference/60/60/24)." päeva".$break;

echo "　　　　　　.　　•　　❆　　..·　　　　　　　.··　　
　　　　　　❅❆　　　　　　　　　　　　　　　•　❅·　❅　
　　　　　　　　　❅•　*·❅•　❆　　　　　　　　　　　　
　❆　·　　　　　　　　　　•·　　　.❆　*·　..　　　
　　　❆　　　　　　　.　　　•　❆　.　❅　　•　❅　　•
　　　　　　　　　　　　　　•.❆　　　　❆　　　.　❆　　
　.　　　　.　　　　　　　　　　　❆　　　　　　　　　　　
　•.　**❆　　　　•　　　　*　•　❅　　❆❅••　.　
　•　　·　　　　*　　.　❅　　　　　　　　　　　　　　　
　*　　　　　　❆❅ ⛄　❅　　　· 　*　　　•　　..　❆
";