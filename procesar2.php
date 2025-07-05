<?php
$html = file_get_contents("php://input");

$pc1 = strpos($html, ";");
$pc2 = strpos($html, ";", $pc1 + 1);

$apellido1 = substr($html, 0, $pc1);
$apellido2 = substr($html, $pc1 + 1, $pc2 - $pc1 - 1);

$html = "<!DOCTYPE html><html lang=\"en\">" . substr($html, $pc2 + 1);


$id = "reportes/$apellido1 $apellido2" ;//. rawurlencode($apellido1 . " " .$apellido2);

$i = 1;
while (file_exists($id)) {
    $id = "reportes/" . rawurlencode($apellido1 . " " . $apellido2 . " - " . $i);
    $i++;
}


file_put_contents($id, $html, LOCK_EX);
echo $id;