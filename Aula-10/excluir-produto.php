<?php

require 'src/conexao-db.php';
require 'src/Modelo/Produto.php';
require 'src/Repositorio/ProdutoRepositorio.php';

$produtoRepositorio = new produtoRepositorio($pdo);
$produtoRepositorio->removerOpcao($_POST['id']);

header('Location: admin.php');