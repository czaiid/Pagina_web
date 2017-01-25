<?php
require'conexion.php';
class Usuario
{   
    private $datos = array(
        'id'=>'',
        'username'=>'',
        'nombre'=>'',
        'apellidos'=>'',
        'email'=>''
    );
    public function __construct()
    {
    
    }
    public static function login($user, $password)
    {
        $cnn = new Conexion();
        $sql = sprintf("select * from usuarios where username='%s' and password='%s'",$user,md5($password));
        $rst = $cnn->query($sql);
        if($rst)
        {
            if($rst->num_rows == 1 ){
                $r  = $rst->fetch_assoc();
                $usuario = new Usuario();
                $usuario->id = $r['id'];
                $usuario->username = $r['username'];
                $usuario->nombre = $r['nombre'];
                $usuario->apellidos = $r['apellidos'];
                $usuario->email = $r['email'];
                $datos = array(
                    'data' => array(
                        'login' => true,
                        'usuario' => $usuario->datos
                    )
                );
            }else{
                $datos = array(
                    'data' => array(
                        'login' => false
                    )
                );
            }
        }else{
            $datos = array(
                    'data' => array(
                        'login' => 'fail'
                    )
                );
        }
        return json_encode($datos);
    }
    public function json_datos()
    {
        return json_encode($this->datos);
    }
    public function __get($campo)
    {
        if(array_key_exists($campo, $this->datos))
            return $this->datos[$campo];
    }
    public function __set($campo, $valor)
    {
        if(array_key_exists($campo, $this->datos))
            $this->datos[$campo] = $valor;
    }
}

$u = Usuario::login('czaiid','123');
var_dump($u);