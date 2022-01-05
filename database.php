<?php
 require "validators.php";
 require "./utils/debugin.php";
 
class Basedata
{
    //Definir variables para despues ocuparlas
    private static $instance;
    const server = 'localhost:3306';
    const username = 'root';
    const password = '';
    const database = 'php_prueba3_db';
    private $conection ;
    const sql_users = 'SELECT * FROM users '; 
    const sql_check = 'INSERT INTO factura_bd (rut, nombre, apellido, valor_factura, metodo_pago) VALUES (:rut, :nombre, :apellido, :valor_factura, :metodo_pago)';
    
    //metodo constructor para definir funciones de conexion , obtener datos de tabla usuarios , obtener info tabla facturas
    // Y obtener campos para despues rellenar las tablas
    function __construct()
    {
        try {
            $this->conection = new PDO("mysql:host=".self::server.";dbname=".self::database, self::username, self::password);
        } catch (PDOException $e) {
            die('Connected failed: ' . $e->getMessage());
        }
    }

    static function get_conection(){

        if (!isset(self::$instance)){
            self::$instance = new Basedata();
        }
        return self::$instance;
    }

    function get_users(){
        return $this->conection->query(self::sql_users);
    }

    function login($email){
        $records = $this->conection->prepare('SELECT id, email, password FROM users WHERE email = :email');
        $records->bindParam(':email',$email );
        $records->execute();
        return $records->fetch(PDO::FETCH_ASSOC);
    }

    //funcion para obtener informacion de la tabla factura?bd
    function create_check($rut, $nombre, $apellido, $valor_factura, $metodo_pago){
        if (!Validators::rut($rut)){
            echo "console.log('rut no valido');";
            return;
        }
        if (!Validators::nombre($nombre)){
            echo "console.log('nombre no valido');";
            return;
        }
        if (!Validators::apellido($apellido)){
            echo "console.log('apellido no valido');";
            return;
        }
        if (!Validators::valor_factura($valor_factura)){
            echo "console.log('valor_factura no valido');";
            return;
        }
        if (!Validators::metodo_pago($metodo_pago)){
            echo "console.log('metodo_pago no valido');";
            return;
        }
        //$sql_check = "INSERT INTO `factura_bd` (`rut`, `nombre`, `apellido`, `valor_factura`, `metodo_pago`) VALUES (".$rut.", ".$nombre.", ".$apellido.", ".$valor_factura.", ".$metodo_pago.")";
        $column = $this->conection->prepare(self::sql_check);
        if(!$column){
            echo "console.log('error deconection');";
            return;
        }
        //$column->bindParam(":rut",$rut);
        //$column->bindParam(":nombre",$nombre);
       // $column->bindParam(":apellido",$apellido);
       // $column->bindParam(":valor_factura",$valor_factura);
        //$column->bindParam(":metodo_pago",$metodo_pago);
       // Debug($column);
        $execution = $column->execute([':rut'=> $rut , ':nombre'=>$nombre, ':apellido'=>$apellido, ':valor_factura'=>$valor_factura, ':metodo_pago'=>$metodo_pago,]);
        if(!$execution){
            echo "error ejecucion fallida";
        }
    }
    
}
