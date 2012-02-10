<?php
	require_once ("../xajax0_6/xajax_core/xajax.inc.php");
	//conjunto de funciones para el manejo de PIN
	class pinesClass {
		var $conn;
	 	var $host;
	 	var $username;
	 	var $password;
	 	var $db;
	 	
	 	function pinesClass(){
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
		
		function getPin($datoUser){
			//busca un unico PIN para su modificacion 
			$sql_query="SELECT * FROM `usuarios` WHERE identificacion=$datoUser";
			$result = mysql_query($sql_query);			
			$row=mysql_fetch_assoc($result);
			return $row;		
		}	
				
		function getPines(){
			//lista todos los PIN
			$sql_query="SELECT * FROM `tiposusuarios`";
			$result = mysql_query($sql_query);												
			$consulta='<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<td>Nº</td>
					<td>Nombres</td>
					<td>Descripcion</td>
					<td>Acciones</td>
				</tr>
			</thead><tbody>';
			$clase='<tr class="odd">';
			$i=0;
			while ($row=mysql_fetch_array($result)){
				$i++;
				$ide=$row['id'];
				if($i%2!=0){
					$consulta.= $clase;
				}else{
					$consulta.='<tr>';
				}
				$consulta.= '   <td>'.$row['id'].'</td>
								<td>'.$row['nombre'].'</td>
								<td>'.$row['descripcion'].'</td>
								<td><a href="#" onclick="xajax_pines(\''.$ide.'\',\'eliminar\'); return false;"class="button" title="Eliminar un usuario"\''. $ide.'\'"><span class="ui-icon ui-icon-trash"></span></a><a href="#" onclick="xajax_pines(\''.$ide.'\',\'modificar\'); return false;"class="button" title="Modificar un usuario"><span class="ui-icon ui-icon-pencil"></span></a>
								</td>
							</tr>';							
			}
			$consulta.='</tbody></table>
	';
			return $consulta;						
		}
			
		function setPin($form){
			//guarda un PIN
			$identi=$form['identi'];
			$nombres=$form['nombres'];
			$apellidos=$form['apellidos'];
			$user=$form['user'];
			$pass=md5($form['pass']);
			$tuser=$form['tuser'];
			$sql_query="INSERT INTO `usuarios` (`identificacion`,`nombres`,`apellidos`,`user`,`contrasenna`,`usuario_tipo`)";
			$sql_query.=" VALUES($identi,'$nombres','$apellidos','$user','$pass',$tuser)";
			$result = mysql_query($sql_query);
			return true;
		}	
		function delPin($data){
			//eliminar un PIN
			$query_del="DELETE FROM `tiposusuarios` WHERE `id`=$data";			
			$result1 = mysql_query($query_del);			
			return true;							
		}
		
	}//conexionClass 
	
	function pines($formData,$param){
		//menu ppal
		$objResponse = new xajaxResponse();
		$objconexion = new pinesClass();
		$objconexion->connect();
		$div='';
		switch ($param) {
			case 'buscarTodo' :
					$objResponse->call("allPines");
					$div=$objconexion->getPines();
					$objResponse->assign("msgbpin","innerHTML",$div);										
			break;
			case 'guardar' :
					if($ok=$objconexion->setPin($formData)){
						$div='<div id="tipsuccess" name="tipsuccess" class="message success close"><h2>Felicidades!</h2><p>El usuario ha sido guardado con exito.</p></div>';						
					}else{
						$div='<div id="tiperror" name="tiperror" class="message error close"><h2>Alerta!</h2><p>El usuario NO pudo ser guardado en la base de datos.</p></div>';
					}
					$objResponse->assign("msguser","innerHTML",$div);
			break;	
			case 'eliminar' :
				$objResponse->alert('Eliminando PIN');
				if($ok=$objconexion->delPin($formData)){
					$objResponse->call("allPines");
					//$objResponse->call("allPines");
				}
			break;
			case 'modificar' :
				$objResponse->alert('modificando datos de usuario');			
				if($ok=$objconexion->getPin($formData)){
					$objResponse->assign("identi", "value", $ok['identificacion']);
					$objResponse->assign("nombres", "value", $ok['nombres']);
					$objResponse->assign("apellidos", "value", $ok['apellidos']);
					$objResponse->assign("user", "value", $ok['user']);
					$objResponse->assign("pass", "value", $ok['contrasenna']);
					$objResponse->assign("tuser", "value", $ok['usuario_tipo']);
					$objResponse->call("alluser");
					$objResponse->call("nuevouser");
				}
			break;
			default :
				$div='<div id="tipwarning" name="tipwarning" class="message warning close"><h2>Alerta!</h2><p>Ha ocurrido un Error inesperado!.</p></div>';
			break;
		}
		
		return $objResponse;
	}

/*$xajaxp = new xajax();
$xajaxp->configure("debug", true);
$xajaxp->register(XAJAX_FUNCTION,"pines");
$xajaxp->configure('javascript URI','../xajax0_6');
$xajaxp->processRequest(); 			*/
?>
