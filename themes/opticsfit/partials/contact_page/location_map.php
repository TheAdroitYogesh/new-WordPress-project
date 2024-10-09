<?php // Location Map

$location	= get_field('location', 'option');

if ($location) : ?>
<section class="google-map">
  <div class="location-map-container" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
</section>
<?php endif; ?>