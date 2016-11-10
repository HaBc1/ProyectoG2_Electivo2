<?php
Class PacienteDAO{
    private $conexion;
    private static $instancia;
    private function __construct() {
        $this->conexion = mysql_connect("localhost","root","");
        mysql_select_db('proyecto_g2', $this->conexion);
    }
    public static function getInstancia(){
        if(is_null(self::$instancia)){
            self::$instancia = new PacienteDAO();
            return self::$instancia;
        }
    }
    function InsertaPaciente($persona){
        $consulta = "INSERT INTO paciente(id_persona) VALUES ('$persona')";
        if (mysql_query($consulta, $this->conexion)){return 1;}
        else{return 0;}
    }
    function ListarPaciente(){
        $consulta = "SELECT id_paciente as 'ID', p.dni_persona as 'DNI',CONCAT(p.ape_persona,' ',p.nom_persona) as 'Paciente',pa.estado_paciente as 'Estado' FROM paciente pa
INNER JOIN persona p ON p.id_persona = pa.id_persona";
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
    function BusPaciente($dni)
    {
        $consulta="SELECT id_paciente as 'ID', p.dni_persona as 'DNI',CONCAT(p.ape_persona,' ',p.nom_persona) as 'Paciente',pa.estado_paciente as 'Estado' FROM paciente pa
INNER JOIN persona p ON p.id_persona = pa.id_persona WHERE p.dni_persona = '$dni'";
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

