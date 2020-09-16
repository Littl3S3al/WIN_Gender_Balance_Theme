<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gender_Balance_Content_WIN
 */

?>

<footer class="container-fluid">
  <div class="row">
    <div class="col-12">
    &#169; 2020 - made by <a href="www.lauraannseal.com">Laura Ann Seal</a>
    </div>
  </div>
</footer>

    <!-- aos -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>


    <!-- loading -->
    <script src="<?php bloginfo ('stylesheet_directory'); ?>/js/load.js"></script>

<?php wp_footer(); ?>

</body>
</html>
