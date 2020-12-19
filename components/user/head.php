<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/bootstrap.php';
$Config = new  App\Config\Config(".");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php
    echo $Config -> GetAppTitle() . ": " . $TITLE_LOCATION;
    ?>
    </title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/materialize.css">
    <link rel="stylesheet" href="assets/css/forms/forms.css">
    <link rel="stylesheet" href="assets/css/helpers/colors.css">
    <link rel="stylesheet" href="assets/css/user/main.css">
</head>
