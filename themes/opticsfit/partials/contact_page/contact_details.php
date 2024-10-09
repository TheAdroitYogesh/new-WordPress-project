<?php // Contact Details
global $page_content;

$email_address		= get_field('email_address', 'option');
$phone_number		= get_field('phone_number', 'option');

if ($email_address || $phone_number) : ?>
<div class="row text-center">
  <?php if ($email_address) : ?>
  <div class="col-md-6">
    <p class="email-ico"><a href="emailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a></p>
  </div>
  <?php endif; ?>
  <?php if ($phone_number) : ?>
  <div class="col-md-6">
    <p class="phone-ico"><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></p>
  </div>
  <?php endif; ?>
</div>
<?php
	endif;
?>