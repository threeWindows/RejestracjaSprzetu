<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        include_once('../Projekt/leftPanel.php');
    ?>

<div class="main-panel">
        <div class="form-container">
        <h2>Rejestracja Sprzetu</h2>
        <form action="addDevice.php" method="post">
            <fieldset>
                <label for="numerSeryjny">Numer seryjny:</label>
                <input type="text" id="numerSeryjny" name="numerSeryjny" required>
                <label for="producent">Producent:</label>
                <input type="text" id="producent" name="producent" required>
                <label for="model">model:</label>
                <input type="text" id="model" name="model" required>
                <label for="ketegoria">Kategoria:</label>
                <input type="text" id="kategoria" name="kategoria">
            </fieldset>
        <button type="submit">Dodaj urzadzenie</button>
    </form>
  </div>
    
</body>
</html>