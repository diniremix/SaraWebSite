<?php
	require('pdfMysqlTable.php');
	class PDF extends PDF_MySQL_Table{
		//Cabecera de página
		function Header(){
			//Logo
			$this->Image('images/saraheader.jpg',0,0,0,0);
			//Arial bold 15
			$this->SetFont('Arial','B',10);
			//Movernos a la derecha
			/*$this->Cell(80);
			//Título
			$this->Cell(30,10,'Title',1,0,'C');*/
			//Salto de línea
			//Title
			$this->Ln(75);
			$this->Cell(0,0,'Matriculas activas generadas por el Sistema SARA',0,0,'L');
			$this->Ln(5);
			//Ensure table header is output
			parent::Header();
		}
		//Pie de página
		function Footer(){
			//Posición: a 1,5 cm del final
			$this->Image('images/sarafooter.jpg',0,258,0,0);
			$this->SetY(0);
			//Arial italic 8
			$this->SetFont('Arial','I',8);
			//Número de página
			$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');//PageNo().'/{nb}'
		}

		function WriteHTML($html){
		    // Intérprete de HTML
		    $html = str_replace("\n",' ',$html);
		    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
		    foreach($a as $i=>$e)
		    {
		        if($i%2==0)
		        {
		            // Text
		            if($this->HREF)
		                $this->PutLink($this->HREF,$e);
		            else
		                $this->Write(5,$e);
		        }
		        else
		        {
		            // Etiqueta
		            if($e[0]=='/')
		                $this->CloseTag(strtoupper(substr($e,1)));
		            else
		            {
		                // Extraer atributos
		                $a2 = explode(' ',$e);
		                $tag = strtoupper(array_shift($a2));
		                $attr = array();
		                foreach($a2 as $v)
		                {
		                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
		                        $attr[strtoupper($a3[1])] = $a3[2];
		                }
		                $this->OpenTag($tag,$attr);
		            }
		        }
		    }
		}
		function OpenTag($tag, $attr){
		    // Etiqueta de apertura
		    if($tag=='B' || $tag=='I' || $tag=='U')
		        $this->SetStyle($tag,true);
		    if($tag=='A')
		        $this->HREF = $attr['HREF'];
		    if($tag=='BR')
		        $this->Ln(5);
		}

		function CloseTag($tag){
		    // Etiqueta de cierre
		    if($tag=='B' || $tag=='I' || $tag=='U')
		        $this->SetStyle($tag,false);
		    if($tag=='A')
		        $this->HREF = '';
		}

		function SetStyle($tag, $enable){
		    // Modificar estilo y escoger la fuente correspondiente
		    $this->$tag += ($enable ? 1 : -1);
		    $style = '';
		    foreach(array('B', 'I', 'U') as $s)
		    {
		        if($this->$s>0)
		            $style .= $s;
		    }
		    $this->SetFont('',$style);
		}

		function PutLink($URL, $txt){
		    // Escribir un hiper-enlace
		    $this->SetTextColor(0,0,255);
		    $this->SetStyle('U',true);
		    $this->Write(5,$txt,$URL);
		    $this->SetStyle('U',false);
		    $this->SetTextColor(0);
		}
	}//class
	
	function Error(){		
		$errormsg ="<div class='status error'><strong>SARA</strong> no ha podido generar el informe.<a href=\"javascript:history.back();\" >volver</a></div>";
		//$errormsg.= "<a href='index.php'>Iniciar Sesi&oacute;n</a>";
		echo $errormsg;
		//return $errormsg;
	}
			
	//Conexion a la base de datos
	mysql_connect('localhost','root','');
	mysql_select_db('saradb');
	//
	$sql =	"SELECT * FROM `usuarios` WHERE id=1";
	$result = mysql_query($sql);
	
	if($row = mysql_fetch_array($result)){
			$user=$row['nombres'];
	}else{
		$user="invitado";
	}
	//
	//Instancia de la clase
	$pdf=new PDF();
	//titulos, autor y de demas 
	$title='Reporte de Matriculas';
	$pdf->SetTitle($title);
	$pdf->SetAuthor('Sara ['.$user.']');
	$pdf->SetSubject('Reporte de Matriculas');
	$pdf->SetCreator('SARA Version 0.3');
	//agregar pagina
	$pdf->AddPage();
	$pdf->Ln(5);
	//consultas para generar las tablas 
	$pdf->Table('SELECT id as "Nº",nombres,apellidos,estrato,ciudad,cicfes as "Icfes",npin as "PIN" FROM `matriculas` WHERE estado>=1');	
	//Pie de pagina
	$pdf->Ln(120);
	$pdf->Cell(0,0,'Sistema Administrativo de Registro Académico SARA V. 0.3',0,0,'L');
	$pdf->Ln(5);
	$pdf->Cell(0,0,'Monteria, Febrero 2012.',0,0,'L');
	$pdf->Ln(5);
	$html = 'Visítenos <a href="http://localhost/sara/admin.php">SARA</a>.';
	$pdf->WriteHTML($html);
	$pdf->Output($title.'.pdf','I');
?>
