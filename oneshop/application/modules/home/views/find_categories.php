<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
$store_code = $this->uri->segment(2);

$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if ($theme_selected != '') {
    $sideimage = base_url() . '/assets/images/store_banners/' . $theme_selected . '.png';
    $midimage = base_url() . '/assets/images/store_banners/mid' . $theme_selected . '.png';
} else {
    $sideimage = base_url() . '/assets/images/store_banners/1.png';
    $midimage = base_url() . '/assets/images/store_banners/mid1.png';
}
?>     

<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew">
    <div class="oneshop_banner_stip_newbox click_importantNotifications">

            <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
            <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
                <?php $this->templates->os_oneshopheader("home"); ?>
            </div>
            <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
        </div> 
    <div class="titlecontainer acenter">
        <div class="titledeco">
            <h1 class="title-text fkinlineblock"> <?php echo $title; ?></h1>
        </div>
    </div>
    <div class="oneshop_left_newcontainer pab10">
        <div class="oneshop_accessories_banner">
            <img src="<?php echo base_url() . "assets/" ?>images/banners/<?php print_R($categories[0]["groups"].$categories[0]["category_name"].".jpg");?>">
        </div>
        <div class="oneshop_products_main_wrap mat20">
            <div class="titlecontainer acenter">
                <div class="titledeco">
                    <h2 class="title-text fkinlineblock">  Products  </h2>
                </div>
            </div>
            <?php            
            $prodobj=$this->load->module("products");
            $prodobj->storeCategoryProducts($categories[0]["category_name"],$this->uri->segment(2));            
            ?>
        </div>
    </div>
    <div class="oneshop_right_newcontainer">
        <div class="oneshop_categories_box mab10">
            <div class="categorylinks"> 
                <ul>
                    <?php
                    foreach ($categories as $catname) {
                        $itemid = strtolower(str_replace(" ", "_", $catname['product']));
                        echo "<li><a href='" . $url . $itemid . "'>" . $catname['product'] . " </a> </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
        
    </div>
</div>
</div>     
<!--Oneshop Content ends Here(vinod 19-05-2015)-->
<?php
$this->templates->app_footer();
?>
