<?php
/**
 * Product Loop End
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-end.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</ul>

                </div>
            </div>
        </div>
    </section>
</article>

<?php

$urlParams = array();
$cat = get_query_var( 'product_cat' );
$tag = get_query_var( 'product_tag' );
if(isset($cat)&&!empty($cat)){
    $urlParams['product_cat'] = $cat;
}elseif(isset($tag)&&!empty($tag)){
    $urlParams['product_tag'] = $tag;
}

?>

<input type="hidden" value="<?php  echo  admin_url() ;  ?>" id="adminURL">
<input type="hidden" value="<?php  echo content_url();  ?>" id="contentURL">
<input type="hidden" value="<?php  echo json_encode($urlParams);  ?>" id="urlParams">
<input type="hidden" value="<?php  
if(isset($_GET['s'])){
    echo $_GET['s'];
}
  ?>" id="search_data">