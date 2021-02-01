<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>
<link rel="stylesheet" href="<?php echo base_url() . "/assets/"; ?>css/contributors.css" type="text/css">
<div class="oneshop_container_middle_section mat10">

           <div class="oneshop_left_newcontainer pab10">

      <div class="popupbox_new_wrapper">

           <div class="fll borderbottom mab30 pab5 mat10 wi100pstg">
           <h2>  Package Histories  </h2>
           </div>



       <div class="wi100pstg fll">






   <div class="table-form">



       <div style="width:40%; float:left;">
       <span class="fll black fs14 mar10 lh26">  PACKAGE NAME </span>
       <div class="box-left fll" style="width:65%;">
       		<select><option name="all-name-selected">All Profile types</option></select>
       </div>
       </div>

       <div style="width:40%; float:left; margin:0 0 0 5%;">
       <span class="fll black fs14 mar10 lh26"> STATUS </span>
       <div class="box-left fll" style="width:65%;">
       		<select><option name="all-name-selected">All Profile types</option></select>
       </div>
       </div>

       <div class="flr">
       <p class="flr"><a href="#" class="btn white btn-primary btn-large"> SUBMIT </a></p>
       </div>




   </div><div class="clr"></div><table class="table-fill">
   <!--table form end here -->

<thead>
<tr>
<th class="text-left"> Name </th>
<th class="text-left"> Products </th>
<th class="text-left"> Renewed On </th>
<th class="text-left"> Duration </th>
<th class="text-left"> Status </th>
</tr>
</thead>
<tbody class="table-hover">

<tr>
    <td class="text-left">
        <span class="number">#1</span>
        <img alt="profile-picture" class="person-pp" src="images/avatar-1.jpg">
        <a class="person-name" href="#"> Rickey Pointing

    </a></td>
    <td class="text-left"> 99 </td>
    <td class="text-left"> 10 January 2015 </td>
    <td class="text-left"> 2 Months </td>
    <td class="text-left"><span class="red2"> Expired </span> </td>
</tr>


<tr>
    <td class="text-left">
        <span class="number">#2</span>
        <img alt="profile-picture" class="person-pp" src="images/avatar-2.jpg">
        <a class="person-name" href="#"> Yuvraj Singh
        <span class="person-title">(India)</span>
    </a></td>
    <td class="text-left"> 99 </td>
    <td class="text-left"> 24 May 2016 </td>
    <td class="text-left"> 10  </td>
    <td class="text-left"> 20 July </td>
</tr>

<tr>
    <td class="text-left">
        <span class="number">#1</span>
        <img alt="profile-picture" class="person-pp" src="images/avatar-1.jpg">
        <a class="person-name" href="#"> Rickey Pointing

    </a></td>
    <td class="text-left"> 99 </td>
    <td class="text-left"> 10 January 2015 </td>
    <td class="text-left"> 2 Months </td>
    <td class="text-left"> Expired </td>
</tr>


<tr>
    <td class="text-left">
        <span class="number">#2</span>
        <img alt="profile-picture" class="person-pp" src="images/avatar-2.jpg">
        <a class="person-name" href="#"> Yuvraj Singh
        <span class="person-title">(India)</span>
    </a></td>
    <td class="text-left"> 99 </td>
    <td class="text-left"> 24 May 2016 </td>
    <td class="text-left"> 10  </td>
    <td class="text-left"> 20 July </td>
</tr>

<tr>
    <td class="text-left">
        <span class="number">#1</span>
        <img alt="profile-picture" class="person-pp" src="images/avatar-1.jpg">
        <a class="person-name" href="#"> Rickey Pointing

    </a></td>
    <td class="text-left"> 99 </td>
    <td class="text-left"> 10 January 2015 </td>
    <td class="text-left"> 2 Months </td>
    <td class="text-left"> Expired </td>
</tr>


<tr>
    <td class="text-left">
        <span class="number">#2</span>
        <img alt="profile-picture" class="person-pp" src="images/avatar-2.jpg">
        <a class="person-name" href="#"> Yuvraj Singh
        <span class="person-title">(India)</span>
    </a></td>
    <td class="text-left"> 99 </td>
    <td class="text-left"> 24 May 2016 </td>
    <td class="text-left"> 10  </td>
    <td class="text-left"> 20 July </td>
</tr>

<tr>
    <td class="text-left">
        <span class="number">#1</span>
        <img alt="profile-picture" class="person-pp" src="images/avatar-1.jpg">
        <a class="person-name" href="#"> Rickey Pointing

    </a></td>
    <td class="text-left"> 99 </td>
    <td class="text-left"> 10 January 2015 </td>
    <td class="text-left"> 2 Months </td>
    <td class="text-left"> Expired </td>
</tr>


<tr>
    <td class="text-left">
        <span class="number">#2</span>
        <img alt="profile-picture" class="person-pp" src="images/avatar-2.jpg">
        <a class="person-name" href="#"> Yuvraj Singh
        <span class="person-title">(India)</span>
    </a></td>
    <td class="text-left"> 99 </td>
    <td class="text-left"> 24 May 2016 </td>
    <td class="text-left"> 10  </td>
    <td class="text-left"> 20 July </td>
</tr>














</tbody>
</table>













       </div>







</div>

           </div>

        <div class="oneshop_right_newcontainer">
          <?php
              $this->load->module("suggestions");
              $this->suggestions->getStoreSuggestions();
              $this->suggestions->getProductSuggestions();
          ?>
        </div>
    </div>

<?php
$this->templates->app_footer();
?>
