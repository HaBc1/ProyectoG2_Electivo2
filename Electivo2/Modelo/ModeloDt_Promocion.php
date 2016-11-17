<?php
Class Dt_PromocionDAO{
    private $conexion;
    private static $instancia;
    private function __construct() {
        $this->conexion = mysql_connect("localhost","root","");
        mysql_select_db('proyecto_g2', $this->conexion);
    }
    public static function getInstancia(){
        if(is_null(self::$instancia)){
            self::$instancia = new Dt_PromocionDAO();
            return self::$instancia;
        }
    }
    function InsertaDt_Promocion($id_promocion,$id_servicio,$costo_servicio){
        $consulta = "INSERT INTO dt_promocion(id_promocion, id_servicio, costo_servicio) VALUES ('$id_promocion','$id_servicio','$costo_servicio')";
        if (mysql_query($consulta, $this->conexion)){return 1;}
        else{return 0;}
    }
    function ListarPDt_Promocion(){
        $consulta = "SELECT dt.id_dtp as 'Id', p.nom_promocion as 'Promocion', s.nom_servicio as 'Servicio', dt.costo_servicio as 'Costo' FROM dt_promocion dt
INNER JOIN promocion p ON p.id_promocion = dt.id_promocion
INNER JOIN servicio s ON s.id_servicio = dt.id_servicio";
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
    function BusDt_Promocion($promo)
    {
        $consulta="SELECT dt.id_dtp as 'Id', p.nom_promocion as 'Promocion', s.nom_servicio as 'Servicio', dt.costo_servicio as 'Costo' FROM dt_promocion dt
INNER JOIN promocion p ON p.id_promocion = dt.id_promocion
INNER JOIN servicio s ON s.id_servicio = dt.id_servicio 
WHERE p.nom_promocion = '$promo'";
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

