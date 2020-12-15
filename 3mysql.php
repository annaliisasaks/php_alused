<?php
include('config.php');


    //päring
$paring = 'SELECT * FROM album';
$valjund = mysqli_query($yhendus, $paring);
while($rida = mysqli_fetch_row($valjund)){
    //var_dump($rida);
    echo '<strong>Album: '.$rida[1].' - '.$rida[2].'</strong><br>';
    echo 'Aasta: '.$rida[3].'<br>';
    echo 'Hind: '.$rida[4].'<br><br>';
}
?>
<h2>Uue albumi lisamine</h2>
<form action="GET" method="get">
    <table>
        <tr><td>Artist: </td><td><input type="text" name="artist" required></td></tr>
        <tr><td>Album:</td><td> <input type="text" name="album" required></td></tr>
        <tr><td>Aasta: </td><td><input type="number" name="aasta" value="2000" min="1900" max="2099" required></td></tr>
        <tr><td>Hind: </td><td><input type="number" name="hind" value="1" min="1" max="100" step="0.1" required></td></tr>
        <tr><td><input type="reset" value="Tühjenda"></td><td><input type="submit" value="LISA ALBUM"></td></tr>
    </table>
</form>

<?php
if (!empty($_GET['artist']) && !empty($_GET['album']) && !empty($_GET['aasta']) &&  !empty($_GET['hind']) ) {
    $artist = htmlspecialchars(trim($_GET['artist']));
    $album = htmlspecialchars(trim($_GET['album']));
    $aasta = htmlspecialchars(trim($_GET['aasta']));
    $hind = htmlspecialchars(trim($_GET['hind']));
    //päring
    $paring = "INSERT INTO album(artist,album,aasta,hind) VALUES ('".$artist."','".$album."','".$aasta."','".$hind."')";
    $valjund = mysqli_query($yhendus, $paring);
    //päringu vastuste arv
    $tulemus = mysqli_affected_rows($yhendus);
    if ($tulemus == 1) {
        echo "Kirje edukalt lisatud";
    } else {
        echo "Kirjet ei lisatud";
    }
    //ühenduse sulgemine
    mysqli_close($yhendus);
}
?>
<table border="1">
    <?php
    //päring
    $paring = 'SELECT * FROM album';
    $valjund = mysqli_query($yhendus, $paring);
    while($rida = mysqli_fetch_assoc($valjund)){
        echo '<tr>
				<td>'.$rida['artist'].'</td>
				<td>'.$rida['album'].'</td>
				<td>'.$rida['aasta'].'</td>
				<td><a href="'.$_SERVER['PHP_SELF'].'?id='.$rida["id"].'">kustuta</a></td>
				<td><a href="muuda.php?id='.$rida["id"].'">muuda</a></td>
			</tr>';
    }
    if(!empty($_GET['id'])){
        //kustutamise päringud
        $id = $_GET['id'];
        $kustuta_paring = "DELETE FROM album WHERE id='$id'";
        $kustuta_valjund = mysqli_query($yhendus, $kustuta_paring);
        if($kustuta_valjund){
            echo "Rida kustutatud!";
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$_SERVER['PHP_SELF'].'">';
        } else {
            echo "Viga kustutamisel!";
        }
    }
    //ühenduse sulgemine
    mysqli_close($yhendus);
    ?>
</table>

<?php
//haarame aadressiribalt ID, et täita väljad
if(empty($_GET['id'])){
    die('Sihtmärk jäi valimata!');
} else {
    $id = $_GET['id'];
//väljastamise päring
    $paring = "SELECT * FROM album WHERE id='$id'";
    $valjund = mysqli_query($yhendus, $paring);
    $rida = mysqli_fetch_assoc($valjund);
    ?>
    <h2>Albumi muutmine</h2>
    <form action="" method="post">
        <table>
            <tr><td>Artist: </td><td><input type="text" name="artist" required value="<?php echo $rida['artist']; ?>"></td></tr>
            <tr><td>Album:</td><td> <input type="text" name="album" required value="<?php echo $rida['album']; ?>"></td></tr>
            <tr><td>Aasta: </td><td><input type="number" name="aasta" value="<?php echo $rida['aasta']; ?>" min="1900" max="2099" required></td></tr>
            <tr><td>Hind: </td><td><input type="number" name="hind" value="<?php echo $rida['hind']; ?>" min="1" max="100" step="0.01" required></td></tr>
            <tr><td><input type="reset" value="Tühjenda"></td><td><input type="submit" value="MUUDA"></td></tr>
        </table>
    </form>
    <?php
}



?>

