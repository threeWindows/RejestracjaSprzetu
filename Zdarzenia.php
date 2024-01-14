<?php
    session_start();

    define('host', 'localhost');
    define('user', 'root');
    define('pass', '');

    $conn = mysqli_connect(host,user,pass);
    $baza = mysqli_select_db($conn, 'michaladamskibazaspr');

    $numerISBN = $_POST['numerISBN'];
    $tytul = $_POST['tytul'];
    $autor = $_POST['autor'];
    $dataWydania = $_POST['dataWydania'];
    $cena = $_POST['cena'];
    $cenaPromocyjna = $_POST['cenaPromocyjna'];
    $gatunek = $_POST['gatunek'];
    $zdjecie = $_POST['zdjecie'];
    $iloscKsiazek = $_POST['iloscKsiazek'];

    $wydawnictwo = $_POST['wydawnictwo'];

    $kwerenda = mysqli_prepare($conn, "INSERT INTO ksiazka VALUES(null,?,?,?,?,?,?,?,?,?)");
    mysqli_stmt_bind_param($kwerenda, 'sssdiissi', $numerISBN, $tytul, $autor, $dataWydania, $cena, $cenaPromocyjna, $gatunek, $zdjecie, $iloscKsiazek);
    mysqli_stmt_execute($kwerenda);

    $wyd = mysqli_prepare($conn, "INSERT INTO wydawnictwo VALUES(null,?,?,?,?,?)");
    mysqli_stmt_bind_param($wyd, 'sssss', $wydawnictwo, 'wydawnictwo@gmail.com', 'ulica 13', 'miasto', $numerISBN);
    mysqli_stmt_execute($wyd);

    if(mysqli_stmt_affected_rows($kwerenda)==1){
        header("Location: ../Projekt/michaladamskispr.php");
    }else{
        echo "Blad";
    }
    
?>