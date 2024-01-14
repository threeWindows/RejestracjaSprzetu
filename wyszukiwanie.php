<?php
define('host', 'localhost');
define('user', 'root');
define('pass', '');

$conn = mysqli_connect(host,user,pass);
$baza = mysqli_select_db($conn, 'michaladamskibazaspr');

$gat = $_POST['gat'];

$kwerenda3=mysqli_prepare($conn, "SELECT NrISBN cena FROM ksiazka WHERE gatunek = '$gat'");

while(mysqli_stmt_fetch($kwerenda3)) {
    echo $cena;
}


?>