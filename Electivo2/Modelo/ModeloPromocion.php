<?php
Class PromocionDAO{
    private $conexion;
    private static $instancia;
    private function __construct() {
        $this->conexion = mysql_connect("localhost","root","");
        mysql_select_db('proyecto_g2', $this->conexion);
    }
    public static function getInstancia(){
        if(is_null(self::$instancia)){
            self::$instancia = new PromocionDAO();
            return self::$instancia;
        }
    }
    function InsertaPromocion($nombre,$descripcion,$inicio,$fin){
        $consulta = "INSERT INTO promocion(nom_promocion, descripcion_promocion, fecha_incio, fecha_fin) VALUES ('$nombre','$descripcion','$inicio','$fin')";
        if (mysql_query($consulta, $this->conexion)){return 1;}
        else{return 0;}
    }
    function ListarPromocion(){
        $consulta = "SELECT id_promocion as 'ID', nom_promocion as 'Promocion', descripcion_promocion as 'Descripcion', fecha_incio as 'Fec. Inicio', fecha_fin as 'Fec. Fin', estado_promocion as 'Estado' FROM promocion";
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
    function BusPromocion($nombre)
    {
        $consulta = "SELECT id_promocion as 'ID', nom_promocion as 'Promocion', descripcion_promocion as 'Descripcion', fecha_incio as 'Fec. Inicio', fecha_fin as 'Fec. Fin', estado_promocion as 'Estado' FROM promocion WHERE nom_promocion = '$nombre'";
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

