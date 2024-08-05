
<?php

include_once '../Model/Usuario.php';

$usuario = new Usuario();

if($_POST['funcion']=='buscar_usuario'){
    $json=array();
    $usuario->obtener_datos($_POST['dato']);
    foreach($usuario->objetos as $objeto){
        $json[]=array(
            'nombre'=>$objeto->nombre,
            'apellido'=>$objeto->apellido,
            'dni'=>$objeto->dni,
            'direccion'=>$objeto->direccion,
            'telefono'=>$objeto->telefono,
            'correo'=>$objeto->correo,
            'tipo'=>$objeto->tipo
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
} elseif ($_POST['funcion'] == 'cargar_tipos_usuario') {
    
    // Llamar al método Obtener_datos2 para obtener los tipos de usuario
    $tiposUsuario = $usuario->Obtener_dato2();

    // Devolver los tipos de usuario en formato JSON
    echo json_encode($tiposUsuario);
}

?>