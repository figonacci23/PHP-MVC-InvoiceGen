<?php
require_once __DIR__."/Core/Core.php";


require_once __DIR__."/Router/Routes.php";


$result = new Core();

$result->Run($routes);
