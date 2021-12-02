<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../src/config.php";

include "../src/controladors/index.php";
include "../src/controladors/logout.php";
include "../src/controladors/login.php";
include "../src/controladors/dologin.php";
include "../src/controladors/calendari.php";
include "../src/controladors/newReservation.php";

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
} else if ($r === "logout") {
    $resposta = ctrlLogout($peticio, $resposta, $contenidor);
} else if ($r === "calendari") {
    $resposta = ctrlCalendari($peticio, $resposta, $contenidor);
} elseif ($r === "newReservation") {
    $resposta = ctrlNewReservation($peticio, $resposta, $contenidor);
}

$resposta->resposta();
