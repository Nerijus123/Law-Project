<?php
$arRodytiZinutes = true;  // $debugMode = 1;

// konstantas
define("DB_PAVADINIMAS", "lawProject");
define("DB_VARTOTOJAS", "root");
define("DB_SLAPTAZODIS", "root");
define("DB_HOST", "localhost");

$prisijungimas = mysqli_connect (DB_HOST, DB_VARTOTOJAS, DB_SLAPTAZODIS, DB_PAVADINIMAS);
// prisijungimas
if ($prisijungimas) {
  // echo "prisijungei prie db sekmingai <br />";
} else {
  if ($arRodytiZinutes) {
    echo "prisijungti nepavyko <br />" . mysqli_connect_error();
  }
}

function getPrisijungimas() {
  global $prisijungimas;
  return $prisijungimas;
}

// atsiliepimu funkcija
function getAtsiliepimas($nr) {
  $manoSQL = "SELECT * FROM atsiliepimai WHERE id=$nr";
  $resultatai = mysqli_query(getPrisijungimas(), $manoSQL);
  $resultataiArray = mysqli_fetch_row($resultatai);
  return $resultataiArray;
}
