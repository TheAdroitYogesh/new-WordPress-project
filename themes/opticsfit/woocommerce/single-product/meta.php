<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?><br/>

<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?> 
    
	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>

<div class="choose_lense_form" style="display: none;">
    <button class="close-popup"></button>
    <div>
     <p>Choose Lense Type</p>
     <div class="powered_spacs lense_type_sec" data="Single Vision Glasses">
        <div class="powered_spacs_img lense_type_img" >
            <i class="fas fa-binoculars"></i>
        </div>
        <div class="powered_spacs_data lense_type_data">
            <div class="powered_spacs_title lense_type_title">Single Vision Glasses</div>
            <div class="powered_spacs_description lense_type_description">
                <p>For Distance Vision And Photocromic Options</p>
                <p>(Thin, anti-glare, blue-cut options)</p>
            </div>
        </div>
     </div>
     <!-- <div class="dual_vision_spacs lense_type_sec" data="Dual Vision Glasses">
        <div class="dual_vision_spacs_img lense_type_img" >
            <i class="fa-solid fa-glasses"></i>
        </div>
        <div class="dual_vision_spacs_data lense_type_data">
            <div class="dual_vision_spacs_title lense_type_title">Dual Vision Glasses</div>
            <div class="dual_vision_spacs_description lense_type_description">
                <p>Biforal & Progessives</p>
                <p>(For two powers in same lens)</p>
            </div>
        </div>
     </div> -->
     <div class="zero_power_blue_computer_glasses lense_type_sec" data="0 Power BLUE Computer Glasses">
        <div class="zero_power_blue_computer_glasses_img lense_type_img">
            <i class="fa-solid fa-glasses"></i>
        </div>
        <div class="zero_power_blue_computer_glasses_data lense_type_data">
            <div class="zero_power_blue_computer_glasses_title lense_type_title">0 Power BLUE Computer Glasses</div>
            <div class="zero_power_blue_computer_glasses_description lense_type_description">
                <p>Block 98% of rays</p>
                <p>(Blue Block with Anti-Glare)</p>
            </div>
        </div>
     </div>
     <div class="frame_only lense_type_sec" data="Only Frame">
        <div class="frame_only_img lense_type_img" >
            <i class="fa-solid fa-glasses"></i>
        </div>
        <div class="frame_only_data lense_type_data">
            <div class="frame_only_title lense_type_title">Only Frame</div>
            <div class="frame_only_description lense_type_description">
                <p>Buy Only Frame</p>
            </div>
        </div>
     </div>


        
    </div>
</div>


<div class="choose_option" style="display: none;">
    <div>
    <h2>Choose Option</h2>
     <p class='choose_power wcpa_pbutton padding_tb'>I Know My Power</p>
     <p class='upload_prescription wcpa_pbutton padding_tb'>Upload Prescription</p>
     <p class='contact_customer_care wcpa_pbutton padding_tb'>Contact Customer Care</p> 
    </div>
</div>
<div class="thankyou_popup" style="display: none;">
    <div>
     <?php echo do_shortcode( '[contact-form-7 id="2073" title="Contact Us"]' );  ?>
    </div>
</div>

<script type="text/javascript">

            
            $('.upload_prescription').click(function(){
                $('.upload_form_outer').show();
            });
             $('.showpopupforinput').click(function(){
                $('.choose_lense_form').show();
                $('.quantity').hide();
                $(".single_add_to_cart_button").hide();
            });

             $('.powered_spacs').click(function(){
                $('.wapf-checked').trigger('click');
                $('.wcpa_form_outer').hide();
                $('.choose_lense_form').hide();
                $('.wapf-wrapper').show();
            });

             $('.addonproductcancelbutton').click(function(){
                 $('.choose_lense_form').show();
                 $('.wapf-wrapper').hide();
            });  

            $('.wapf-swatch').click(function(){
                 $('#hidden-1653471441399').val($(this).attr('data'));
                 $('.wapf-wrapper').hide();
                 $('.add_class_parent').hide();
                 $('.wcpa_form_outer').show();
                 $('.wcpa_cancle').show();
                 $('.wcpa_next').show();
                 $('#hidden-1653912001493').val('-');
                 $('#hidden-1648722949356').val('-');

                    $('.wcpa_selectlens_back').hide();
                    $('.wcpa_selectlens_next').hide();
                    $('.wcpa_cancle').show();
                    $('.wcpa_next').show();
                    $('.cylindricalpower_parent').show();
                    $('.wcpa_form_outer select').prop('disabled', false);
                    $('#cylindricalpower_0').prop('disabled', false);
                    $('#singlepower_0').prop('disabled', false);
                    $('.wcpa_form_outer select').css('border', '1px solid #aaa');
                    $('.wcpa_form_outer select').css('background', '#fff');
                    $('.select_arrow').show();
            });

            

            

            $('.wcpa_selectlens_next').click(function(){
                 $('.wcpa_form_outer').hide();
                 $('.showpopupforinput').hide();
                 $('.uploadfileinput').val('');
                 $('.quantity').show();
                 $(".add_to_cart_quantity").show();
                 $(".single_add_to_cart_button").show();
                $('.wcpa_form_outer select').prop('disabled', false);
                $('#cylindricalpower_0').prop('disabled', false);
                $('#singlepower_0').prop('disabled', false);
                 
            });

             $('.wcpa_cancle').click(function(){
                 $('.wapf-checked').trigger('click');
                 $('.wcpa_form_outer').hide();
                 $('.wapf-wrapper').show();
            });

             $('.contact_customer_care').click(function(){
                $('.wcpa_form_outer').hide();
                $('.thankyou_popup').show();
            });

             $('.wcpa_pbutton_back').click(function(){
                $('.wcpa_form_outer').show();
                $('.thankyou_popup').hide();
            });

             $('.wcpa_pbutton_done').click(function(){
                $('.thankyou_popup').hide();
            });

            $('.wcpa_selectlens_back').click(function(){
                    $('.wcpa_selectlens_back').hide();
                    $('.wcpa_selectlens_next').hide();
                    $('.wcpa_cancle').show();
                    $('.wcpa_next').show();
                    $('.cylindricalpower_parent').show();
                    $('.wcpa_form_outer select').prop('disabled', false);
                    $('#cylindricalpower_0').prop('disabled', false);
                    $('#singlepower_0').prop('disabled', false);
                    $('.wcpa_form_outer select').css('border', '1px solid #aaa');
                    $('.wcpa_form_outer select').css('background', '#fff');
                    $('.select_arrow').show();
                    
            });
            
            $('.zero_power_blue_computer_glasses').click(function(){
                $('#hidden-1653471441399').val($(this).attr('data'));
                $('#hidden-1653912001493').val('');
                $('.uploadfileinput').val('');
                $('.choose_lense_form').hide();
                $('.showpopupforinput').hide();
                $('.quantity').show();
                $(".single_add_to_cart_button").show();
                $(".add_to_cart_quantity").show();
            });
            $('.frame_only').click(function(){
                $('#hidden-1653471441399').val('');
                $('#hidden-1653912001493').val('');
                $('.uploadfileinput').val('');
                $('.choose_lense_form').hide();
                $('.showpopupforinput').hide();
                $('.quantity').show();
                $(".single_add_to_cart_button").show();
                $(".add_to_cart_quantity").show();
            });

           
            $('#upload_pres').click(function(){
                setTimeout(function() {
                    $('.inputcancelbutton_done').show();
                }, 3000);
            });
            $('#contact_us_pp').click(function(){
                 setTimeout(function() {
                    $('.wcpa_pbutton_done').show();
                }, 3000);
            });

            
            $('.wcpa_next').click(function(){
                flag = true;

                let singlepowercheck = $('#singlepower_0')[0].checked;
                let cylinderpowercheck = $('#cylindricalpower_0')[0].checked;

                if(!singlepowercheck&&cylinderpowercheck){
                    var odsph = $('[name="select-1653912043407"]').val(); 
                    if(odsph==''){
                        $('.error_validation').html('*Please select OD SPH');
                        flag = false;
                        return false;
                    }
                    var odsph = $('[name="select-1653912082469"]').val(); 
                    if(odsph==''){
                        $('.error_validation').html('*Please select OD CYL');
                        flag = false;
                        return false;
                    }
                    var odsph = $('[name="select-1653912104378"]').val(); 
                    if(odsph==''){
                        $('.error_validation').html('*Please select OD Axis');
                        flag = false;
                        return false;
                    }
                    var odsph = $('[name="select-1653912867557"]').val(); 
                    if(odsph==''){
                        $('.error_validation').html('*Please select PD');
                        flag = false;
                        return false;
                    }

                }

                if(singlepowercheck&&cylinderpowercheck){
                        var odsph = $('[name="select-1648469413360"]').val(); 
                        if(odsph==''){
                            $('.error_validation').html('*Please select OD SPH');
                            flag = false;
                            return false;
                        }

                        var odcyl = $('[name="select-1648720416566"]').val(); 
                        if(odcyl==''){
                            $('.error_validation').html('*Please select OD CYL');
                            flag = false;
                            return false;
                        }


                        var odaxis = $('[name="select-1648720474897"]').val(); 
                        if(odaxis==''){
                            $('.error_validation').html('*Please select OD Axis');
                            flag = false;
                            return false;
                        }

                        var ossph = $('[name="select-1649673595249"]').val(); 
                        if(ossph==''){
                            $('.error_validation').html('*Please select OS SPH');
                            flag = false;
                            return false;
                        }

                        var oscyl = $('[name="select-1649673650876"]').val(); 
                        if(oscyl==''){
                            $('.error_validation').html('*Please select OS CYL');
                            flag = false;
                            return false;
                        }


                        var osaxis = $('[name="select-1649673702476"]').val(); 
                        if(osaxis==''){
                            $('.error_validation').html('*Please select OS Axis');
                            flag = false;
                            return false;
                        }


                        var pd = $('[name="select-1653912867557"]').val(); 
                        if(pd==''){
                            $('.error_validation').html('*Please select PD');
                            flag = false;
                            return false;
                        }
                }

                if(!singlepowercheck&&!cylinderpowercheck){
                    var odsph = $('[name="select-1653912043407"]').val(); 
                    if(odsph==''){
                        $('.error_validation').html('*Please select OD SPH');
                        flag = false;
                        return false;
                    }
                    var odsph = $('[name="select-1653912867557"]').val(); 
                    if(odsph==''){
                        $('.error_validation').html('*Please select PD');
                        flag = false;
                        return false;
                    }

                }

                

                if(singlepowercheck&&!cylinderpowercheck){
                        var odsph = $('[name="select-1648469413360"]').val(); 
                        if(odsph==''){
                            $('.error_validation').html('*Please select OD SPH');
                            flag = false;
                            return false;
                        }

                        var ossph = $('[name="select-1649673595249"]').val(); 
                        if(ossph==''){
                            $('.error_validation').html('*Please select OS SPH');
                            flag = false;
                            return false;
                        }


                        var pd = $('[name="select-1653912867557"]').val(); 
                        if(pd==''){
                            $('.error_validation').html('*Please select PD');
                            flag = false;
                            return false;
                        }
                }
                if(flag){
                    $('.error_validation').html('');
                    $('.wcpa_selectlens_back').css('display','inline-block');
                    $('.wcpa_selectlens_next').css('display','inline-block');
                    $('.wcpa_cancle').hide();
                    $('.wcpa_next').hide();
                    $('.cylindricalpower_parent').hide();
                    $('.wcpa_form_outer select').prop('disabled', true);
                    $('#cylindricalpower_0').prop('disabled', true);
                    $('#singlepower_0').prop('disabled', true);
                    $('.wcpa_form_outer select').css('border', '0px');
                    $('.wcpa_form_outer select').css('background', '#f9f9f9');
                    $('.select_arrow').hide();
                    
                }
                 
            });

                
            $('.worklense .wapf-swatch').click(function(){
                <?php   
                    $power_range_data = json_decode(get_post_meta( 999999, 'power_range_json', true ));
                ?>
                $('.lensetype').val('work');

                $('.cylindrical_power select').html('<option value="">Select</option><?php $lensevalue = $power_range_data->work_con_1_cyl_min;
                    $sign = '';
                    while($lensevalue <= $power_range_data->work_con_1_cyl_max){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } 
                    $lensevalue = $power_range_data->work_con_2_cyl_min;
                    $sign = '';
                    while($lensevalue <= $power_range_data->work_con_2_cyl_max){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } 

                    ?>');

                    <?php  
                     if($power_range_data->work_con_1_cyl_min < 0 && $power_range_data->work_con_1_cyl_max >= 0){
                        $min_value = $power_range_data->work_con_1_sph_min;
                        $max_value = $power_range_data->work_con_1_sph_max;
                     }elseif($power_range_data->work_con_2_cyl_min < 0 && $power_range_data->work_con_2_cyl_max >= 0){
                        $min_value = $power_range_data->work_con_2_sph_min;
                        $max_value = $power_range_data->work_con_2_sph_max;
                     }
                    ?>

                    $('.spherical_power select').html('<option value="">Select</option><?php $lensevalue = $min_value;
                    $sign = '';
                    while($lensevalue <= $max_value){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } 


                    ?>');
            });
            $('.adeptlense .wapf-swatch').click(function(){
                $('.lensetype').val('adept');

                $('.cylindrical_power select').html('<option value="">Select</option><?php $lensevalue = $power_range_data->adept_con_1_cyl_min;
                    $sign = '';
                    while($lensevalue <= $power_range_data->adept_con_1_cyl_max){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } 
                    $lensevalue = $power_range_data->adept_con_2_cyl_min;
                    $sign = '';
                    while($lensevalue <= $power_range_data->adept_con_2_cyl_max){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } 
                    $lensevalue = $power_range_data->adept_con_3_cyl_min;
                    $sign = '';
                    while($lensevalue <= $power_range_data->adept_con_3_cyl_max){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } 

                    ?>');

                <?php  
                     if($power_range_data->adept_con_1_cyl_min < 0 && $power_range_data->adept_con_1_cyl_max >= 0){
                        $min_value = $power_range_data->adept_con_1_sph_min;
                        $max_value = $power_range_data->adept_con_1_sph_max;
                     }elseif($power_range_data->adept_con_2_cyl_min < 0 && $power_range_data->adept_con_2_cyl_max >= 0){
                        $min_value = $power_range_data->adept_con_2_sph_min;
                        $max_value = $power_range_data->adept_con_2_sph_max;
                     }elseif($power_range_data->adept_con_3_cyl_min < 0 && $power_range_data->adept_con_3_cyl_max >= 0){
                        $min_value = $power_range_data->adept_con_3_sph_min;
                        $max_value = $power_range_data->adept_con_3_sph_max;
                     }
                    ?>

                $('.spherical_power select').html('<option value="">Select</option><?php $lensevalue = $min_value;
                    $sign = '';
                    while($lensevalue <= $max_value){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } ?>');
            });

            $('.playlense .wapf-swatch').click(function(){
                $('.lensetype').val('play');

                 $('.cylindrical_power select').html('<option value="">Select</option><?php $lensevalue = $power_range_data->play_con_1_cyl_min;
                    $sign = '';
                    while($lensevalue <= $power_range_data->play_con_1_cyl_max){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } 
                    $lensevalue = $power_range_data->play_con_2_cyl_min;
                    $sign = '';
                    while($lensevalue <= $power_range_data->play_con_2_cyl_max){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } 

                    ?>');

                 <?php  
                     if($power_range_data->play_con_1_cyl_min < 0 && $power_range_data->play_con_1_cyl_max >= 0){
                        $min_value = $power_range_data->play_con_1_sph_min;
                        $max_value = $power_range_data->play_con_1_sph_max;
                     }elseif($power_range_data->play_con_2_cyl_min < 0 && $power_range_data->play_con_2_cyl_max >= 0){
                        $min_value = $power_range_data->play_con_2_sph_min;
                        $max_value = $power_range_data->play_con_2_sph_max;
                     }
                    ?>

                 $('.spherical_power select').html('<option value="">Select</option><?php $lensevalue = $min_value;
                    $sign = '';
                    while($lensevalue <= $max_value){
                        if($lensevalue>0){
                            $sign = '+';
                        }
                        $lensevalueprint = number_format((float)$lensevalue, 2,'.','');
                        echo '<option value="'.$sign.$lensevalueprint.'">'.$sign.$lensevalueprint.'</option>'; $lensevalue = $lensevalue + 0.25;
                    } ?>');
            });  


            $(".cylindrical_power").change(function() {
                classname = 'spherical_power_single';
                if ($(this).hasClass("cylindrical_power_right")) {
                  classname = 'spherical_power_right';
                }else if($(this).hasClass("cylindrical_power_left")){
                    classname = 'spherical_power_left';
                }else if($(this).hasClass("cylindrical_power_single")){
                    classname = 'spherical_power_single';
                }
                lense_type = $('.lensetype').val();
                cylpower = $(this).val();

                if(cylpower!=''){
                    var data = {
                        'action': 'lense_power_condtion',
                        'classname': classname,
                        'lense_type': lense_type,
                        'cylpower': cylpower
                    };
                    //console.log(data);
                    var ajaxurl = "<?php  echo  admin_url() ;  ?>admin-ajax.php";
                    jQuery.post(ajaxurl, data, function(response) {
                        if(lense_type!=''&&lense_type=='work'){
                             $('.'+classname+' select').html(response);
                        }else if(lense_type!=''&&lense_type=='adept'){
                             $('.'+classname+' select').html(response);
                        }else if(lense_type!=''&&lense_type=='play'){
                             $('.'+classname+' select').html(response);
                        }
                        
                    });
                }
                


                
            });
              
        </script>
        <script type="text/javascript">
            $('document').ready(function(){
                
                $('.close-popup').click(function(){
                 $(".choose_lense_form").hide();})
                $('.customer_user_name').val('<?php  global $current_user;  wp_get_current_user() ;  echo $current_user->user_login;?>');
                $('.customer_user_phone').val('<?php echo '5346543646' ?>');
                $('.customer_user_email').val('<?php $current_user = wp_get_current_user(); echo $current_user->user_email; ?>');
                $('.product_name_first').val('<?php echo get_the_title(); ?>');
                $('.product_name').val('<?php echo get_the_title(); ?>');
                $('.blue_button').parent().css('float','left');
               $('.description_feature_details').html('<a href="<?php  echo get_site_url().'/features-details/';  ?>" target="blank" class="button_feature">Know feature in Detail</a>');
            });
         
        </script>