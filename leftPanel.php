<link rel="stylesheet" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&family=Roboto+Condensed:wght@500&family=Roboto+Slab&display=swap" rel="stylesheet">
    <div class="menuPanel">
<p><i class="fa-solid fa-user-tie"></i></p>
<?php
    session_start();
    echo "<p>".$_SESSION['usID']."</p>";
?>
<hr>
<a href="../Projekt/rejestracja.php"><input type="button" value="Rejestracja"></a>
<a href="../Projekt/main.php"><input type="button" value="Wylogowanie"></a>
<ul>
            <li><a href="../Projekt/dashboard.php">Strona główna</a></li>
            <li><a href="../Projekt/oddzialy.php"><i class="fa-solid fa-city"></i>Dane Oddziału</a></li>
            <li><a href="../Projekt/klienci.php"><i class="fa-solid fa-user-group"></i>Klienci serwisu</a></li>
            <li><a href="../Projekt/addEmplyee.php"><i class="fa-solid fa-person-praying"></i>Pracownicy serwisu</a></li>
            <li><a href="../Projekt/rejestracjaSprzetu.php">Rejestracja sprzetu</a></li>
            <li><a href="">Zgłoszenia</a></li>
            <li><a href="">Status naprawy</a></li>
        </ul>
</div>