<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="Zdarzenia.php" method="post">
        <label>
            Numer ISBN:
            <input type="text" name="numerISBN">
        </label><br>
        <label>
            Tytuł:
            <input type="text" name="tytul">
        </label><br>
        <label>
            Autor:
            <input type="text" name="autor">
        </label><br>
        <label>
            Data Wydania:
            <input type="date" name="dataWydania">
        </label><br>
        <label>
            Cena:
            <input type="number" name="cena">
        </label><br> 
        <label>
            Cena Promocyjna:
            <input type="number" name="cenaPromocyjna">
        </label><br>
        <label>
            Gatunek:
            <input type="text" name="gatunek">
        </label><br>
        <label>
            zdjecie:
            <input type="text" name="zdjecie">
        </label><br>
        <label>
            Ilość książek:
            <input type="text" name="iloscKsiazek">
        </label><br>
        <label>
            Wydawnictwo:
            <select name="wydawnictwo">
                <option value="opcja1" name="wydawnictwo">Wydawnictwo 1</option>
                <option value="opcja2" name="wydawnictwo">Wydawnictwo 2</option>
            </select>
        </label><br>
        <input type="submit" value="Wyślij">
    </form>

    <form action="wyszukiwanie.php" method='post'>
        <select name="gat">
            <?php
                define('host', 'localhost');
                define('user', 'root');
                define('pass', '');

                $conn = mysqli_connect(host,user,pass);
                $baza = mysqli_select_db($conn, 'michaladamskibazaspr');

                $kwerenda2=mysqli_prepare($conn, "SELECT gatunek FROM ksiazka");
                mysqli_stmt_execute($kwerenda2);
                mysqli_stmt_bind_result($kwerenda2, $gatunek); 
                        
                while(mysqli_stmt_fetch($kwerenda2)){
                    if($gatunek) {
                        echo "<option name='gat'>$gatunek</option>";
                    }
                } 
            ?>
            <input type="submit" value="Wyszukaj">
        </select>
    </form>
</body>
</html>