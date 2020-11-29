<?php
require_once 'config.php';

// chama um usuario
// $root = new Usuario();
// $root->loadById(44);

// carrega uma lista de usuarios
// $lista = Usuario::getList();
// echo json_encode($lista);

// carrega uma lista de usuarios buscando pelo login
// $search = Usuario::search("mark");
// echo json_encode($search);

// carrega um usuario usando o login e a senha
$usuario = new Usuario();
$usuario->login("mark", "zika");
echo $usuario;

 ?>
