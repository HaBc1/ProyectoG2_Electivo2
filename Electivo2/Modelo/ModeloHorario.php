<?php
Class HorarioDAO{
    private $conexion;
    private static $instancia;
    private function __construct() {
        $this->conexion = mysql_connect("localhost","root","");
        mysql_select_db('proyecto_g2', $this->conexion);
    }
    public static function getInstancia(){
        if(is_null(self::$instancia)){
            self::$instancia = new HorarioDAO();
            return self::$instancia;
        }
    }
    function InsertaHorario($id_dentista,$id_cronograma){
        $consulta = "INSERT INTO horario(id_dentista, id_cronograma) VALUES ('$id_dentista','$id_cronograma')";
        if (mysql_query($consulta, $this->conexion)){return 1;}
        else{return 0;}
    }
    function ListarHorario(){
        $consulta = "SELECT h.id_horario as 'ID', p.dni_persona as 'DNI' , CONCAT(p.ape_persona,' ',p.nom_persona) as 'Dentista', c.dia as 'Dia', a.nom_area as 'Area', t.hora_inicio as 'H. Inicio', t.hora_fin as 'H. Fin' FROM horario h
INNER JOIN cronograma c ON c.id_cronograma = h.id_cronograma
INNER JOIN turno t ON t.id_turno = c.id_turno
INNER JOIN area a ON a.id_area = c.id_area
INNER JOIN dentista d ON d.id_dentista  = h.id_dentista
INNER JOIN persona p ON d.id_persona = p.id_persona";
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
    function BusHorario($dentista)
    {
       $consulta = "SELECT h.id_horario as 'ID', p.dni_persona as 'DNI' , CONCAT(p.ape_persona,' ',p.nom_persona) as 'Dentista', c.dia as 'Dia', a.nom_area as 'Area', t.hora_inicio as 'H. Inicio', t.hora_fin as 'H. Fin' FROM horario h
INNER JOIN cronograma c ON c.id_cronograma = h.id_cronograma
INNER JOIN turno t ON t.id_turno = c.id_turno
INNER JOIN area a ON a.id_area = c.id_area
INNER JOIN dentista d ON d.id_dentista  = h.id_dentista
INNER JOIN persona p ON d.id_persona = p.id_persona
WHERE p.dni_persona = '$dentista'";
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


