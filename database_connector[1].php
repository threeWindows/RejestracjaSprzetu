<?php


define('host', 'localhost');
define('user', 'root');
define('pass', '');
$connection = mysqli_connect(host, user, pass);
$baza = mysqli_select_db($connection, 'serwis3ct');
$kwerenda = "SELECT nazwa_od, ulica_od, numer_domu_od, telefon_o, email_o FROM Oddzialy";
$wyniki = mysqli_query($connection, $kwerenda);

/*
    a) mysqli_fetch_row() -> odwołanie do atrybutów poprzez numer
    b) mysqli_fetch_assoc()
    c) mysqli_fetch_array()
*/

while($wiersz = mysqli_fetch_array($wyniki))
{
    echo $wiersz['nazwa_od'].", na ulicy: ".$wiersz[1]."<br>";
}

mysqli_free_result($wyniki);
mysqli_close($connection);


?>