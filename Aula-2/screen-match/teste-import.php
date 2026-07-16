<?php

$teste = require __DIR__ . "/filme.json";

$conteudoJSON = file_get_contents($teste);

echo json_decode($conteudoJSON);