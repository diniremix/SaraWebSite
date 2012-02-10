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
		
		function getPin(){
			//busca un unico PIN para su modificacion 
			//$sql_query="SELECT * FROM `usuarios` WHERE identificacion=$datoUser";
			//$result = mysql_query($sql_query);			
			//$row=mysql_fetch_assoc($result);
			for ($i=2012; $i<=1990 ; $i--) { 
				$anno.='<option value="'.$i.'" >'.$i.'</option>';
			}	
			$row[1].$anno;	
			return $row;
		}	
				
		function getPines(){
			//lista todos los PIN
			$sql_query="SELECT * FROM `pines`";
			$result = mysql_query($sql_query);												
			$consulta='<table class="fullwidth" cellpadding="0" cellspacing="0" border="0">
			<thead>
				<tr>
					<td>Nº</td>
					<td>PIN</td>
					<td>Estado</td>
					<td>Acciones</td>
				</tr>
			</thead><tbody>';
			$clase='<tr class="odd">';
			$i=0;
			while ($row=mysql_fetch_array($result)){
				$i++;
				$ide=$row['id'];
				if($row['estado']==1){
					$estado="Activo";
				}else{
					$estado="Inactivo";					
				}
				if($i%2!=0){
					$consulta.= $clase;
				}else{
					$consulta.='<tr>';
				}

				$consulta.= '   <td>'.$row['id'].'</td>
								<td>'.$row['npines'].'</td>
								<td>'.$estado.'</td>
								<td><a href="#" onclick="xajax_pines(\''.$ide.'\',\'eliminar\'); return false;" class="button" title="Eliminar un PIN"\''. $ide.'\'"><span class="ui-icon ui-icon-trash"></span></a>
								</td>
							</tr>';							
			}
			$consulta.='</tbody></table>';
			return $consulta;						
		}
			
		function setPin($form){
			//genera y guarda un PIN
			$anno=$form['tanno'];
			$mesa=$form['mesa'];
			$mesb=$form['mesb'];			
			$code=$form['code'];
			$pinGen=md5($anno.$mesa.$mesb.$code);

			$sql_query="INSERT INTO `pines` (`npines`,`estado`)";
			$sql_query.=" VALUES('$pinGen',1)";
			$result = mysql_query($sql_query);
			return true;
		}	

		function delPin($data){
			//eliminar un PIN
			$query_del="DELETE FROM `pines` WHERE `id`=$data";			
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
			case 'cargarPin' :
					$objResponse->call("nuevoPin");
					/*if($ok=$objconexion->getPin()){
						$objResponse->assign("tanno", "value", $ok[1]);
						//$objResponse->assign("nombres", "value", $ok['nombres']);
						//$objResponse->assign("apellidos", "value", $ok['apellidos']);
					}*/
					
					//$objResponse->assign("msgbpin","innerHTML",$div);										
			break;

			case 'guardar' :
					if($ok=$objconexion->setPin($formData)){
						$div='<div id="tipsuccess" name="tipsuccess" class="message success close"><h2>Felicidades!</h2><p>El PIN ha sido guardado con exito.</p></div>';						
					}else{
						$div='<div id="tiperror" name="tiperror" class="message error close"><h2>Alerta!</h2><p>El PIN fue generado, pero <strong>NO</strong> pudo ser guardado en la base de datos.</p></div>';
					}
					$objResponse->assign("msgpin","innerHTML",$div);
					//$objResponse->call("<script>$('#msgpin').hide(2000);</script>");
			break;	
			case 'eliminar' :
				$objResponse->alert('Eliminando PIN');
				if($ok=$objconexion->delPin($formData)){
					$objResponse->call("allPines");
					//$objResponse->call("allPines");
				}
			break;
			default :
				$div='<div id="tipwarning" name="tipwarning" class="message warning close"><h2>Alerta!</h2><p>Ha ocurrido un Error inesperado!.</p></div>';
			break;
		}
		
		return $objResponse;
	}
?>
