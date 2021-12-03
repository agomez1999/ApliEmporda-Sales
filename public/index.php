<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

include "../src/config.php";

include "../src/controladors/index.php";
include "../src/controladors/login.php";
include "../src/controladors/dologin.php";
include "../src/controladors/logout.php";
include "../src/controladors/userProfile.php";
include "../src/controladors/calendari.php";
include "../src/controladors/newReservation.php";
include "../src/controladors/eliminarReserva.php";
include "../src/controladors/ajaxServer.php";

include "../src/middleware/middleAdmin.php";
include "../src/middleware/middleLogin.php";

$r = $_REQUEST["r"];

$contenidor = new Emeset\Contenidor($config);
$resposta = $contenidor->resposta();
$peticio = $contenidor->peticio();

if ($r == "") {
    $resposta = middleLogin($peticio, $resposta, $contenidor, "ctrlIndex");
} elseif ($r === "dologin") {
    $resposta = ctrldoLogin($peticio, $resposta, $contenidor);
} elseif ($r === "login") {
    $resposta = ctrlLogin($peticio, $resposta, $contenidor);
} elseif ($r === "logout") {
    $resposta = ctrlLogout($peticio, $resposta, $contenidor);
} elseif ($r === "userProfile") {
    $resposta = ctrlUserProfile($peticio, $resposta, $contenidor);
} elseif ($r === "calendari") {
    $resposta = ctrlCalendari($peticio, $resposta, $contenidor);
} elseif ($r === "newReservation") {
    $resposta = ctrlNewReservation($peticio, $resposta, $contenidor);
} elseif ($r === "deleteReservation") {
    $resposta = ctrlDeleteReservation($peticio, $resposta, $contenidor);
} elseif ($r === "checkUbi") {
    $resposta = ctrlCheckUbi($peticio, $resposta, $contenidor);
} elseif ($r === "checkCenter") {
    $resposta = ctrlCheckCenter($peticio, $resposta, $contenidor);
} elseif ($r === "checkDay") {
    $resposta = ctrlCheckDay($peticio, $resposta, $contenidor);
} elseif ($r === "checkHours") {
    $resposta = ctrlCheckHours($peticio, $resposta, $contenidor);
} elseif ($r === "checkPersons") {
    $resposta = ctrlCheckPersons($peticio, $resposta, $contenidor);
}

$resposta->resposta();
