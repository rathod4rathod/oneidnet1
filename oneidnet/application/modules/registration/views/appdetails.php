<?php
$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->basic_info_subheader();
?>
</div>

<div class="clearfix"></div>
<div class="oneidapp_wrapper appcontainer">
<div class="app_header">
    <h1>ONEIDNET App Console</h1>
</div>
  
  <div class="appconnt_middle appdetails">
    	<div class="applist">
        	<div class="applist_dtls">
            	<img src="<?php echo base_url(); ?>assets/Images/iconapp.png" />
                <h3>App Name</h3>
                <h5>Authorized on: 29-11-2016</h5>
                <div class="buttons_app">
                	<button class="btn default-button" onclick="toggleVisibility('one');">View details</button>
                    <button class="btn default-button red_button">Disconnect</button>
                </div>
            </div>
            
            <div class="appdetailview" id="one" style="display:none;"><div class="appname_dtls"> <img src="<?php echo base_url();?>assets/Images/iconapp.png"  class="applogo"/>
        <h2>App Fake Name</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        <ul>
          <li>Lorem ipsum dolor sit amet, assum democritum est in. Adipisci contentiones in his. Eum stet facete salutatus id, civibus sensibus sadipscing at vix.</li>
          <li>Quas pericula prodesset ne eum. Quis feugiat philosophia id mea. Ei diceret dolorem eos.</li>
          <li>At alii ferri graece his, ex eos quidam dolorum scripserit, melius tibique ea has.</li>
          <li>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</li>
          <li>Quas pericula prodesset ne eum. Quis feugiat philosophia id mea. Ei diceret dolorem eos.</li>
          <li>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</li>
        </ul>
      </div></div>
        </div>
        <div class="applist">
        	<div class="applist_dtls">
            	<img src="<?php echo base_url(); ?>assets/Images/iconapp.png" />
                <h3>App Name</h3>
                <h5>Authorized on: 29-11-2016</h5>
                <div class="buttons_app">
                	<button class="btn default-button" onclick="toggleVisibility('two');">View details</button>
                    <button class="btn default-button red_button">Disconnect</button>
                </div>
            </div>
            <div class="appdetailview" id="two" style="display:none;"><div class="appname_dtls"> <img src="<?php echo base_url();?>assets/Images/iconapp.png"  class="applogo"/>
        <h2>App Fake Name</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
        <ul>
          <li>Lorem ipsum dolor sit amet, assum democritum est in. Adipisci contentiones in his. Eum stet facete salutatus id, civibus sensibus sadipscing at vix.</li>
          <li>Quas pericula prodesset ne eum. Quis feugiat philosophia id mea. Ei diceret dolorem eos.</li>
          <li>At alii ferri graece his, ex eos quidam dolorum scripserit, melius tibique ea has.</li>
          <li>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</li>
          <li>Quas pericula prodesset ne eum. Quis feugiat philosophia id mea. Ei diceret dolorem eos.</li>
          <li>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</li>
        </ul>
      </div></div>
        </div>
        
        
        
    
  </div>
</div>
<!--module container end here-->
<div class="clearfix"></div>
<script>var divs = ["one", "two"];
var visibleDivId = null;

function toggleVisibility(divId) {
  if(visibleDivId === divId) {
    visibleDivId = null;
  } else {
    visibleDivId = divId;
  }

  hideNonVisibleDivs();
}

function hideNonVisibleDivs() {
  var i, divId, div;

  for(i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);

    if(visibleDivId === divId) {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
}</script>
<?php $this->templates->basic_info_footer();?>
<script src="<?php echo base_url()."assets/microjs/addcontacts.js"; ?>"></script>
