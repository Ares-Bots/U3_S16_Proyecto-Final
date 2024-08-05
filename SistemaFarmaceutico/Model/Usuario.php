
<?php

include_once 'Conexion.php';

class Usuario{

    var $objetos;
    var $acceso;

    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function Loguearse($dni){
        $sql="SELECT * FROM usuarios INNER JOIN tipo_usuario ON tipo_usuario_id = id_tusuario WHERE dni = :dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni' => $dni));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function Obtener_datos($id) {
        $sql="SELECT * FROM usuarios join tipo_usuario on tipo_usuario_id=id_tusuario and id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos= $query->fetchall();
        return $this->objetos;
    }

    public function Obtener_dato2() {
        $sql = "SELECT id_tusuario, tipo FROM tipo_usuario";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>