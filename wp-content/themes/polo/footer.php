<?php
/**
 * The template for displaying the footer
 *
 * @package Polo
 * @subpackge Templates
 * @since 1.0.0
 */
?>

<?php polo_footer_before(); ?>

<!-- FOOTER -->
<?php polo_footer_inside();?>
<!-- END: FOOTER -->
<?php polo_footer_after(); ?>

</div>
<!-- END: WRAPPER -->

<!-- GO TOP BUTTON -->
<a class="gototop gototop-button" href="#"><i class="fa fa-chevron-up"></i></a>

<?php  wp_footer(); ?>
<!-- Timeline JS -->

<script>
// timelinejs code
  var additionalOptions = {
      start_at_end: false,
      default_bg_color: {r:213, g:23, b:31},
      timenav_height: 120
  }

  timeline = new TL.Timeline('timeline-embed', 'https://docs.google.com/spreadsheets/d/1ubVssQhJqiC04dcYD1hybLr16Sw0g_49okj4xuqJNf4/edit#gid=0',additionalOptions);
</script>

</body>
</html>

