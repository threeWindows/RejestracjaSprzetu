<?php

session_start();
if(isset($_SESSION['usID']))
{
    echo "Treść widoczna tylko dla zalogowanego uzytkownika";
    echo $_SESSION['usID'];
    //wylogowanie
    session_unset();; //usuniecie wszystkich danych sesji
    session_destroy(); //usuneicie samej sesji
}
else
{
    echo "Brak uprawnień";
}

?>