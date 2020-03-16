<?php
include "polacz.php";
$klasa = wczytaj("klasa");
$temat = wczytaj("temat");
$tresc = wczytaj("tresc");
$data_i_godzina = wczytaj("data_i_godzina");
$data_i_godzina_oddania = wczytaj("data_i_godzina_oddania");

$sql = $baza->prepare("UPDATE nauczyciel SET temat=?, tresc=?, data_i_godzina=?, data_i_godzina_oddania=? WHERE klasa=?;");
if ($sql)
{
        $sql->bind_param("sssii",  $klasa, $temat, $tresc, $data_i_godzina, $data_i_godzina_oddania);
        $sql->execute();
        $sql->close();
}
  else die("Błąd SQL: ". $baza->error);
$baza->close();
header ("Location: http://localhost/nauczy/");
?>