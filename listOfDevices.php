<?php
    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');

    $conn=mysqli_connect(host, user, pass);
    $baza=mysqli_select_db($conn, 'serwis3ct');

    $kwerenda=mysqli_prepare($conn, "SELECT * FROM sprzet");
    mysqli_stmt_execute($kwerenda);
    mysqli_stmt_bind_result($kwerenda, $id, $nrSeryjny, $producent, $model, $kategoria);

    while(mysqli_stmt_fetch($kwerenda)){
        echo $kategoria;
    }
    mysqli_close($conn);
?>