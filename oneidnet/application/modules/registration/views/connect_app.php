<?php
$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->basic_info_subheader();
?>
</div>

<div class="clearfix"></div>
<div class="oneidapp_wrapper appcontainer">
  <div class="app_header">
    <h1>Connect App name with ONEIDNET</h1>
  </div>
  <div class="appconnt_top">
    <div class="oneidnet_logoforapp"> <img src="<?php echo base_url(); ?>assets/basic_info/images/logo.png" /> </div>
    <div class="not_connected">
    	<div class="plug"><span class="firstchild"></span>
        <span class="secondchild"><p></p></span></div>
    </div>
    <div class="app_logowithname"><img src="<?php echo base_url(); ?>assets/Images/iconapp.png" />
    	<h2>App Fake Name</h2>
    </div>
  </div>
  <div class="appconnt_middle">
    <div class="appleft_container">
      <div class="appname_dtls"> <img src="<?php echo base_url();?>assets/Images/iconapp.png"  class="applogo"/>
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
      </div>
    </div>
    <div class="appright_container">
    	<h3>Login</h3>
      <div class="apploginform">
        <form class="form">
          <div class="form-group">
          	<input type="text" value="" placeholder="Username" class="form-control" />
          </div>
          <div class="form-group">
          	<input type="password" value="" placeholder="Password" class="form-control" />
          </div>
          <div class="form-group button_group">
          	<input type="submit" value="Sign in" class="btn default-button" />
          </div>
        </form>
      </div>
      <div class="appinfo">
        <h3><i class="fa fa-info"></i>Info</h3>
        <ul>
           <li>Lorem ipsum dolor sit amet, assum democritum est in. Adipisci contentiones in his. Eum stet facete salutatus id, civibus sensibus sadipscing at vix.</li>
          <li>Quas pericula prodesset ne eum. Quis feugiat philosophia id mea. Ei diceret dolorem eos.</li>
          <li>At alii ferri graece his, ex eos quidam dolorum scripserit, melius tibique ea has.</li>
          <li>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</li>
          <li>Quas pericula prodesset ne eum. Quis feugiat philosophia id mea. Ei diceret dolorem eos.</li>
          <li>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--module container end here-->
<div class="clearfix"></div>
<?php $this->templates->basic_info_footer();?>
<script src="<?php echo base_url()."assets/microjs/addcontacts.js"; ?>"></script>
