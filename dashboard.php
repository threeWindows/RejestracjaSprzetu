<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&family=Roboto+Condensed:wght@500&family=Roboto+Slab&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <?php
      include_once('../Projekt/leftPanel.php');
    ?>
    <div class="main-panel">
        <form action="dashboard.php" method="post">
          <input type="text" name="search" id="search">
          <input type="submit" value="">
        </form>
    </div>
    <div class="dept-data" style="margin-left: 300px;">
      <table>
        <tr>  
          <th>Nr Seryjny</th><th>Producent</th><th>Model</th><th>Kategoria</th>
        </tr>  
          <?php
            define('host', 'localhost');
            define('user', 'root');
            define('pass', '');

            $conn=mysqli_connect(host, user, pass);
            $baza=mysqli_select_db($conn, 'serwis3ct');
            
            if(!isset($_POST['search'])) {
              $kwerenda=mysqli_prepare($conn, "SELECT * FROM sprzet");            
              mysqli_stmt_execute($kwerenda);
              mysqli_stmt_bind_result($kwerenda, $id, $nrSeryjny, $producent, $model, $kategoria); 
  
              
                while(mysqli_stmt_fetch($kwerenda)){
                  echo "<tr class='element'>";
                  echo "<td>".$nrSeryjny."</td>"."<td>".$producent."</td>".
                  "<td>".$model."</td>"."<td>".$kategoria."</td>";
                  echo "</tr>";           
                }
            }
            else if(isset($_POST['search'])) {

              $search = $_POST['search'];
          
              if($search == "") {
                $kwerenda=mysqli_prepare($conn, "SELECT * FROM sprzet");

                mysqli_stmt_execute($kwerenda);
              mysqli_stmt_bind_result($kwerenda, $id, $nrSeryjny, $producent, $model, $kategoria); 
  
              
                while(mysqli_stmt_fetch($kwerenda)){
                  echo "<tr class='element'>";
                  echo "<td>".$nrSeryjny."</td>"."<td>".$producent."</td>".
                  "<td>".$model."</td>"."<td>".$kategoria."</td>";
                  echo "</tr>";           
                }

              } else {
                $kwerenda=mysqli_prepare($conn, "SELECT * FROM sprzet WHERE nr_seryjny LIKE '%$search%' OR model LIKE '%$search%' OR producent LIKE '%$search%' OR kategoria LIKE '%$search%'");
                mysqli_stmt_execute($kwerenda);
                mysqli_stmt_bind_result($kwerenda, $id, $nrSeryjny, $producent, $model, $kategoria); 

                  while(mysqli_stmt_fetch($kwerenda)){
                    echo "<tr class='element'>";
                    echo "<td>".$nrSeryjny."</td>"."<td>".$producent."</td>".
                    "<td>".$model."</td>"."<td>".$kategoria."</td>";
                    echo "</tr>";         
                  }
              }  
            }

            mysqli_close($conn);
          ?>
        </table>
        </div>
</body>
<script src="dashboard.js">
  
</script>
</html>