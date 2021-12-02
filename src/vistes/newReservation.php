<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "util/head.php" ?>
    <title>Reservation</title>
</head>

<body>
<?php include "util/navbar.php" ?>
    <div class="flex-container">
        <form action="index.php" method="POST" class="reservation-form" autocomplete="off">
            <input type="hidden" name="r" value="makeReservation">
            <div class="flex-column-container">
                <label for="ubi">Ubicació</label>
                <select name="Ubicacio" id="ubi">
                    <option value="-">-</option>
                    <option value="Figueres">Figueres</option>
                    <option value="Girona">Girona</option>
                </select>
            </div>
            <div class="flex-column-container">
                <label for="centre">Centre</label>
                <select name="Centre" id="centre">
                    <option value="-">-</option>
                    <option value="Centre1">Centre1</option>
                    <option value="Centre2">Centre2</option>
                </select>
            </div>
            <div class="flex-column-container">
                <label for="data">Dia</label>
                <input type="date" name="Data" id="data">
            </div>
            <div class="flex-column-container">
                <label for="hentrada">Hora entrada</label>
                <input type="text" name="HoraEntrada" id="hentrada">
            </div>
            <div class="flex-column-container">
                <label for="hsortida">Hora sortida</label>
                <input type="text" name="HoraFi" id="hsortida">
            </div>
            <div class="flex-column-container">
                <label for="persones">Persones</label>
                <input type="number" name="Persones" id="persones">
            </div>
            <div class="flex-column-container">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</body>
</html>