<?php
Class ConsultaDAO{
    private $conexion;
    private static $instancia;
    private function __construct() {
        $this->conexion = mysql_connect("localhost","root","");
        mysql_select_db('proyecto_g2', $this->conexion);
    }
    public static function getInstancia(){
        if(is_null(self::$instancia)){
            self::$instancia = new ConsultaDAO();
            return self::$instancia;
        }
    }
    function InsertaConsulta($id_cita,$estado_consulta){
        $consulta = "insert into consulta(id_cita,estado_consulta) values('$id_cita','$estado_consulta')";
        if (mysql_query($consulta, $this->conexion)){return 1;}
        else{return 0;}
    }
    function ListarConsulta(){
        $consulta = "SELECT * from consulta";
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
    function BuscaConsulta($id_consulta)
    {
        $consulta="SELECT * FROM consulta WHERE id_consulta =  '$id_consulta'";
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

