<?php  
// Template Name: Home page

get_header();

// variables
$tagline = get_field('tagline');
$title = get_the_title();
$sub_title = get_field('sub-title');
$begin = get_field('begin_button');

?>

<?php get_template_part('template-parts/content', 'mainHead') ?>

 <!-- landing section -->
<section id="landing" class="container-fluid d-flex align-items-center">
    <div class="row d-flex justify-content-center">
        <!-- screens -->
        <div class="col-12 col-lg-8 text-center">
            <div class="min-screen animate__animated">
                <div class="min-min-screen" style="background: url('<?php bloginfo ('stylesheet_directory'); ?>/assets/images/min-screen/ONE.png') center center no-repeat, white; background-size: contain">
                    <a href="#chapter-1" class="number"><span>1.</span></a>
                </div>
            </div>
            <div class="min-screen animate__animated">
                <div class="min-min-screen" style="background: url('<?php bloginfo ('stylesheet_directory'); ?>/assets/images/min-screen/TWO.png') center center no-repeat, white; background-size: contain;">
                    <a href="#chapter-2" class="number"><span>2.</span></a>
                </div>
            </div>
            <div class="min-screen animate__animated">
                <div class="min-min-screen" style="background: url('<?php bloginfo ('stylesheet_directory'); ?>/assets/images/min-screen/THREE.png') center center no-repeat, white; background-size: contain;">
                    <a href="#chapter-3" class="number"><span>3.</span></a>
                </div>
            </div>
            <div class="min-screen animate__animated">
                <div class="min-min-screen" style="background: url('<?php bloginfo ('stylesheet_directory'); ?>/assets/images/min-screen/FOUR.png') center center no-repeat, white; background-size: contain;">
                    <a href="#chapter-4" class="number"><span>4.</span></a>
                </div>
            </div>
            <div class="min-screen animate__animated">
                <div class="min-min-screen" style="background: url('<?php bloginfo ('stylesheet_directory'); ?>/assets/images/min-screen/FIVE.png') center center no-repeat, white; background-size: contain;">
                    <a href="#chapter-5" class="number"><span>5.</span></a>
                </div>
            </div>
            <div class="min-screen animate__animated">
                <div class="min-min-screen" style="background: url('<?php bloginfo ('stylesheet_directory'); ?>/assets/images/min-screen/SIX.png') center center no-repeat, white; background-size: contain;">
                    <a href="#chapter-6" class="number"><span>6.</span></a>
                </div>
            </div>
        </div>

        <div id="landingText" class="col-12 col-lg-3 animate__animated animate__delay-1s">
            <div>
                <h2 class="small">&mdash; <?php echo $tagline; ?> &mdash;</h2>
                <h1><?php echo $title ?></h1>
                <h1 class="small">&mdash; <?php echo $sub_title; ?> &mdash;</h1>
                <br>
                <a href="#chapter-1" class="btn-next btn-begin btn btn-primary"><?php echo $begin; ?> <i class="fas fa-arrow-down"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- chapters -->
<?php get_template_part('template-parts/content', 'one') ?>

<?php get_template_part('template-parts/content', 'two') ?>

<?php get_template_part('template-parts/content', 'three') ?>

<?php get_template_part('template-parts/content', 'four') ?>

<?php get_template_part('template-parts/content', 'five') ?>

<?php get_template_part('template-parts/content', 'six') ?>


<!-- additional sections -->
<?php get_template_part('template-parts/content', 'additional') ?>



<!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    
<!-- getting all info for the menu etc... -->
<script>
    const placeholders = document.querySelectorAll('.placeholder'); 
// event listener to check window resize on desktop
window.addEventListener('resize', () => {
        largeButtons();
        if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) && !userAgent.match(/iPad/i) && !userAgent.match(/iPhone/i) ) {
            window.location = '<?php echo get_page_link() ?>';
        }
    });

    // replace images on mobile
    if(window.innerWidth <= 992){
        const chap3Img = placeholders[2].querySelector('img');
        const chap4Img = placeholders[3].querySelector('img');
        const chap6Img = placeholders[5].querySelector('img');

        chap3Img.src = "<?php bloginfo ('stylesheet_directory'); ?>/assets/images/03_actions_mobile.png";
        chap4Img.src = "<?php bloginfo ('stylesheet_directory'); ?>/assets/images/04_strategies_mobile.png";
        chap6Img.src = "<?php bloginfo ('stylesheet_directory'); ?>/assets/images/06_champions_mobile.png";

    }

window.addEventListener("orientationchange", function(event) {
    window.location = '<?php echo get_page_link() ?>';   
});

    let chapterContent = [];

    // php loop through chapters
		<?php $loop = new WP_Query( array('post_type' => 'all_chapters', 'orderby' => 'post_id', 'order' => 'ASC'));?>

		<?php while( $loop ->have_posts()) : $loop->the_post(); ?>
			chapterContent.push(
                {   number: <?php the_field('chapter_number') ?>,
                    arabicNumber: '<?php the_field('arabic_chapter_number') ?>',
                    chapter: '<?php the_title(); ?>',
                    arabicChapter: '<?php the_field('arabic_chapter_title') ?>',
                    concepts: []
                }
            )

		<?php 
			endwhile; 
			wp_reset_query();
        ?>

        chapterContent.sort((a, b) => (a.number > b.number) ? 1 : -1)

    // chapter one 
        <?php $loop = new WP_Query( array('post_type' => 'chapter-1', 'orderby' => 'post_id', 'order' => 'ASC'));?>

		<?php while( $loop ->have_posts()) : $loop->the_post(); ?>
			chapterContent[0].concepts.push({
                title: '<?php the_title(); ?>',
                arabicTitle: '<?php the_field('arabic_title') ?>',
                order: '<?php the_field('section_number') ?>'
            })

		<?php 
			endwhile; 
			wp_reset_query();
        ?>

        chapterContent[0].concepts.sort((a, b) => (a.order > b.order) ? 1 : -1)

    // chapter two 
        <?php $loop = new WP_Query( array('post_type' => 'chapter_2', 'orderby' => 'post_id', 'order' => 'ASC'));?>

		<?php while( $loop ->have_posts()) : $loop->the_post(); ?>
            chapterContent[1].concepts.push({
                title: '<?php the_title(); ?>',
                arabicTitle: '<?php the_field('arabic_title') ?>',
                order: '<?php the_field('section_number') ?>'
            })

		<?php 
			endwhile; 
			wp_reset_query();
        ?>
        chapterContent[1].concepts.sort((a, b) => (a.order > b.order) ? 1 : -1)

    // chapter three 
         <?php $loop = new WP_Query( array('post_type' => 'chapter_3', 'orderby' => 'post_id', 'order' => 'ASC'));?>

        <?php while( $loop ->have_posts()) : $loop->the_post(); ?>
            chapterContent[2].concepts.push({
                title: '<?php the_title(); ?>',
                arabicTitle: '<?php the_field('arabic_title') ?>',
                order: '<?php the_field('section_number') ?>'
            })

        <?php 
            endwhile; 
            wp_reset_query();
        ?>
        chapterContent[2].concepts.sort((a, b) => (a.order > b.order) ? 1 : -1)


    // chapter four 
        <?php $loop = new WP_Query( array('post_type' => 'chapter_4', 'orderby' => 'post_id', 'order' => 'ASC'));?>

        <?php while( $loop ->have_posts()) : $loop->the_post(); ?>
            chapterContent[3].concepts.push({
                title: '<?php the_title(); ?>',
                arabicTitle: '<?php the_field('arabic_title') ?>',
                order: '<?php the_field('section_number') ?>'
            })

        <?php 
            endwhile; 
            wp_reset_query();
        ?>
        chapterContent[3].concepts.sort((a, b) => (a.order > b.order) ? 1 : -1)

    // chapter five 
        <?php $loop = new WP_Query( array('post_type' => 'chapter_5', 'orderby' => 'post_id', 'order' => 'ASC'));?>

        <?php while( $loop ->have_posts()) : $loop->the_post(); ?>
            chapterContent[4].concepts.push({
                title: '<?php the_title(); ?>',
                arabicTitle: '<?php the_field('arabic_title') ?>',
                order: '<?php the_field('section_number') ?>'
            })

        <?php 
            endwhile; 
            wp_reset_query();
        ?>
        chapterContent[4].concepts.sort((a, b) => (a.order > b.order) ? 1 : -1)

    // chapter six 
        <?php $loop = new WP_Query( array('post_type' => 'chapter_6', 'orderby' => 'post_id', 'order' => 'ASC'));?>

        <?php while( $loop ->have_posts()) : $loop->the_post(); ?>
            chapterContent[5].concepts.push({
                title: '<?php the_title(); ?>',
                arabicTitle: '<?php the_field('arabic_title') ?>',
                order: '<?php the_field('section_number') ?>'
            })

        <?php 
            endwhile; 
            wp_reset_query();
        ?>
        chapterContent[5].concepts.sort((a, b) => (a.order > b.order) ? 1 : -1)
        
    


</script>

<!-- general -->
<script src="<?php bloginfo ('stylesheet_directory'); ?>/js/gen.js"></script>

<!-- population of menus etc... -->
<script src="<?php bloginfo ('stylesheet_directory'); ?>/js/population.js"></script>

<!-- progress -->
<script src="<?php bloginfo ('stylesheet_directory'); ?>/js/progress.js"></script>

<!-- menus -->
<script src="<?php bloginfo ('stylesheet_directory'); ?>/js/menus.js"></script>

<!-- chapters -->
<script src="<?php bloginfo ('stylesheet_directory'); ?>/js/chapter.js"></script>

<!-- search forms -->
<script src="<?php bloginfo ('stylesheet_directory'); ?>/js/search.js"></script>

<!-- draw lines -->
<script src="<?php bloginfo ('stylesheet_directory'); ?>/js/lines.js"></script>

<!-- aos -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>


<!-- loading -->
<script src="<?php bloginfo ('stylesheet_directory'); ?>/js/load.js"></script>

<?php  
get_footer();
?>