<?php 


// class conexion extends PDO{

//     private static $instancia = null;
//     private $tipoDB = 'mysql';
//     private $host = 'localhost';
//     private $user = 'root';
//     private $password = '';
//     private $database = 'db_veterinaria';

//     private function __construct(){
        
//         try{    

//             parent::__construct("{$this->tipoDB}:dbname={$this->database}; 
//                                                 host={$this->host};
//                                                 charset=utf8",
//                                                 $this->user,
//                                                 $this->password);

//             $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

//         }catch(PDOException $ex){

//             echo $ex->getMessage();
//         }
        
//     }

//     public static function singleton(){

//         if(!isset(self::$instancia)){

//             $clase = __CLASS__;
//             self::$instancia = new $clase;
//         }

//         return self::$instancia;
//     }

// }

class conexion extends PDO {

	
    private static $instancia = null;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dataBase = "db_veterinaria";

    private function __construct() {

        try {
            //heredamos de la clase pdo
            parent::__construct("mysql:host={$this->host}; dbname={$this->dataBase}", $this->user, $this->pass);
            //asignamos unos atributos de la clase pdo para el manejo de errores y excepciones
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }

    //self es para acceder a un metodo o una constante estatico de la misma clase
	//isset es para validar si una variable existe y no esta nula
    public static function singleton() {
        if (!isset(self::$instancia)) {
            //__CLASS__ es una constante predefinida...es un trait
            //__CLASS__ retorna el nombre esta misma clase
            $miClase = __CLASS__;
			//instanciamos esta misma clase para retornarla
            self::$instancia = new $miClase;
        }
		//retornamos la clase instaciada
        return self::$instancia;
    }

}


?>