<?php
	require_once ("../xajax0_6/xajax_core/xajax.inc.php");
	//conjunto de funciones para el login de usuarios
	class loginClass {
		var $conn;
	 	var $host;
	 	var $username;
	 	var $password;
	 	var $db;
	 	
	 	function loginClass(){
	 		//Constructor
	 		$this->host='localhost';
	 		$this->username='root';
	 		$this->password='';
	 		$this->db='saradb';
	 	}
		
		function connect(){
			$conn = mysql_connect('localhost','root','') or die( mysql_error() );
			mysql_select_db('saradb',$conn) or die( mysql_error() );
			return $this->conn;
		}
		
		function getUsuario($datoUser){
			//busca por el usuario que se logea y crea la sesion
			session_start();
			$user=$datoUser['username'];
			$contrasenna=$datoUser['password'];
			//$contrasenna=md5($contrasenna);

			$sql_query="SELECT * FROM `usuarios`";
			$result = mysql_query($sql_query);			

			$encontrado=false;
			while ($row=mysql_fetch_array($result)){
				if($row["user"] == $user && $row["contrasenna"]==$contrasenna){
					$_SESSION['session_login'] = $row['user'];
					$_SESSION["session_rol"] = $row['usuario_tipo'];
					$encontrado=true;				
				}else{					
					$encontrado=false;				
				}			
			}
			return $encontrado;		
		}	
									
		function resetUsuario($form){
			//valida el nombre de usuario y email y crea 
			//una nueva contrasenna
			$user=$datoUser['username2'];
			$email=$datoUser['edmail'];

			//$sql_query="SELECT * FROM `usuarios` WHERE user='.$user.'AND email='.$email.'";
			//$sql_query="SELECT * FROM `usuarios` WHERE user=$user AND email=$email";
			$sql_query="SELECT * FROM `usuarios`";
			$result = mysql_query($sql_query);			

			$encontrado=false;
			while ($row=mysql_fetch_array($result)){
				if($row["user"] == $user && $row["email"]==$email){
					$encontrado=true;				
				}else{					
					$encontrado=false;				
				}			
			}
			return $row;	
		}		
	}//conexionClass 

	function login($formData,$param){
		//menu ppal
		$objResponse = new xajaxResponse();
		$objconexion = new loginClass();
		$objconexion->connect();
		$div='';
		switch ($param) {
			case 'login' :
					if($ok=$objconexion->getUsuario($formData)){
						$objResponse->redirect( "index.php" );
					}else{
						$div='<div align="center" id="tiperror" name="tiperror" class="message error close"><h2>Lo sentimos!</h2><p>El usuario con que intenta iniciar sesi&oacute;n no se encuentra en la base de datos.</p></div>';
						$objResponse->assign("msglogin","innerHTML",$div);				
					}
			break;
			case 'restablecer' :
					if($ok=$objconexion->resetUsuario($formData)){
						$objResponse->call("login");
					}else{												
						$div='<div align="center" id="tiperror" name="tiperror" class="message error close"><h2>Alerta!</h2><p>El usuario NO pudo ser encontrado en la base de datos, favor contacte con el administrador.</p></div>';
						$objResponse->assign("msgrest","innerHTML",$div);
					}
			break;	
			default :
				$div='<div id="tipwarning" name="tipwarning" class="message warning close"><h2>Alerta!</h2><p>Ha ocurrido un Error inesperado!.</p></div>';
			break;
		}
		
		return $objResponse;
	}
?>
