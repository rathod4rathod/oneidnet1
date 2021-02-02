<li class="maildes_bubble"><img src="<?php echo base_url().'assets/images/bubble.png'?>"></li>
						<?php
							//$cart_list=$this->mycart->myCartList($store_code);
							if($cart_list!=0){
								foreach($cart_list as $cart){
									echo "<li class='maildes_settingOption'>".$cart["product_name"]."</li>";
								}
								echo '<li class="maildes_settingOption">
						<div> <input type="button" name="button" class="np_des_notift_btn" value="Checkout" id="cart_view_all"> </div>
						</li>';
							}else{
								echo "<li class='maildes_settingOption'>No items in your cart.</li>";
							}
						?>
