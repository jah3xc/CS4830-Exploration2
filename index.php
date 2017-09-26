<?php
require_once("DB_CONFIG.php");
$connection = pg_connect(CONNECTION_STRING);

if(!$connection) {
    die("No connection");
}

if(isset($_POST["type"])) {
	$insert = pg_prepare($connection, "in", "SELECT create_transaction($1,$2,$3)");
	pg_execute($connection, "in", array($_POST["type"], $_POST["amount"], $_POST["name"]));
	header("Refresh:0");
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
  <script>
	$(function() {
		$('label').addClass("control-label");
		$('input').addClass("form-control").attr("required", "required");
		$('button').addClass("btn btn-primary");
	});
  </script>
</head>

<body>

<h1 class="jumbotron text-center">PostgreSQL</h1>
<div class="container-fluid">
<div class="col-md-4">
    <form action="" method="POST" class="form">
	<label>Type</label>
	<input name="type" />
	<label>Amount</label>
	<input type="number" name="amount" />
	<label>Name</label>
	<input name="name" />
<br>
	<button type="submit">Submit</button>
    </form>
</div>
<div class="col-md-8">
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
</div>
</div>
</body>
</html>
