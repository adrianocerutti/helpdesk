<?php

// variável que verifica se a autenticação foi realizada
$usuario_autenticado = false;

// usuários do sistema
$usuarios_app = array(
    array('email' => 'adm@teste.com.br', 'senha' => '123456'),
    array('email' => 'user@teste.com.br', 'senha' => 'abcd'),
);

foreach ($usuarios_app as $user) {

    // echo "Usuário app: {$user['email']} / {$user['senha']} <br>";
    // echo "Usuário form: {$_POST['email']} / {$_POST['senha']} <br>";

    if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
        $usuario_autenticado = true;
    }
}

if ($usuario_autenticado) {
    echo "Usuário autenticado";
} else {
    header('Location: index.php?login=erro');
}