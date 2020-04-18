<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Back to the futur</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
</head>


<body>
    <h1>Back to the future' quest</h1>
</body>


<?php
date_default_timezone_set('Europe/Paris');

$presentTime = new DateTime();
$destinationTime = new DateTime();
$destinationTime->modify('+3 month +14 days +18 hours + 80 seconds');

$interval = $presentTime->diff($destinationTime);

// Je pars du principe que 1 seconde necessite 1/100 unité d'énergie, donc je prend la différence entre le présent et la destination, je la convertie en seconde et ce résultat/100 retourne les unités d'énergies nécessaires au voyage :)
$neededEnergy = ($interval->format('%y') * 365 * 86400 + $interval->format('%m') *(365*86400)/12  + $interval->format('%d') * 86400 + $interval->format('%h')*3600 + $interval->format('%i')*60 + $interval->format('%s')) / 100;
?>


<div class="container-fluid">
    <div class="row" id="destination">
        <div class="col-1">
            <p class="label">MONTH</p>
            <p class="value"><?= $destinationTime->format("M") ?></p>
        </div>

        <div class="col-1">
            <p class="label">DAY</p>
            <p class="value"><?= $destinationTime->format("d") ?></p>
        </div>

        <div class="col-1">
            <p class="label">YEAR</p>
            <p class="value"><?= $destinationTime->format("Y") ?></p>
        </div>

        <div class="col-1" id="forced">
            <?php
            if ($destinationTime->format('H') > 12){
                echo '<p class="label">AM</p>
            <img src="public/img/2.png">
            <p class="label">PM</p>
            <img src="public/img/1.png">';
            }else {
                echo '
            <p class="label">AM</p>
            <img src="public/img/1.png">
            <p class="label">PM</p>
            <img src="public/img/2.png">';
            }
            ?>
        </div>

        <div class="col-1">
            <p class="label">HOUR</p>
            <p class="value"><?= $destinationTime->format("h") ?></p>
        </div>

        <div class="col-1" id="points">
            <img src="public/img/2.png">
            <img src="public/img/2.png">
        </div>

        <div class="col-1">
            <p class="label">MIN</p>
            <p class="value"><?= $destinationTime->format("i") ?></p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row" id="destinationh2">
        <h2>DESTINATION TIME</h2>
    </div>
</div>




<div class="container-fluid">
    <div class="row" id="present">
        <div class="col-1">
            <p class="label">MONTH</p>
            <p class="value"><?= $presentTime->format("M") ?></p>
        </div>

        <div class="col-1">
            <p class="label">DAY</p>
            <p class="value"><?= $presentTime->format("d") ?></p>
        </div>

        <div class="col-1">
            <p class="label">YEAR</p>
            <p class="value"><?= $presentTime->format("Y") ?></p>
        </div>

        <div class="col-1" id="forced">
            <?php
            if ($presentTime->format('H') > 12){
                echo '<p class="label">AM</p>
            <img src="public/img/4.png">
            <p class="label">PM</p>
            <img src="public/img/3.png">';
            }else {
                echo '
            <p class="label">AM</p>
            <img src="public/img/3.png">
            <p class="label">PM</p>
            <img src="public/img/4.png">';
            }
            ?>
        </div>

        <div class="col-1">
            <p class="label">HOUR</p>
            <p class="value"><?= $presentTime->format("h") ?></p>
        </div>

        <div class="col-1" id="points">
            <img src="public/img/4.png">
            <img src="public/img/4.png">
        </div>

        <div class="col-1">
            <p class="label">MIN</p>
            <p class="value"><?= $presentTime->format("i") ?></p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <h2>PRESENT TIME</h2>
    </div>
</div>

<?php
echo '<h3> There is '.$interval->format('%y year, %m month, %d days and %h hours '). ' between now and the destination :) </h3>';
?>

<div class="container-fluid">
    <?= "We'll need "."$neededEnergy".' units of energy for this travel !'; ?>
</div>
