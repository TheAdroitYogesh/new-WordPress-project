<?php
global $i;

if ($i) {
	$i = $i;
} else {
	$i = 0;
}

if( have_rows('page_rows') ):
	while ( have_rows('page_rows') ) : the_row(); $i++;

		get_template_part('rows/global/' . get_row_layout());

	endwhile;
endif;
?>