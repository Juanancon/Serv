<?php

// Clase encargada de gestionar las conexiones a la base de datos

$db_conf=array(
    'servidor'=>'localhost',
    'usuario'=>'root',
    'password'=>'',
    'base_datos'=>'bdjobyesterday'
);


Class Db {

    private $link;
    private $result;
    private $regActual;

    static $_instance;

    /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
    private function __construct(){

        $this->Conectar($GLOBALS['db_conf']);
    }

    /*Evitamos el clonaje del objeto. Patrón Singleton*/
    private function __clone(){ }

    /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera
     de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
    public static function getInstance(){
        if (!(self::$_instance instanceof self)){
            self::$_instance=new self();
        }
        return self::$_instance;
    }

    /*Realiza la conexión a la base de datos.*/
    private function Conectar($conf)
    {
        if (! is_array($conf))
        {
            echo "<p>Faltan parámetros de configuración</p>";
            var_dump($conf);
            // Puede que no se requiera ser tan 'expeditivos' y que lanzar una excepción sea más versatil
            exit();
        }
        $this->link=new mysqli($conf['servidor'], $conf['usuario'], $conf['password'], $conf['base_datos']);

        /* check connection */
        if (! $this->link ) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            // Puede que no se requiera ser tan 'expeditivos' y que lanzar una excepción sea más versatil
            exit();
        }

        $this->link->query("SET NAMES 'utf8'");
    }

    public function ejecutar($sql){

        $this->result = mysqli_query($this->link, $sql);

    }

    // Ejecuta una consulta SQL y devuelve el resultado de esta.

    public function Consulta($sql)
    {
        $this->result=$this->link->query($sql);
        return $this->result;
    }


// Devuelve el siguiente registro del result set devuelto por una consulta.

    public function LeeRegistro($result=NULL)
    {
        if (! $result)
        {
            if (! $this->result)
            {
                return NULL;
            }
            $result=$this->result;
        }
        $this->regActual=$result->fetch_array();
        return $this->regActual;
    }


}