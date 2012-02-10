<?php
//ruta relativa a xajax
require_once ("../xajax0_6/xajax_core/xajax.inc.php");
/**
 * 
 */
 class conexion {
 	var $conn;
 	var $sLogFile;
 	var $host='localhost';
 	var $username='root';
 	var $password='';
 	var $db='cdcol';
 	function __construct(){
 		# code...
 	}
 	function connect(){
		$this->conn = mysql_connect($this->host,$this->username,$this->password) or die( mysql_error() );
		mysql_select_db($this->db,$this->conn) or die( mysql_error() );
		return $this->conn;
	}

	function redirect(){
	    /*$objResponse=new xajaxResponse();
	    $objResponse->redirect( "http://www.xajaxproject.org" );
	    return $objResponse;*/
	}

	function buscar(){
		//connect('localhost','root','','sigei');
			$sql =	"SELECT * FROM usuarios";
			$result = mysql_query($sql);		
			$encontrado=false;
			$consulta = "";				
			while($row = mysql_fetch_array($result)){
				$consulta .= '<br> cancion: '.$row['titel'].' de: '.$row['interpret'];
			}
			return  $consulta;
	}
 }
 
	function testForm($formData){
		$objResponse = new xajaxResponse();
		$objResponse->alert("hola xajax_06");
		$objResponse->assign("divresponse", "innerHTML",'<div id="submittedDiv">hola</div>');
		return $objResponse;
	}

$xajax = new xajax();
//$xajax->configure("debug", true);
$xajax->register(XAJAX_FUNCTION, "testForm");
$xajax->configure('javascript URI','../xajax0_6');
$xajax->processRequest(); 
?>
