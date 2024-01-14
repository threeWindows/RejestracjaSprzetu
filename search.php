<?php

define('host', 'localhost');
define('user', 'root');
define('pass', '');

$conn=mysqli_connect(host, user, pass);
$baza=mysqli_select_db($conn, 'serwis3ct');

if(isset($_POST['search'])) {
    $search = $_POST['search'];

    $kwerenda=mysqli_prepare($conn, "SELECT * FROM sprzet WHERE nr_seryjny LIKE '%$search%' OR model LIKE '%$search%' OR producent LIKE '%$search%' OR kategoria LIKE '%$search%'");
    mysqli_stmt_execute($kwerenda);
    mysqli_stmt_bind_result($kwerenda, $id, $nrSeryjny, $producent, $model, $kategoria); 

    if($search == "") {
        $search = $nrSeryjny;
    }

    while(mysqli_stmt_fetch($kwerenda)){
        echo "<tr>";
        echo "<td>".$nrSeryjny."</td>"."<td>".$producent."</td>".
        "<td>".$model."</td>"."<td>".$kategoria."</td>";
        echo "</tr>";         
    }  
    
    mysqli_close($conn);
}
?>