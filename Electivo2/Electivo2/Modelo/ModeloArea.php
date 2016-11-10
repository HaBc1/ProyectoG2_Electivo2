<?php
Class AreaDAO{
    private $conexion;
    private static $instancia;
    private function __construct() {
        $this->conexion = mysql_connect("localhost","root","");
        mysql_select_db('proyecto_g2', $this->conexion);
    }
    public static function getInstancia(){
        if(is_null(self::$instancia)){
            self::$instancia = new AreaDAO();
            return self::$instancia;
        }
    }
    function InsertaArea($nombre){
        $consulta = "INSERT INTO `area`(`nom_area`) VALUES ('$nombre')";
        if (mysql_query($consulta, $this->conexion)){return 1;}
        else{return 0;}
    }
    function ListarArea(){
        $consulta = "SELECT id_area as 'ID', nom_area as 'Area', estado_area as 'Estado' FROM area";
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
    function BusArea($nombre)
    {
        $consulta="SELECT id_area as 'ID', nom_area as 'Area', estado_area as 'Estado' FROM area WHERE nom_area = '$nombre'";
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
    
        function eliminaCliente($id)
    {   
        $seid = explode("P", $id);
        $sid = $seid[1];
        $i = (int) $sid;
        if($id!=null)
        {
            $cons = "DELETE FROM `clientenuevo` WHERE `ClienteID` ='$id'";
            mysql_query($cons, $this->conexion);
            return true;
        }
        else
            return false;
    }

function modificacliente($PerId, $nombre, $apellidoPat , $apellidoMat, $dic, $Telf, $email)
   {
        $seid = explode("P", $PerId);
        $sid = $seid[1];
        $i = (int) $sid;
        $consulta = "UPDATE persona SET PerNombre='$nombre', PerApellidoPat='$apellidoPat', PerApellidoMat='$apellidoMat', PerDireccion ='$dic', PerTelf='$Telf', PerEmail='$email' WHERE PerId = '$i'";
        if(mysql_query($consulta,$this->conexion))
		{
			return 1;
		}
		else
		{
			return 0;
		}
   }

	
}
   


