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
        $consulta = "SELECT * from cita";
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

    //  function ListarCitaPaciente(){
    //     $consulta = "SELECT pa.id_paciente,p.dni_persona,p.nom_persona,p.ape_persona from paciente pa INNER JOIN persona p ON  pa.id_persona=p.id_persona";
    //     $resultado = mysql_query($consulta, $this->conexion);
    //     if(mysql_num_rows($resultado)){
    //         $als = array();
    //         while ($al = mysql_fetch_assoc($resultado)){
    //             $als[] = $al;
    //         }
    //         return $als;
    //     }else{
    //         return null;
    //     }
    //     mysql_close();
    // }
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

