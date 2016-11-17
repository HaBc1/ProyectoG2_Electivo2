<?php
Class CronogramaDAO{
    private $conexion;
    private static $instancia;
    private function __construct() {
        $this->conexion = mysql_connect("localhost","root","");
        mysql_select_db('proyecto_g2', $this->conexion);
    }
    public static function getInstancia(){
        if(is_null(self::$instancia)){
            self::$instancia = new CronogramaDAO();
            return self::$instancia;
        }
    }
    function InsertaCronograma($dia,$id_area,$id_turno){
        $consulta = "INSERT INTO `cronograma`(`dia`, `id_area`, `id_turno`) "
                . "VALUES ('$dia','$id_area','$id_turno')";
        if (mysql_query($consulta, $this->conexion)){return 1;}
        else{return 0;}
    }
    function ListarCronograma(){
        $consulta = "SELECT c.id_cronograma as 'Id',c.dia as 'Dia',a.nom_area as 'Area',t.nom_turno as 'Turno',t.hora_inicio as 'H. Inicio',t.hora_fin as 'H. Fin' FROM cronograma c 
INNER JOIN area a ON a.id_area = c.id_area
INNER JOIN turno t ON t.id_turno = c.id_turno";
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
    function BusCronograma($area)
    {
           $consulta = "SELECT c.id_cronograma as 'Id',c.dia as 'Dia',a.nom_area as 'Area',t.nom_turno as 'Turno',t.hora_inicio as 'H. Inicio',t.hora_fin as 'H. Fin' FROM cronograma c 
INNER JOIN area a ON a.id_area = c.id_area
INNER JOIN turno t ON t.id_turno = c.id_turno 
WHERE a.nom_area = '$area'";
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

