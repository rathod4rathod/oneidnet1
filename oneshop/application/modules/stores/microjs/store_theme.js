$("#edit_store_theme").submit(function () {
	var theme_selected = $("#imgselected").val();
});
$('.bannersMainDiv img').click(function(){
		var selected = $(this).attr('value');
                
                var imageUrl ='../assets/images/store_banners/'+selected+'.png';
                var midUrl ='../assets/images/store_banners/'+'mid'+selected+'.png';
                $('.banner').removeClass('banborder');
                var img_id=$(this).attr('id');
                $('#'+img_id).addClass('banborder');
                $('.oneshop_banner_stip_middle_content').css('background-image', 'url(' + midUrl + ')');
                $('.oneshop_banner_left_box').css('background-image', 'url(' + imageUrl + ')');
                $('.oneshop_banner_right_box').css('background-image', 'url(' + imageUrl + ')');
		var theme_selected = $("#imgselected").val();
		$("#imgselected").val(selected);
		
});
