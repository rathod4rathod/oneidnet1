<?php
//echo "<pre>";print_R($storepackage[0]);echo "</pre>";
?>
<table class="table-fill">
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
                    <tbody class="table-hover" id="packagehistory">
                        <?php if($storepackage!=0){foreach($storepackage as $storepackageinfo){
                        ?>
                        <tr class="<?php echo "alldetails"." "."store".$storepackageinfo["store_aid"]." "."package".$storepackageinfo["package_id"]." "."storepackage".$storepackageinfo["store_aid"].$storepackageinfo["package_id"];?>">
                        <!--<tr class="<?php echo "packagevenkatesh"; ?>">-->
                            <td class="text-left">
                                <!--<img alt="profile-picture" class="person-pp" src="images/avatar-2.jpg">-->
                                <a class="person-name"><?php echo $storepackageinfo["store_name"]; ?> </a>
                                <a class="person-name"><?php echo $storepackageinfo["packagename"]; ?></a>
                            </td>
                            <td class="text-left"> <?php echo $storepackageinfo["total_products"]; ?></td>
                            <td class="text-left"> <?php echo $storepackageinfo["renewed_on"]; ?></td>
                            <td class="text-left"> <?php echo $storepackageinfo["period_in_months"]; ?>  </td>
                            <td class="text-left"> <?php
                            if($storepackageinfo["is_active"]==1){
                            if($storepackageinfo["is_renewed"]==0){
                                echo "Running";
                            }else if($storepackageinfo["is_renewed"]==1){
                                echo "Upgraded";                                
                            }    
                            }else{
                                echo '<span class="red2"> Expired </span>';
                            }
                            
                            
                            ?> 
                            </td>
                        </tr>
                            
                            <?php    
                        }} ?>
                        
                    </tbody>
                </table>

   