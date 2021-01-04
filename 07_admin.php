<h1>Salajane info</h1>
<p>Salainfo</p>
<?php
session_start();
if (!isset($_SESSION['tuvastamine'])) {
    header('Location: 07_login.php');
    exit();
}
?>

<form action="07_logout.php" method="post">
    <input type="submit" value="Logi välja" name="logout">
</form>
