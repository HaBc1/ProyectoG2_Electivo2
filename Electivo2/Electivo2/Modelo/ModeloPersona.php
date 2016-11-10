<?php
Class PersonaDAO{
    private $conexion;
    private static $instancia;
    private function __construct() {
        $this->conexion = mysql_connect("localhost","root","");
        mysql_select_db('proyecto_g2', $this->conexion);
    }
    public static function getInstancia(){
        if(is_null(self::$instancia)){
            self::$instancia = new PersonaDAO();
            return self::$instancia;
        }
    }
    function InsertaPersona($nombre,$apellido,$dni,$direccion,$email){
        $consulta = "insert into persona(nom_persona, ape_persona, dni_persona, direccion_persona, email_persona) values ('$nombre','$apellido','$dni','$direccion','$email')";
        if (mysql_query($consulta, $this->conexion)){return 1;}
        else{return 0;}
    }
    function ListarPersona(){
        $consulta = "select * from persona";
        $resultado = mysql_query($consulta, $this->conexion);
        if(mysql_num_rows($resultado)){
            $als = array();
            while ($al = mysql_fetch_assoc($resultado)){
                $als[] = $al;
            }
            return $als;
        }else{
            return null;
        }
        mysql_close();
    }    
    function BusUsuario($dni)
    {
        $consulta="SELECT * FROM persona WHERE dni_persona =  '$dni'";
        $resultado = mysql_query($consulta,$this->conexion);
        if(mysql_num_rows($resultado))
        {
            $usuarios= array();
            while($usuario = mysql_fetch_assoc($resultado))
            {
                $usuarios[] = $usuario;
            }
            return $usuarios;
        }
        else
        {
                 return null; 
        }
        mysql_close();
    }
}

