<?php

$emailComEspaco = " teste@gmail.com ";

echo trim($emailComEspaco) . PHP_EOL;

$csv = ",teste, teste teste, 25,";

echo trim($csv, ",") . PHP_EOL;
echo ltrim($csv, ",") . PHP_EOL;
echo rtrim($csv, ",") . PHP_EOL;

