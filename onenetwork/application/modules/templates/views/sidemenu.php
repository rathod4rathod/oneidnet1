<div class="menuleft_newwrap">
<div class="hold-transition skin-blue sidebar-mini sidebar-collapse">
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
          <li <?php echo ($activePage == "companyHome" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/office.png" width="24" height="24" /> <a href="<?php echo  base_url().'profile/companyHome/'.$companyid ?>"></span><span>Company Home</span></a></li>
        <?php 
/*Logged company id check with actual comapny page,if yes wil show some settings below */       
    if($owncmpny=="yes")
    echo '<li ' .($activePage == "companySetting" ? "class='active'":"").'><span class="leftmenuclass"> <img src="'. base_url().'assets/images/Co-office Icons/settings.png" width="24" height="24" /> <a href="'. base_url().'profile/companySettings/'.$companyid.'"></span><span>Edit comapany theme</span></a></li>'; ?>
        <li <?php echo ($activePage == "Meeting_Room" ? 'class="active"':''); ?>> <span class="leftmenuclass"> <img src="<?php echo base_url(); ?>assets/images/Co-office Icons/meetingroom.png" width="24" height="24" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Meeting_Room'?>"></span><span>Meeting Room</span></a></li>
        <li <?php echo ($activePage == "Conference_Hall" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/conferencehall.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Conference_Hall'?>"> </span> <span>Conference Hall</span></a></li>
        <li <?php echo ($activePage == "HR_Room" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/hr-room.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/HR_Room'?>"> </span> <span>HR Room</span></a></li>
        <li <?php echo ($activePage == "Reception_Area" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/receptionarea.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Reception_Area'?>"> </span> <span>Reception Area</span></a></li>
        <li <?php echo ($activePage == "Cafeteria" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/cafeteria.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Cafeteria'?>"> </span> <span>Cafeteria</span></a></li>
        <li <?php echo ($activePage == "Fitness_Place" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/fitness.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Fitness_Place'?>"> </span> <span>Fitness Place</span></a></li>
        <li <?php echo ($activePage == "Work_Places" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/workarea.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Work_Places'?>"> </span> <span>Work Places</span></a></li>
        <li <?php echo ($activePage == "Campus" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/campus.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Campus'?>"> </span> <span>Campus</span></a></li>
        <li <?php echo ($activePage == "Logistics_Area" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/logistics.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Logistics_Area'?>"> </span> <span>Logistics Area</span></a></li>
        <li <?php echo ($activePage == "Service_Area" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/servicearea.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Service_Area'?>"> </span> <span>Service Area</span></a></li>
        <li <?php echo ($activePage == "Recreation_Area" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/recreation.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Recreation_Area'?>"> </span> <span>Recreation Area</span></a></li>
        <li <?php echo ($activePage == "Interview_Area" ? 'class="active"':''); ?>> <span class="leftmenuclass"><img src="<?php echo base_url(); ?>assets/images/Co-office Icons/interview.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Interview_Area'?>"> </span> <span>Interview Area</span></a></li>
        <li <?php echo ($activePage == "Rest_Rooms" ? 'class="active"':''); ?>> <span class="leftmenuclass"> <img src="<?php echo base_url(); ?>assets/images/Co-office Icons/restrooms.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Rest_Rooms'?>"> </span> <span>Rest Rooms</span></a></li>
        <li <?php echo ($activePage == "Planning_Area" ? 'class="active"':''); ?>> <span class="leftmenuclass"> <img src="<?php echo base_url(); ?>assets/images/Co-office Icons/planingarea.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Planning_Area'?>"> </span> <span>Planning Area</span></a></li>
        <li <?php echo ($activePage == "Waiting_Hall" ? 'class="active"':''); ?>> <span class="leftmenuclass"> <img src="<?php echo base_url(); ?>assets/images/Co-office Icons/waitingroom.png" /> <a href="<?php echo  base_url().'profile/locationPages/'.$companyid.'/Waiting_Hall'?>"> </span> <span>Waiting Hall</span></a></li>
  </ul>
    </section>
  </aside>
  </div>
</div>