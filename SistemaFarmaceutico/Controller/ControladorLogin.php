
<?php

include_once '../Model/Usuario.php';

session_start();

$user = $_POST['username'];
$pass = $_POST['password'];
$usuarios = new Usuario();

if(!empty($_SESSION['tipo_usuario_id'])){

    switch ($_SESSION['tipo_usuario_id']) {
        case 1:
            header('Location: ../View/Administrador.php');
            break;

        case 2:
            header('Location: ../View/Trabajador.php');
            break;
    }

}
else{

    $usuarios->Loguearse($user);

    if(!empty($usuarios->objetos)) {

        foreach ($usuarios->objetos as $objeto) {
            if (password_verify($pass, $objeto->contrasena)) {
                $_SESSION['usuarios']=$objeto->id_usuario;
                $_SESSION['tipo_usuario_id']=$objeto->tipo_usuario_id;
                $_SESSION['nombre']=$objeto->nombre;
                $_SESSION['apellido']=$objeto->apellido;

                switch ($_SESSION['tipo_usuario_id']) {
                    case 1:
                        header('Location: ../View/Administrador.php');
                        break;

                    case 2:
                        header('Location: ../View/Trabajador.php');
                        break;
                }
            }
        }
        

    }
    else{
        header('Location: ../Index.php');
    }
}

?>