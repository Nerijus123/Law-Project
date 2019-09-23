<?php
$arRodytiZinutes = true;

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "lawproject";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn) {
  // echo "prisijungei prie db sekmingai <br />";
} else {
  if ($arRodytiZinutes) {
    echo "prisijungti nepavyko <br />" . mysqli_connect_error();
  }
}

function getPrisijungimas() {
  global $conn;
  return $conn;
}
