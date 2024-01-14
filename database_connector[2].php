<?php


define('host', 'localhost');
define('user', 'root');
define('pass', '');
$connection = mysqli_connect(host, user, pass);
$baza = mysqli_select_db($connection, 'serwis3ct');
$ulica = 'Krakowska';
$kwerenda = mysqli_prepare($connection, "SELECT nazwa_od, ulica_od, numer_domu_od, telefon_o, email_o FROM Oddzialy WHERE ulica_od=?");
mysqli_stmt_bind_param($kwerenda, 's', $ulica); //s tyczy sie pytajnika w kwerendzie i może być ich weicej np. 'ssid' -> string, string, int, double
mysqli_stmt_execute($kwerenda);
// stmt -> statement
mysqli_stmt_bind_result($kwerenda, $w1, $w2, $w3, $w4, $w5); // zmienne do których bedzie przekazywana kazda wartosc kazdego zbioru
while(mysqli_stmt_fetch($kwerenda))
{
    echo $w1.", email:  ".$w5;
}
mysqli_close($connection);


?>