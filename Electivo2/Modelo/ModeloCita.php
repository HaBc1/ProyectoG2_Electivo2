<?php
Class CitaDAO{
    private $conexion;
    private static $instancia;
    private function __construct() {
        $this->conexion = mysql_connect("localhost","root","");
        mysql_select_db('proyecto_g2', $this->conexion);
    }
    public static function getInstancia(){
        if(is_null(self::$instancia)){
            self::$instancia = new CitaDAO();
            return self::$instancia;
        }
    }
    function InsertaCita($id_paciente,$id_horario,$inicio_cita,$fin_cita,$estado_cita){
        $consulta = "insert into cita(id_paciente,id_horario,inicio_cita,fin_cita,estado_cita) values('$id_paciente','$id_horario','$inicio_cita','$fin_cita','$estado_cita')";
        if (mysql_query($consulta, $this->conexion)){return 1;}
        else{return 0;}
    }
    function ListarCita(){
        $consulta = "SELECT c.id_cita as 'ID' , p.dni_persona as 'DNI',CONCAT(p.ape_persona,' ',p.nom_persona) as 'Paciente', a.nom_area as 'Area',cr.dia as 'Dia', t.nom_turno as 'Turno',CONCAT(pe.ape_persona,' ',pe.nom_persona) as 'Dentista', c.inicio_cita as 'Inicio' , c.fin_cita as 'Fin' , c.estado_cita as 'Estado' FROM cita c INNER JOIN horario h ON h.id_horario = c.id_horario INNER JOIN cronograma cr ON cr.id_cronograma = h.id_cronograma INNER JOIN turno t ON t.id_turno = cr.id_turno INNER JOIN area a ON a.id_area = cr.id_area INNER JOIN paciente pa ON pa.id_paciente = c.id_paciente INNER JOIN persona p ON p.id_persona = pa.id_persona INNER JOIN dentista d ON d.id_dentista = h.id_dentista INNER JOIN persona pe ON pe.id_persona = d.id_persona ORDER BY c.id_cita";
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

    function BusArea($id_cita)
    {
        $consulta="SELECT * FROM cita WHERE id_cita =  '$id_cita'";
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

       function eliminaCita($id_cita)
    {   
        $seid = explode("P", $id_cita);
        $sid = $seid[1];
        $i = (int) $sid;
        if($id!=null)
        {
            $cons = "DELETE FROM cita WHERE id_cita ='$id_cita'";
            mysql_query($cons, $this->conexion);
            return true;
        }
        else
            return false;
    }


}

