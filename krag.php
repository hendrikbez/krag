<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<!DOCTYPE html>
<html>

<head>
<?php include 'layouts/body.php'; ?>
<div id="layout-wrapper">
<?php include 'layouts/menu.php'; ?>

<link href="./assets/css/googleapi.css" rel="stylesheet" />
 <!--datatable css--   add this from 80-95-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

    <?php include 'layouts/head-css.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Eenhede</title>
    <style>
  body {
  text-align: center;
}
table {
    
  font-family: 'Comic Sans MS', cursive, sans-serif;
  border-collapse: separate;
  border-spacing: 10px;
  width: 70%;
  margin: auto;
  margin-top: 100px;
  border: 2px solid #ddd;
  font-size: 18px;
  font-weight: bold;
  color: #00FF00;
  
  border-color: purple;
}

th, td {
  border: 1px solid #ddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #800080;
}


tr:nth-child(odd) {
  background-color: #800080;
}




th {
  background-color: #4CAF50;
  color: white;
}
form {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin-bottom: 10px;
}
form > * {
  margin-right: 10px;
}
label {
display: inline-block;
width: 100px;
text-align: right;
margin-top: 30px;
}

input[type="date"], input[type="number"], input[type="submit"] {
width: 150px;
padding: 5px;
border-radius: 12px;
border: 1px solid #ccc;
font-size: 14px;
margin-top: 20px;
}


h1 {
  margin-bottom: 20px;
}
.sparkle-button-red {
  background-color: red;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 12px;
  cursor: pointer;
  transition: background-color 0.5s ease;
font-weight: bold;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 14px;
margin: 4px 2px;
width: 120px;
margin-top: 20px;


}

.sparkle-button-blue {
  background-color: blue;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.5s ease;
 
font-weight: bold;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 14px;
margin: 4px 2px;
border-radius: 5px;
width: 120px;
margin-top: 20px;


}

.sparkle-button-red:hover {
  background-color: pink;
}

.sparkle-button-blue:hover {
  background-color: lightblue;
}
</style>

</head>
<?php include 'layouts/body.php'; ?>
<!-- Begin page --><div id="layout-wrapper">
<?php include 'layouts/menu.php'; ?>
<body>

    <h1 style="margin-top: 70px;">•·.·''·.·• Voeg inligting by •·.·''·.·</h1>
    
    <div style="display: flex; justify-content: center; align-items: center;">
  <div style="border: 2px solid lime; padding: 10px; height: 100px; width: 200px; margin: 10px; display: table;">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: table-cell; vertical-align: middle;">
      <label for="datum" style="display: block; margin: auto; text-align: center;">Datum:</label>
      <input type="date" name="datum" required style="display: block; margin: auto; text-align: center;">
      <label for="koop" style="display: block; margin: auto; text-align: center;">Koop:</label>
      <input type="number" min="0" step="0.1" name="koop" style="display: block; margin: auto; text-align: center;">
      <label for="ontvang" style="display: block; margin: auto; text-align: center;">Ontvang:</label>
      <input type="number" min="0" step="0.1" name="ontvang" required style="display: block; margin: auto; text-align: center;">
      <input type="submit" name="submit1" value="Koop Krag" class="sparkle-button-red">
    </form>
  </div>
  <div style="border: 2px solid lime; padding: 10px; height: 100px; width: 200px; margin: 10px; display: table; margin-top: 69px">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="display: table-cell; vertical-align: middle;">
      <label for="datum" style="display: block; margin: auto; text-align: center;">Datum:</label>
      <input type="date" name="datum" required style="display: block; margin: auto; text-align: center;">
      <label for="beskikbaar" style="display: block; margin: auto; text-align: center;">Beskikbaar:</label>
      <input type="number" min="0" step="0.1" name="beskikbaar" required style="display: block; margin: auto; text-align: center;">
      <input type="submit" name="submit2" value="Gebruik" class="sparkle-button-blue">
    </form>
  </div>
</div>

    <div>
  <label for="last-beskikbaar"></label>
  <span id="last-beskikbaar-value"></span>
</div>

   
<?php include 'layouts/head-main.php'; ?>
<?php include 'layouts/customizer.php'; ?>  <!--add this also 153-154 before script-->
<?php include 'layouts/vendor-scripts.php'; ?>			
    <?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kripto";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form 1 is submitted
if (isset($_POST['submit1'])) {
    $datum = $_POST['datum'];
    echo "The date submitted in form 1 is: " . $datum; // add this line
    $koop = $_POST['koop'];
    $ontvang = $_POST['ontvang'];
    $koste = $koop / $ontvang;
    $beskikbaar_query = "SELECT Beskikbaar FROM eenhede ORDER BY Id DESC LIMIT 1";
    $beskikbaar_result = $conn->query($beskikbaar_query);
    $beskikbaar_previous = $beskikbaar_result->fetch_assoc()['Beskikbaar'];
    $beskikbaar = $beskikbaar_previous + $ontvang;
    $gebruik = 0;

    $sql = "INSERT INTO eenhede (Datum, Beskikbaar, Gebruik, Koop, Ontvang, Koste)
  VALUES ('$datum', '$beskikbaar', '$gebruik', '$koop', '$ontvang', '$koste')";


    if ($conn->query($sql) === true) {
        echo "<h2>Entry 1 added successfully</h2>";
    } else {
        echo "<h2>Error: " . $sql . "<br>" . $conn->error . "</h2>";
    }
}

// Check if form 2 is submitted
if (isset($_POST['submit2'])) {
    $datum = $_POST['datum'];
    echo "The date submitted in form 2 is: " . $datum; // add this line
    $beskikbaar = $_POST['beskikbaar'];
    $beskikbaar_query = "SELECT Beskikbaar FROM eenhede ORDER BY Id DESC LIMIT 1";
    $beskikbaar_result = $conn->query($beskikbaar_query);
    $beskikbaar_previous = $beskikbaar_result->fetch_assoc()['Beskikbaar'];
    $gebruik = $beskikbaar_previous - $beskikbaar;
    $koop = 0;
    $ontvang = 0;
    $koste = 0;

    $sql = "INSERT INTO eenhede (Datum, Beskikbaar, Gebruik, Koop, Ontvang, Koste)
  VALUES ('$datum', '$beskikbaar', '$gebruik', '$koop', '$ontvang', '$koste')";

    if ($conn->query($sql) === true) {
        echo "<h2>Entry 2 added successfully</h2>";
    } else {
        echo "<h2>Error: " . $sql . "<br>" . $conn->error . "</h2>";
    }
}

// Calculate average usage
$gebruik_query = "SELECT AVG(Gebruik) AS AvgGebruik FROM eenhede";
$gebruik_result = $conn->query($gebruik_query);
$avg_gebruik = $gebruik_result->fetch_assoc()['AvgGebruik'];


// Get the last "Beskikbaar" value
$last_beskikbaar_query = "SELECT Beskikbaar FROM eenhede ORDER BY Id DESC LIMIT 1";
$last_beskikbaar_result = $conn->query($last_beskikbaar_query);
if ($last_beskikbaar_result->num_rows > 0) {
    $last_beskikbaar_row = $last_beskikbaar_result->fetch_assoc();
    $last_beskikbaar = $last_beskikbaar_row['Beskikbaar'];
} else {
    $last_beskikbaar = 0;
}


// Calculate total of "Koop" column
$sql_koop = "SELECT SUM(Koop) AS TotalKoop FROM eenhede";
$result_koop = $conn->query($sql_koop);
$row_koop = $result_koop->fetch_assoc();
$total_koop = $row_koop["TotalKoop"];

// Calculate total of "Ontvang" column
$sql_ontvang = "SELECT SUM(Ontvang) AS TotalOntvang FROM eenhede";
$result_ontvang = $conn->query($sql_ontvang);
$row_ontvang = $result_ontvang->fetch_assoc();
$total_ontvang = $row_ontvang["TotalOntvang"];

// Calculate total of "Gebruik" column
$sql_gebruik = "SELECT SUM(Gebruik) AS TotalGebruik FROM eenhede";
$result_gebruik = $conn->query($sql_gebruik);
$row_gebruik = $result_gebruik->fetch_assoc();
$total_gebruik = $row_gebruik["TotalGebruik"];

echo '<div style="display:flex; flex-direction:column; align-items:center;">
   <div style="border: 1px solid black; padding: 10px; font-size: 24px; margin-bottom:0px;">
      <span style="font-weight:bold;">Nou Beskikbaar:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;🛀</span>
      <span style="margin-left:10px;" id="last-beskikbaar-value">' . $last_beskikbaar . '</span>
   </div>
   <div style="border: 1px solid black; padding: 10px; font-size: 24px; margin-bottom:0px;">
      <span style="font-weight:bold;">Gemiddelde Gebruik:&nbsp;&nbsp;&nbsp;🌻</span>
      <span style="margin-left:10px;" id="avg_gebruik_nou">' . $avg_gebruik . '</span>
   </div>
   <div style="border: 1px solid black; padding: 10px; font-size: 24px; margin-bottom:0px;">
      <span style="font-weight:bold;">Totaal in Rand Gekoop:&nbsp;💝</span>
      <span style="margin-left:10px;" id="total-koop-value">' . $total_koop . '</span>
   </div>
   <div style="border: 1px solid black; padding: 10px; font-size: 24px; margin-bottom:0px;">
      <span style="font-weight:bold;">Totale Eenhede Gekry:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;☠</span>
      <span style="margin-left:10px;" id="total-ontvang-value">' . $total_ontvang . '</span>
   </div>
   <div style="border: 1px solid black; padding: 10px; font-size: 24px; margin-bottom:10px;">
      <span style="font-weight:bold;">Totale Eenhede Gebruik:&nbsp;⌛</span>
      <span style="margin-left:10px;" id="total-gebruik-value">' . $total_gebruik . '</span>
   </div>
</div>';


// Display table
$afrikaans_months = array("Januarie", "Februarie", "Maart", "April", "Mei", "Junie", "Julie", "Augustus", "September", "Oktober", "November", "Desember");
$sql = "SELECT * FROM eenhede ORDER BY Id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
    <th style='font-size: 20px; text-align: center; font-family: Comic Sans MS; color: lime;'>
                Datum
            </th>
            <th style='font-size: 20px; text-align: center;'>
                Beskikbaar
            </th>
            <th style='font-size: 20px; text-align: center;'>
                Gebruik
            </th>
            <th style='font-size: 20px; text-align: center;'>
                Koop
            </th>
            <th style='font-size: 20px; text-align: center;'>
                Ontvang
            </th>
            <th style='font-size: 20px; text-align: center;'>
                Koste
            </th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        $afrikaans_months = array("Januarie", "Februarie", "Maart", "April", "Mei", "Junie", "Julie", "Augustus", "September", "Oktober", "November", "Desember");
        $datum = date_create($row["Datum"]);
        $datum_afrikaans = date_format($datum, "d ") . $afrikaans_months[date_format($datum, "n")-1] . date_format($datum, " Y");
        $beskikbaar = number_format($row["Beskikbaar"], 1);
        $gebruik = number_format($row["Gebruik"], 1);
        $koop = "R " . number_format($row["Koop"], 2);
        $ontvang = number_format($row["Ontvang"], 1);
        $koste = number_format($row["Koste"], 1);
        echo "<tr><td>$datum_afrikaans</td><td>$beskikbaar</td><td>$gebruik</td><td>$koop</td><td>$ontvang</td><td>$koste</td></tr>";
    }
    echo "</table>";
} else {
    echo "No entries found";
}

$conn->close();
?>
</body>
</html>
