<?php  
	function Conectar(){
		$Parametros = parse_ini_file("configuracion.init");
		$ServerName = $Parametros['Server'];
		$User = $Parametros['Username'];
		$Password = $Parametros['Password'];
		$BD = $Parametros['DataBase'];
		$Conexion = mysqli_connect($ServerName,$User,$Password,$BD);
		return $Conexion;
	}
	function Consulta($Conexion, $SQL){
		$Query = mysqli_query($Conexion, $SQL); //or die(mysqli_error($Conexion));
		return $Query;
	}
	function Desconectar($Conexion)
	{
		mysqli_close($Conexion);
	}
?>