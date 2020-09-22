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

<footer class="container-fluid p-5">
  <div class="row d-flex justify-content-center">
    <div class="col-12 text-center mb-5">
        <div class="d-inline-block"><a href="https://www.facebook.com/WINatWAN/?__tn__=%2Cd%2CP-R&eid=ARCGiAH6_atSYXtqr9Jla-av-_k4gNwnVYE-OQgvGWQ9Rw5s00Fox-h2U4NEZYYKxF3F4iT9QT5-83Fo" target="_blank" class="btn btn-primary btn-round btn-center"><i class="fab fa-facebook-f"></i></a></div>
        <div class="d-inline-block"><a href="https://twitter.com/WomenInNews" target="_blank" class="btn btn-primary btn-round btn-center"><i class="fab fa-twitter"></i></a></div>
    </div>
    <div class="col-12 col-md-2">
      <a href="http://www.womeninnews.org/" target="_blank">
      <img src="<?php bloginfo ('stylesheet_directory'); ?>/assets/WN_logo_white.png" alt="Women In News" class="w-100">
      </a>
    </div>
    <div class="col-12 col-md-2 offset-md-1">
      <a href="https://www.wan-ifra.org/" target="_blank">
      <img src="<?php bloginfo ('stylesheet_directory'); ?>/assets/WANIFRA_LOGO_inverse_web.png" alt="WAN IFRA" class="w-100">
      </a>
    </div>
    <div class="col-12 col-md-5 offset-md-1">
      <p>
        &#169; 2020
        <br>
        Website design and creation by <a href="https://lauraannseal.com/" target="_blank">Laura Ann Seal</a>
        <br>
        Illustrations created by <a href="https://www.freehandmovement.com/" target="_blank">Freehand Movement</a>
      </p>
    </div>
  </div>
</footer>

<!-- bootstrap js -->
    <!-- jquery -->
    <script src="<?php bloginfo ('stylesheet_directory'); ?>/bootstrap-4.1.3-dist/js/jquery.js"></script>
    <!-- popper CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <script src="<?php bloginfo ('stylesheet_directory'); ?>/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>

<?php wp_footer(); ?>

</body>
</html>
