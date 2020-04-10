<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 22/02/2020
 * Time: 10:56
 */

class ConexionPDOWeb
{
    # Atributos de la clase conexion
    private $mysqli = '';
//   private $server ='test.regalonatural.com:51000'; // Deasarrollo

//Produccion
//    private $usuario = 'root';
//    private $clave = 'vmsn2004';
//    private $server ='regalonatural.com:7071'; // Produccion

//Test
    private $usuario = 'root';
    private $clave = 'vmsn2004';
    private $server ='regalonatural.es:9071'; // Test

// LOCAL //
//    private $usuario = 'victor';
//    private $clave = 'vmsn2004';
//   private $server ='localhost:3306'; // Local
///////
///


    private $db = 'cm-regalonatural';
    private $dbh;
    public $datos;

    public function conectar(){
        try {
//            $dsn = "mysql:host=". $this->server .";dbname=".$this->db . ";port=51000";
            $dsn = "mysql:host=". $this->server .";dbname=".$this->db . ";charset=utf8mb4" ;
            $this->dbh = new PDO($dsn, $this->usuario, $this->clave);

            //    echo "Conectado a Web!!!";
        } catch (PDOException $e){
            echo "Error conectando a PDOWeb -> ";
            echo $e->getMessage();
        }
    }

    public function obtiene_consulta($consulta){
        $stmt=$this->dbh->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $this->datos=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->datos;
    }

    public function desconectar(){
        $this->dbh=null;
    }
}