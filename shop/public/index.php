<?php

use app\models\{Manager, Model, Order, Product, User};

include "../engine/Autoload.php";
spl_autoload_register([new Autoload, "loadClass"]);

$user = new User;
var_dump($user);