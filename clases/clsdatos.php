<?php
class clsdato
{
   var $con;
   var $servidor; 
   var $usuario; 
   var $clave; 
   var $basedatos;

   function __construct()

	{
		$this->servidor="localhost";
		$this->usuario="root";
		$this->clave="12345678";
		$this->basedatos="alquileres";
		//$mysqli = new mysqli("localhost", "yomulite_alquiler", "3OOT{P8C;wCw", "yomulite_alquileres"); 
		$this->servidor="localhost";
		$this->usuario="yomulite_alquiler";
		$this->clave="3OOT{P8C;wCw";
		$this->basedatos="yomulite_alquileres";

	}

	function abrir()
	{
		try 
		{
			$this->con = new mysqli($this->servidor, $this->usuario, $this->clave, $this->basedatos);
		} 
		catch (Exception $e) 
		{
			echo $this->con->connect_errno;	
			exit();
		}
	}
	
	function select($sql)
	{
		//echo $sql;
	    if ($tb = $this->con->query($sql)) 
		{
		 // echo "<script> alert('si') </script>";
		  return $tb;

		}
		else
		{
			//echo "<script> alert('no') </script>";	
			return false;   
	    }
	}


	function siguiente($tb)
	{
	   $fila=$tb->fetch_array();
	//     var_dump($fila) ;
	   return $fila;
	}

	function ejecutar($sql)
	{
	    if ($tb = $this->con->query($sql)) 
		{
		  $n=$tb->num_rows($sql);
		  return $n;
		}
	}

	function todos($tb)
	{
	   $fila=$tb->fetch_all(MYSQLI_BOTH);
	   return $fila;
	}

   function cerrar($tb=0)
   {
   	 try
   	  {
   	  	 mysqli_close($this->con);
     	  //$tb->close();
     	}
     catch(Exception $e)
     {
     	return 0;
     } 
   }

   

  function fechatobd($fecha)
  {
     if ($fecha!="")
	 {
	  $dia=substr($fecha,0,2);
	  $mes=substr($fecha,3,2);
	  $ano=substr($fecha,6,4);
	  $fecha=$ano."-".$mes."-".$dia;
	 }
	 return $fecha;
  }

  function fechatotext($fecha)
  {
     if ($fecha!="")
	 {
	  $dia=substr($fecha,8,2);
	  $mes=substr($fecha,5,2)+1-1;
	  $ano=substr($fecha,0,4);
	  //14-03-2018
	  //2018-03-14
	  if ($mes==1)
		  $mest="Enero";
	  Elseif ($mes==2)
		  $mest="Febrero";
	  Elseif ($mes==3)
		  $mest="Marzo";
	  Elseif ($mes==4)
		  $mest="Abril";
	  Elseif ($mes==5)
		  $mest="Mayo";
	  Elseif ($mes==6)
		  $mest="Junio";
	  Elseif ($mes==7)
		  $mest="Julio";
	  Elseif ($mes==8)
		  $mest="Agosto";
	  Elseif ($mes==9)
		  $mest="Septiembre";
	  Elseif ($mes==10)
		  $mest="Octubre";
	  Elseif ($mes==11)
		  $mest="Noviembre";
	  Elseif ($mes==12)
		  $mest="Diciembre";
	 }

	 $fecha=$mest." ".$dia.", ". $ano;
	 return $fecha;
  }


    function generarcodigo($tabla,$campo,$longitud)
  {
     $aux="1";
	 $sql= "select max($campo) as mayor from $tabla";
	 $this->abrir();
	 $tb=$this->select($sql);
	 if ($row=$this->siguiente($tb))
	 {
	    // convierte de string a numero colocandole el 0
	    $aux=(0+$row["mayor"])+1;
	 }
	 $this->cerrar($tb);
	 // aqui convierte de numero a string colocandole el punto que es el operardor de concatenación
	 $aux="".$aux;
	 $aux=$this->completarcerosizquierda($aux,$longitud);
	 return $aux;
  }

   function completarcerosizquierda($num,$longitud)
   {
     $aux=$num;
	 $n=$longitud-strlen($aux);
	 for ($i=0;$i<$n;$i++)
	 {
	    $aux="0".$aux;
	 }
	  return $aux;
	 
   }

   function generarcodigoletra($tabla,$campo,$longitud, $texto)
  {
   $aux="1";
   $sql= "select max($campo) as mayor from $tabla";
	 $this->abrir();
	 $tb=$this->select($sql);
	 if ($row=$this->siguiente($tb))
   {
      // convierte de string a numero colocandole el 0
      $mayor=substr($row["mayor"], strlen($texto)+1);
  //    echo "mayor".$mayor;
      $aux=(0+$mayor)+1;
//      echo "aux genera:".$aux;
   }
   //$this->cerrar($tb);
   // aqui convierte de numero a string colocandole el punto que es el operardor de concatenación
   $aux="".$aux;
   $aux=$this->completarcerosizquierda($aux,$longitud);
   return $texto."-".$aux;
  }
  
}
?>