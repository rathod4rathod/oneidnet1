
<script type="text/javascript">
function smallBusinessEvents(){		
	var currentMousePos = {x: -2, y: -1};
	var sbcuPos = {tl: 250, tr: 840, bl: 490, br: 1025};
	var sbcoPos = {tl: 335, tr: 1025, bl: 610, br: 1215};
	var sbmrPos = {tl: 490, tr: 840, bl: 580, br: 975};
	var sbdrPos = {tl: 610, tr: 1065, bl: 760, br: 1155};
	var sbRePos = {tl: 625, tr: 840, bl: 765, br: 995};
$(document).mousemove(function(event){
	
	currentMousePos.x = event.pageX;
	currentMousePos.y = event.pageY;
	$('.x').attr('value', currentMousePos.x);	
	$('.y').attr('value', currentMousePos.y);
$('.followMousePointerSection').css({top: currentMousePos.y + 'px', left: (currentMousePos.x + 10) + 'px'});	

		
	if(currentMousePos.x > sbcuPos.tl && currentMousePos.y > sbcuPos.tr && currentMousePos.x < sbcuPos.bl && currentMousePos.y < sbcuPos.br){
		$('.followMousePointerSection').css({display: 'block'});
		$('.coofc_ofcPlan').css({cursor: 'pointer'});
		$('.rname').attr('value', 'Cubicals Room');
		$('.name').attr('value', 'Vinod Kumar');	
		$('.mailID').attr('value', 'tvinodkumar@oneidnet.com');
		$('.position').attr('value', 'Designer');
		}
	else if(currentMousePos.x > sbcoPos.tl && currentMousePos.y > sbcoPos.tr && currentMousePos.x < sbcoPos.bl && currentMousePos.y < sbcoPos.br){
		$('.followMousePointerSection').css({display: 'block'});
		$('.coofc_ofcPlan').css({cursor: 'pointer'});
		$('.rname').attr('value', 'Coference Hall');
		$('.name').attr('value', '');	
		$('.mailID').attr('value', '');
		$('.position').attr('value', '');
		}
	else if(currentMousePos.x > sbmrPos.tl && currentMousePos.y > sbmrPos.tr && currentMousePos.x < sbmrPos.bl && currentMousePos.y < sbmrPos.br){
		$('.followMousePointerSection').css({display: 'block'});
		$('.coofc_ofcPlan').css({cursor: 'pointer'});
		$('.rname').attr('value', 'Meeting Room');
		$('.name').attr('value', '');	
		$('.mailID').attr('value', '');
		$('.position').attr('value', '');
		}
	else if(currentMousePos.x > sbdrPos.tl && currentMousePos.y > sbdrPos.tr && currentMousePos.x < sbdrPos.bl && currentMousePos.y < sbdrPos.br){
		$('.followMousePointerSection').css({display: 'block'});
		$('.coofc_ofcPlan').css({cursor: 'pointer'});
		$('.rname').attr('value', 'Director Room');
		$('.name').attr('value', '');	
		$('.mailID').attr('value', '');
		$('.position').attr('value', '');
		}
	else if(currentMousePos.x > sbRePos.tl && currentMousePos.y > sbRePos.tr && currentMousePos.x < sbRePos.bl && currentMousePos.y < sbRePos.br){
		$('.followMousePointerSection').css({display: 'block'});
		$('.coofc_ofcPlan').css({cursor: 'pointer'});
		$('.rname').attr('value', 'Reception');
		$('.name').attr('value', '');	
		$('.mailID').attr('value', '');
		$('.position').attr('value', '');
		}				
	else{
		$('.followMousePointerSection').css({display: 'none'});
		$('.coofc_ofcPlan').css({cursor: 'auto'});
		$('.rname').attr('value', '');
		$('.name').attr('value', '');	
		$('.mailID').attr('value', '');
		$('.position').attr('value', '');
		}
				
				
	}).mouseover();
	
	
	
	
    }

</script>
<?php


if(isset($officetype)){  ?>
  <script>
   $('.coofc_viewWrapper').css({display: 'none'});
    $('.coofc_votsFooterOptions').css({display: 'none'});
    $('.coofc_OfcWrapper').removeClass('showOffc');
		$('.coofc_sectionViewsWrapper').css({display: 'none'});
		if("Small Business"=="<?php echo $officetype; ?>"){
            smallBusinessEvents();
       }
 $(document.getElementById(<?php echo "'".$officetype."'"; ?>)).addClass('showOffc');
</script>
    
<?php } else{?>
<script>
$(document).ready(function(){
$('select[name = "officeType"]').change(function(){
  $('.coofc_viewWrapper').css({display: 'none'});
    $('.coofc_votsFooterOptions').css({display: 'none'});
    $('.coofc_OfcWrapper').removeClass('showOffc');
		$('.coofc_sectionViewsWrapper').css({display: 'none'});
		
	var officeType = $(this).val();
       
        if(officeType=="Small Business"){
            smallBusinessEvents();
       }else{}
	$('.coofc_vosContentSection').css({display: 'block'});
	$(document.getElementById(officeType)).addClass('showOffc');
	});	
});</script>
<?php } ?>
<div class="followMousePointerSection">
	X = <input type="button" class="x" value="10">
    Y = <input type="button" class="y" value="10">
    <br>
    Room Name = <input type="button" class="rname" value="Name"><br>
	Incharge = <input type="button" class="name" value="Name"><br>
    Email Id = <input type="button" class="mailID" value="Email ID"><br>    
    Position = <input type="button" class="position" value="Email ID">    
    
    
</div>

<!--	<div class="coofc_virtualWrapper2">
    	<div class="coofc_virtualInnerWrapper2">
        
        
            
            <div class="coofc_virtualOfcSection">-->
            
            
                <div class="coofc_vosContentSection">
<!--                <div class="coofc_voHomePlanSection">
                	<img src="<?php echo base_url();?>assets/images/smallOfc/smallOffice_Page-1_Preview.png" class="coofc_ofcMapTumb">
                </div>-->
                
<span class="coofc_ofcWrapper" id="coofc_ofcWrapper_id">

<span class="coofc_OfcWrapper" id="Small Business">
<img src="<?php echo base_url();?>assets/images/smallOfc/smallOfcMap.png" class="coofc_ofcPlan" usemap="#smallOficeMap">
                        
<map name="smallOficeMap">
<area shape="rect" coords="44,12,291,194" alt="Cubicles" onClick="smallOfficeCubicles();" />
<area shape="poly" coords="382,194,416,234,414,384,128,385,129,194,382,194,383,195,383,194,383,196" alt="Conference Hall" onClick="smallOfficeConferenceHall()" />
<area shape="rect" coords="415,234,579,329" alt="Director Room" onClick="smallOfficeDirectorRoom()" />
<area shape="rect" coords="291,12,383,142" alt="Meeting Room" onClick="smallOfficeMeetingRoom()" />
<area shape="poly" coords="435,129,483,163,579,161,578,12,435,11,434,126" alt="Reception" onClick="smallOfficeReception()" />
</map>

<div class="coofc_ofcInfoWrapper">
	<span class="coofc_roomTitleWrapper">Conference Hall</span>
    <span class="coofc_roomDescriptionWrapper">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
</div>

</span>

<span class="coofc_OfcWrapper" id="Medium Business">
<img src="<?php echo base_url();?>assets/images/smallOfc/mediumOfcMap.png" class="coofc_ofcPlan" usemap="#mediumOficeMap">
                        
<map name="mediumOficeMap">
<area shape="rect" coords="60,157,272,353" alt="ConferenceHall" onClick="mediumOfficeConferenceHall()" />
<area shape="rect" coords="383,29,453,86" alt="Director Room" onClick="mediumOfficeDirectorRoom()" />
<area shape="poly" coords="448,254,408,256,410,212,318,211,318,376,409,376,410,356,428,355,429,334,448,335,451,252,449,252" alt="MeetingRoom" onClick="mediumOfficeMeetingRoom()" />
<area shape="poly" coords="455,153,453,71,580,70,581,194,505,197,503,154,453,154" alt="Hr Room" onClick="mediumOfficeHrRoom()" />
<area shape="rect" coords="150,30,382,157" alt="Cubicals" onClick="mediumOfficeCubicals()" />
</map>
</span>

</span>
                </div>
<!--            </div>
            
            
            
        </div>
      
    </div>
    
-->
