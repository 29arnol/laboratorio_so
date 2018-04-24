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
            $this->Cell(700,1, 'EXAMEN HISTORICO DE AUDIOMETRIA',0,1,'C');

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
    }

 ?>