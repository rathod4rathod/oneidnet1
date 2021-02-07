<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//define('FPDF_FONTPATH','fpdf/font/');
define('FPDF_FONTPATH',APPPATH.'libraries/fpdf/font/');
require(APPPATH.'libraries/fpdf/fpdf.php');
class Pdf extends FPDF
{
    function __construct()
    {
        parent::__construct();
    }
    // Page header
    function Header11()
    {
        // Logo        
        $this->Image(base_url().'assets/images/avatar-4.jpg',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Campaign Report',0,0,'C');
        // Line break
        $this->Ln(15);
    }
    function Header()
    {        
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Campaign Report',0,0,'C');         
        // Logo        
        //$this->Image(base_url().'assets/images/avatar-4.jpg',10,16,20,20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    // Simple table
    function BasicTable($header, $data)
    {
        // Header
        $i=0;
        $this->SetFont('Arial', 'B',13);
        foreach($header as $col){
            if($i==0){
                $this->Cell(40,8,$col,1);
            }else{
                $this->Cell(30,8,$col,1);
            }
            $i++;
        }
        $this->Ln();
        $this->SetFont('Arial', '');
        // Data
        $j=0;
        $fill=false;
        foreach($data as $row)
        {   
            if($j%2!=0){
                $this->SetFillColor(204, 204, 255);
                $fill=true;
            }
            $this->Cell(40,6,$row["added_on"],1,0,'L',$fill);
            $this->Cell(30,6,$row["total_clicks"],1,0,'L',$fill);
            $this->Cell(30,6,$row["total_views"],1,0,'L',$fill);
            $this->Cell(30,6,$row["total_close"],1,0,'L',$fill);
            $this->Cell(30,6,$row["impression"],1,0,'L',$fill);
            $this->Ln();
            $j++;
            $fill=false;
        }
    }
}