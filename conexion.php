<?php
    class Conexion extends mysqli
    {
        private $datos = array(
            'database_host'=>'',
            'database_name'=>'',
            'database_user'=>'',
            'database_password'=>'',
            'database_port'=>''
        );
        public function __construct()
        {
            $this->datos = array(
            'database_host'=>'localhost',
            'database_name'=>'udo',
            'database_user'=>'root',
            'database_password'=>'root',
            'database_port'=>'3306'
            );
            parent::__construct($this->datasabe_host, $this->database_user, $this->database_password, $this->database_name, $this->database_port);
        }
        public function __construct1($host, $user,$password, $name, $port)
        {
            $this->datos = array(
            'database_host'=>$host,
            'database_user'=>$user,
            'database_password'=>$password,
            'database_name'=>$name,
            'database_port'=>$port
            );
            parent::__construct($host, $user, $password, $name, $port);
        }
        public function __get($keyname){
            if(array_key_exists($keyname, $this->datos))
                return $this->datos[$keyname];
        }
        public function __set($keyname, $value){
            if(array_key_exists($keyname, $this->datos))
                $this->datos[$keyname] = $value;
        } 
    }
    $objeto = new Conexion();
  //$rst = $objeto->query("select * from usuarios");
  //$r = $rst->fetch_assoc();
  //var_dump($r);