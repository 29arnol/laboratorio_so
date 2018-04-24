<?php 
	require('fpdf/fpdf.php');
	    class PDF extends FPDF
    {
        function Header()
        {
            $this->Image('images/formato.png', 10, 1, 180 );
            $this->SetFont('Arial','B',11);
            $this->Cell(10);
            $this->Cell(700,18, 'LABORATORIO DE SEGURIDAD Y SALUD EN EL TRABAJO',0,1,'C');
            $this->Cell(700,1, 'EXAMEN DE PSICOLOGIA',0,1,'C');

            $this->Ln(18);
           //$this->Cell(100,105, 'Datos de Empresa',0,0,'C');

        }
        
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I', 8);
            $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
        } 
                function hoja1(){
		//$this->Image('images/marca.png','40','50','250','300','PNG');                             
		            //IMAGE (RUTA,X,Y,ANCHO,ALTO,EXTEN)          
		}
/*			    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
	    {
	        //Get string width
	        $str_width=$this->GetStringWidth($txt);

	        //Calculate ratio to fit cell
	        if($w==0)
	            $w = $this->w-$this->rMargin-$this->x;
	        $ratio = ($w-$this->cMargin*2)/$str_width;

	        $fit = ($ratio < 1 || ($ratio > 1 && $force));
	        if ($fit)
	        {
	            if ($scale)
	            {
	                //Calculate horizontal scaling
	                $horiz_scale=$ratio*100.0;
	                //Set horizontal scaling
	                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
	            }
	            else
	            {
	                //Calculate character spacing in points
	                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
	                //Set character spacing
	                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
	            }
	            //Override user alignment (since text will fill up cell)
	            $align='';
	        }

	        //Pass on to Cell method
	        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

	        //Reset character spacing/horizontal scaling
	        if ($fit)
	            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
	    }

		function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
	    {
	        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
	    }*/

 function cabeceraHorizontal($cabecera)
    {
		$this->SetXY(10, 10);
		$this->SetFont('Arial','B',10);
		$this->SetFillColor(2,157,116);//Fondo verde de celda
		$this->SetTextColor(240, 255, 240); //Letra color blanco
		foreach($cabecera as $fila)
		{
	    	$this->CellFitSpace(30,7, utf8_decode($fila),1, 0 , 'L', true);
    	}
    }

    function datosHorizontal($datos)
    {
		$this->SetXY(10,17);
		$this->SetFont('Arial','',10);
		$this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
		$this->SetTextColor(3, 3, 3); //Color del texto: Negro
		$bandera = false; //Para alternar el relleno
		foreach($datos as $fila)
		{
			//Usaremos CellFitSpace en lugar de Cell
			$this->CellFitSpace(30,7, utf8_decode($fila['nombre']),1, 0 , 'L', $bandera );
			$this->CellFitSpace(30,7, utf8_decode($fila['apellido']),1, 0 , 'L', $bandera );
			$this->CellFitSpace(30,7, utf8_decode($fila['matricula']),1, 0 , 'L', $bandera );
			$this->Ln();//Salto de línea para generar otra fila
			$bandera = !$bandera;//Alterna el valor de la bandera
    	}
    }

    function tablaHorizontal($cabeceraHorizontal, $datosHorizontal)
    {
		$this->cabeceraHorizontal($cabeceraHorizontal);
		$this->datosHorizontal($datosHorizontal);
	}

	//***** Aquí comienza código para ajustar texto *************
    //***********************************************************
	function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);

        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;

        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }

        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);

        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }

    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }

    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
//************** Fin del código para ajustar texto *****************

//
    }








 ?>