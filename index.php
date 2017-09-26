<?php
require_once("DB_CONFIG.php");
$connection = pg_connect(CONNECTION_STRING);

if(!$connection) {
    die("No connection");
}
$query = pg_prepare($connection, "query", "SELECT * FROM transaction");
$query = pg_execute($connection, "query", array());
$result = pg_fetch_all($query);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Exploration 2: PostgreSQL</title>
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>

<body>

<h1 class="jumbotron text-center">PostgreSQL</h1>
<div class="container" style="max-height:600px;overflow:auto;border:solid .5px;">
    <table class="table">
        <tr>
            <th>Type</th>
            <th>Amount</th>
            <th>Name</th>
        </tr>
        <?php
        foreach($result as $row) {
            echo "<tr>";
            foreach($row as $val) {
                echo "<td>" . $val . "</td>";
            }
            echo "</tr>";
        }
        ?>

    </table>
</div>

</body>
</html>