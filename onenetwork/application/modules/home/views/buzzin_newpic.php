<form id="buzzdev_submit" enctype="multipart/form-data">
    <div class="snappreview_box">
        <div class="fll mab10 wi100pstg">
            <p class="fll wi100pstg"> Caption </p>
            <p class="fll">
                <textarea class="buzdes_caption_box" rows="" cols="" id="buzsnap_caption" name="buzsnap_caption"></textarea>
            </p>
        </div>
        <div class="snap_edit_wrap">
            <img src="#" title="New Buzz" id="Buzz_devsnap" name="Buzz_devsnap" alt="icon">
        </div>
        
    </div> 
    <div class="oneshop_paybook_yesorno_buttons">
            <p  class="fll"> <input type="file"  name="buzzdev_snapQuic" id="buzzdev_snapQuic" class="button_new" ></p>
            <p  class="flr"> <input type="submit"  name="buzzdev_snapsubmit" id="buzzdev_snapsubmit" class="button_new" value="Submit" onsubmit="buzzSnapCreate()"></p>
        </div>
</form>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#Buzz_devsnap').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#buzzdev_snapQuic").change(function () {
        readURL(this);
    });
  
   
</script>
