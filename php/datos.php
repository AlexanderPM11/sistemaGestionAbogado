
<?php


class ConexionDb
{
    private $servidor = "localhost";
    private $user = "root";
    private $password = "";
    private $conexion;
    function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=gestión_casos", $this->user, $this->password);
            // echo "Connected successfully" . "<br>";
        } catch (PDOException $e) {
            echo ("Haz ocurrido un error.." . $e->getMessage());
        }
    }
    public function ejecutar($sql)
    {
        $this->conexion->query($sql);
        return $this->conexion;
    }
    public function showDatos($sql)
    {
        $select = $this->conexion->prepare($sql);
        $select->execute();
        $result = $select->fetchAll();
        return $result;
    }
}


$con = new ConexionDb();
