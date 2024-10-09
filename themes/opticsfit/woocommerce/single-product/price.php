<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<style>
	.map-popup {
    display: inline-block;
    /*width: 104px;*/
    text-align: center;
    margin-left: 25px;
    /*position: absolute;*/
    /*top: 37.9%;
    left: 23%;*/
}
.map-hover-box {
    display: inline-flex;
    align-items: flex-start;
    gap: 10px;
    border: 2px solid #000;
    padding: 20px;
    border-radius: 20px;
    background-color: #fff;
    position: absolute;
    width: 45rem;
    z-index: 11;
    display: none;
    display: inline-flex;
    left: 0;
    opacity: 0;
    visibility: hidden;
    transition: 500ms ease all;
    /*transform: translateX(-50%);*/
    right: 0;
    margin: 0 auto;}
    .map-hover-cir {
    display: inline-block;
    width: 3rem;
    height: 3rem;
    background-color: #c70d0d;
    border-radius: 50%;
    cursor: pointer;}

    .map-hover-cir:before {
    content: "";
    display: inline-block;
    width: 4rem;
    height: 4rem;
    background: transparent;
    border-radius: 50%;
    /* animation: sk-bounce 2.0s infinite ease-in-out; */
    border: solid 3px #00bfa5;
    box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.5);
    position: absolute;
    left: -1rem;
    top: -0.5rem;
    z-index: 10;
    animation: blip1 1s infinite cubic-bezier(0, 0.6, 1, 0.6) ease;
    -webkit-animation: blip1 1s infinite cubic-bezier(0, 0.6, 1, 0.6);
}
 .map-hover-box.active {
    opacity: 1;
    visibility: visible;
    transition: 500ms ease all;
}
.pmpop{display: flex;align-items: center;
    justify-content: flex-start;}
</style>
<div class="pmpop">
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>



<div class="map-popup map-popup-1">
    <div class="map-hover-box">
        <div class="map-hover-loc">
            <img src="https://opticsfitltstg.wpenginepowered.com/wp-content/uploads/2023/01/Size-Guide-3.png" alt="">
        </div>
    </div>
    	<img style="width: 25px; height:25px; cursor: pointer;margin-top: 20px;" class="map-hover-cir" src="https://opticsfitltstg.wpenginepowered.com/wp-content/uploads/2024/04/images.png">
</div>

</div>
<script>
	$(document).ready(function(){
		$(window).click(function () {
			$(".map-hover-box").removeClass("active");});
	$('.map-hover-box').click(function(e){
		e.stopPropagation();});
	$(".map-hover-cir").click(function(e){
		$(".map-hover-box").addClass("active");
	e.stopPropagation();
});})
</script>



