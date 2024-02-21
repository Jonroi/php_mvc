<?php

session_start();
//includes all that includes on init.php
require "../app/core/init.php";

//requires footer and header to index page
require "../app/views/inc/header.php";
require "../app/views/inc/footer.php";


// create new app and loads controller
$app = new App;
$app->loadController();
