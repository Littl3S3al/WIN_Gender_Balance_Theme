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
