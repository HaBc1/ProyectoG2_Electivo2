<?php
Class DentistaDAO{
    private $conexion;
    private static $instancia;
    private function __construct() {
        $this->conexion = mysql_connect("localhost","root","");
        mysql_select_db('proyecto_g2', $this->conexion);
    }
    public static function getInstancia(){
        if(is_null(self::$instancia)){
            self::$instancia = new DentistaDAO();
            return self::$instancia;
        }
    }
    function InsertaDentista($persona,$especialidad){
        $consulta = "INSERT INTO dentista(id_persona, especialidad) VALUES ('$persona','$especialidad')";
        if (mysql_query($consulta, $this->conexion)){return 1;}
        else{return 0;}
    }
    function ListarDentista(){
        $consulta = "SELECT d.id_dentista as 'ID', p.dni_persona as 'DNI',CONCAT(p.ape_persona,' ',p.nom_persona) as 'Dentista',d.especialidad as 'Especialidad', d.estado_dentista as 'Estado' FROM dentista d
INNER JOIN persona p ON p.id_persona = d.id_persona";
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
    function BusDentista($dni)
    {
        $consulta="SELECT d.id_dentista as 'ID', p.dni_persona as 'DNI',CONCAT(p.ape_persona,' ',p.nom_persona) as 'Dentista',d.especialidad as 'Especialidad', d.estado_dentista as 'Estado' FROM dentista d
INNER JOIN persona p ON p.id_persona = d.id_persona WHERE p.dni_persona = '$dni'";
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

