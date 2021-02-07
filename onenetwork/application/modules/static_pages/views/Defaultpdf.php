<?php
require('application/libraries/fpdf/fpdf.php');
require('application/libraries/FPDI-master/fpdi.php');
$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Times','B',14);
$pdf->Cell(0,5,'RESUME',0,1,'C');

$pdf->nameresume('');
/*-------Career objictive-------------------*/
    
  foreach($cvbank_user_info as $cvbank_user_information)
{
    $profilename_name=$cvbank_user_information["profile_name"];
  $pdf->SetX(100);
$pdf->nameresume('Name : '.$cvbank_user_information["profile_name"]);


    $pdf->SetFont('Times','B',10);
    $pdf->SetTextColor(254,254,254);
    $pdf->SetFillColor(0,0,0);
    $pdf->Cell(0,6,'OBJECTIVE',1,1,'L',1);

    $pdf->SetFont('Times','',10);
    $pdf->SetTextColor(0,0,0);

$pdf->Cell(0,2, " ", '','1' );
$pdf->SetFont('arial',"",'10');
$pdf->gogreen_personal_details("Country",$cvbank_user_information['country_id'],'Physically Challenged',$cvbank_user_information['is_phc']);
$pdf->gogreen_personal_details("State",$cvbank_user_information['state_id'],'Gender',$cvbank_user_information['gender']);
$pdf->gogreen_personal_details("City",$cvbank_user_information['city_id'],'Marital status',$cvbank_user_information['marital_status']);
$address=$cvbank_user_information['address_line1']."\n".$cvbank_user_information['address_line2'];
$pdf->gogreen_personal_details("date of birth",$cvbank_user_information['dob'],'Address',$address);
$pdf->Ln();

  
}

    $pdf->Ln(3);
/*----------work expirience----------------------------*/
    $pdf->basicdetails("WORK EXPIRIENCE");
    $pdf->Ln(3);
    
    foreach($position_info as $position_info_view)
  {
       $pdf->SetFont('Times','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(120,6,$position_info_view['work_start_date'].' To '.$position_info_view['work_end_date'].' : '.$position_info_view['employer_name'],0,1,'L');
    $pdf->addrpdr("Designation : ".$position_info_view['job_title']);
    $pdf->addrpdr("Job Description : ".$position_info_view['job_description']);
    
    $pdf->Ln(2);
      
    }
   
  
     $pdf->Ln(3);
/*----------------------EDUCATION----------------------------------*/
    $pdf->basicdetails("EDUCATION");
    $pdf->Ln(3);
    
    foreach($cvbank_user_educatin_info as $cvbank_user_educatin)
    {
      $pdf->SetFont('Times','B',10);
      $pdf->SetTextColor(0,0,0);
      $pdf->cell(120,6,$cvbank_user_educatin['start_year']."-".$cvbank_user_educatin['end_year'].' :  '.$cvbank_user_educatin['degree'],0,1,'');
      $pdf->addrpdr("Institute Name : ".$cvbank_user_educatin['institution_name']); 
      $pdf->addrpdr("University : ".$cvbank_user_educatin['university']); 
    }
    
    $pdf->Ln(3);
/*------Personal Details---------*/  
   /* $pdf->basicdetails("PERSONAL DETAILS");
    $pdf->Ln(3);
    $pdf->addrpdr("Name:Gouthami");
    $pdf->addrpdr("Father Name:Krishna Reddy");
    $pdf->addrpdr("Email:Gouthami@gmail.com");
    $pdf->addrpdr("Phone:+91-9948523123");
    $pdf->addrpdr("Gender:Female");
    $pdf->addrpdr("Marrital status:Single");
    $pdf->addrpdr("Addres:H.No:5-83/2,manipuri colony,saroornagar,hyderbad.");
    $pdf->addrpdr("PinCode:500035");
    $pdf->addrpdr("");*/
   
/*-------- LANGUAGES what you are Knowt----------*/
$pdf->SetXY(140,85);

$pdf->langdetal('LANGUAGES');


$pdf->SetX(140);
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(254,254,254);
$pdf->MultiCell(18,6,'Languages',0,1,'L');
$pdf->SetXY(158,91);
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(254,254,254);
$pdf->MultiCell(10,6,'Read',0,0,'L');

$pdf->SetXY(168,91);
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(254,254,254);
$pdf->MultiCell(12,6,'Write',0,0,'L');

$pdf->SetXY(179,91);
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(254,254,254);
$pdf->MultiCell(15,6,'Speak',0,0,'L');
$yy=96;
$xx=163;

$languages_konwn='';
for($lfv=0;$lfv<count($language_info);$lfv++)
  {
if($language_info[$lfv]['lang_proficiency']){
    $sdata=json_decode($language_info[$lfv]['lang_proficiency']);
    if($lfv==0){
      $languages_konwn.=$sdata->languageName;
     }
     else{
        $languages_konwn.=",".$sdata->languageName; 
     }
 
    $pdf->SetX(140);
$pdf->langdesc($sdata->languageName);
$pdf->SetX(150);
if($sdata->read=='on'){$pdf->Image(base_url()."assets/images/checkmark.png",$xx,$yy,4);$xx=$xx+10;}else{$pdf->Image(base_url()."assets/images/closeButton.png",$xx,$yy,2);$xx=$xx+10;}
if($sdata->write=='on'){$pdf->Image(base_url()."assets/images/checkmark.png",$xx,$yy,4);$xx=$xx+12;}else{$pdf->Image(base_url()."assets/images/closeButton.png",$xx,$yy,2);$xx=$xx+12;}
if($sdata->speak=='on'){$pdf->Image(base_url()."assets/images/checkmark.png",$xx,$yy,4);$xx=$xx+10;}else{$pdf->Image(base_url()."assets/images/closeButton.png",$xx,$yy,2);$xx=$xx+10;}
$yy=$yy+6;
$xx=163;
  }
 } 
/*for($u=1;$u<=5;$u++)
{
$pdf->SetX(140);
$pdf->langdesc('English');
$pdf->SetX(150);
$pdf->Image(base_url()."assets/images/checkmark.png",$xx,$yy,4);$xx=$xx+10;
$pdf->Image(base_url()."assets/images/checkmark.png",$xx,$yy,4);$xx=$xx+12;
$pdf->Image(base_url()."assets/images/closeButton.png",$xx,$yy,2);$xx=$xx+10;
$yy=$yy+6;
$xx=163;
}*/

/*--------Software Langages wht you are Expert----------*/
  $yyy=$yy+9;
$pdf->SetX(140);
$pdf->langdetal('Skills');
$pdf->Ln(2);
$pdf->SetX(140);
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(254,254,254);
$pdf->MultiCell(18,6,'Languages',0,1,'L');
$pdf->SetXY(158,$yyy);
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(254,254,254);
$pdf->MultiCell(10,6,'Read',0,0,'L');

$pdf->SetXY(168,$yyy);
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(254,254,254);
$pdf->MultiCell(12,6,'Write',0,0,'L');

$pdf->SetXY(179,$yyy);
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(254,254,254);
$pdf->MultiCell(15,6,'Speak',0,0,'L');

$yy1=$yyy+6;
$xx1=163;

if($skill_info){
foreach($skill_info as $skill_info_view)
{
    $sdata=json_decode($skill_info_view['technology_str']);
  
    //$pdf->tablerow( $sdata->skillName,$sdata->proficiencyLevel,$sdata->expinMonths);
     
    $pdf->SetX(140);
  $pdf->langdesc($sdata->skillName);
  $pdf->SetX(150);
  if($sdata->proficiencyLevel=='Beginner'){$pdf->Image(base_url()."assets/images/checkmark.png",$xx1,$yy1,4);$xx1=$xx1+10;}else{$pdf->Image(base_url()."assets/images/closeButton.png",$xx1,$yy1,2);$xx1=$xx1+10;}
  if($sdata->proficiencyLevel=='Medium'){$pdf->Image(base_url()."assets/images/checkmark.png",$xx1,$yy1,4);$xx1=$xx1+12;}else{$pdf->Image(base_url()."assets/images/closeButton.png",$xx1,$yy1,2);$xx1=$xx1+12;}
  if($sdata->proficiencyLevel=='Expert'){$pdf->Image(base_url()."assets/images/checkmark.png",$xx1,$yy1,4);$xx1=$xx1+12;}else{$pdf->Image(base_url()."assets/images/closeButton.png",$xx1,$yy1,2);$xx1=$xx1+12;}
  $yy1=$yy1+6;
  $xx1=163;
    
}
}
$pdf->Ln(3);

/*--------Skills you are Expert----------*/
/*$pdf->SetX(140);
$pdf->langdetal('Projects');
$pdf->Ln(2);
$pdf->SetX(140);
$pdf->langdesc('Punctual:');
$pdf->SetX(140);
$pdf->langdesc('Travalant:');
$pdf->Ln(3);8?

/*--------HOBBIES----------*/

/*$pdf->SetX(140);
$pdf->langdetal('HOBBIES');
$pdf->Ln(2);
$pdf->SetX(140);
$pdf->langdesc('Punctual:');
$pdf->SetX(140);
$pdf->langdesc('Travalant:');
$pdf->Ln(3);
*/

/*--------footer----------*/
$pdf->SetXY(150,265);
$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(30,6,$profilename_name,0,1,'L');

$pdf->SetXY(5,250);
$pdf->namepdf('Date:');
$pdf->SetXY(6,255);
$pdf->namepdf('Place:');

$outputPdfName = $gprofilesName.".pdf"; 
if(file_exists('../netpro/safebox/CvBank/'.$outputPdfName))
unlink('../netpro/safebox/CvBank/'.$outputPdfName);  
$pdf->output('../netpro/safebox/CvBank/'.$outputPdfName); 
chmod('../netpro/safebox/CvBank/'.$outputPdfName,0777);


class fpdi_rotate extends FPDI { 
    var $angle=0; 
    function Rotate($angle,$x=-1,$y=-1) 
    { 
        if($x==-1) 
            $x=$this->x; 
        if($y==-1) 
            $y=$this->y; 
        if($this->angle!=0) 
            $this->_out('Q'); 
        $this->angle=$angle; 
        if($angle!=0) 
        { 
            $angle*=M_PI/180; 
            $c=cos($angle); 
            $s=sin($angle); 
            $cx=$x*$this->k; 
            $cy=($this->h-$y)*$this->k; 
            $this->_out(sprintf('q %.5f %.5f %.5f %.5f %.2f %.2f cm 1 0 0 1 %.2f %.2f cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy)); 
        } 
    } 
    function _endpage() 
    { 
        if($this->angle!=0) 
        { 
            $this->angle=0; 
            $this->_out('Q'); 
        } 
        parent::_endpage(); 
    } 
} 
    $pdf =  new fpdi_rotate(); 
    if (file_exists('../netpro/safebox/CvBank/'.$outputPdfName)){
        $pagecount = $pdf->setSourceFile('../netpro/safebox/CvBank/'.$outputPdfName);
    } 
    if($pagecount){
    for($i=1; $i <= $pagecount; $i++) {   
        $tpl = $pdf->importPage($i);    
        $pdf->addPage();
        $pdf->useTemplate($tpl, 1, 1, 0, 0, TRUE);
        $pdf->Rotate(45); 
        $pdf->SetTextColor(255,192,203);

        $pdf->SetFont('Arial','B',20);  
//        $pdf->SetXY(30, 100);  
//        $pdf->Write(0, "o n e i d n e t");
       // $pdf->Cell($pdf->w,$pdf->h,"Your Content",0,1,"C");
        $pdf->Cell(250,210,"O N E I D N E T");
         //$pdf->Image('oneidlogo.png', 30, 250, 100, '', '', '', '', false, 360);
        // $pdf->Image('oneidlogo.png', 30, 120, 0, 0, 'png');
        $pdf->Rotate(0);
    }}
    $pdf->Output('../netpro/safebox/CvBank/'.$userid."/".$outputPdfName);
    $pdf->Output($outputPdfName,'D');
    chmod('../netpro/safebox/CvBank/'.$userid."/".$outputPdfName,0777);    

