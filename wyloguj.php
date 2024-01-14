<?php

session_start();
if(isset($_SESSION['usID']))
{
    // echo "treść tylko dla zalogowanych uzytkowaników";
    // echo "<br>";
    // echo $_SESSION['usID'];
    //wylogowanie
    session_unset(); //usuniecie danych z sesji
    session_destroy(); //usuniecie samej sesji
    header('location: main.php');
}
else{
    echo "brak uprawnień";
}

?>