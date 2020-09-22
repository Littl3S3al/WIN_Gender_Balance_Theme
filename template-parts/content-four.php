<?php 

$chapter_title = get_the_title(74);
$chapter_intro = get_post_field('post_content', 74);
$chapter_link = 'chapter-4';
$chapter_next = 'chapter-5';
$chapter_previous = 'chapter-3';

$next = get_field('next_button');
$previous = get_field('previous_button');

$read_it = get_field('read_it');


// query to get all posts in chapter
$the_query = new WP_Query(array(
    'post_type'			=> 'chapter_4',
    'posts_per_page'	=> -1,
    'meta_key'			=> 'section_number',
    'orderby'			=> 'meta_value',
    'order'				=> 'ASC'
));

        

?>

<!-- chapters -->
<section id="<?php echo $chapter_link; ?>" class="container-fluid">
    <div class="spacer"></div>
    <div class="row">

        <!-- chatper text -->
        <div class="chapter-text" data-content="<?php echo $chapter_link; ?>" data-title="<?php echo $chapter_title; ?>">

        <!-- chapter stripes -->
        <?php get_template_part('template-parts/content', 'stripes') ?>
            

            <div class="chapter-text-inner">

                <!-- section shortcut buttons to show on mobile only -->
                <div class="open-chapter-buttons-mobile d-xl-none">

                            <?php if( $the_query->have_posts() ): ?>

                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <button class="chapter-link btn" data-link="section-<?php the_field('section_number') ?>"><?php the_field('shortened') ?></button>
                                <?php endwhile; ?>

                            <?php endif; ?>

                            <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

                </div>

                <!-- begining of text -->

                            
                            <?php if( $the_query->have_posts() ): ?>

                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                <div id="section-<?php the_field('section_number') ?>">
                                    <h1><?php the_title() ?></h1>
                                    <?php the_content(); ?>
                                </div>
                                


                                <?php endwhile; ?>

                            <?php endif; ?>

            </div>
        </div>

        <!-- chapter intro -->
        <div class="col-12 col-md-10 offset-md-1 col-xl-5 offset-xl-0 chapter-intro" data-content="<?php echo $chapter_link; ?>">
            <!-- chapter row -->
            <div class="row m-xl-5">
                <!-- number -->
                <div class="col-12 text-left mb-3" data-aos="fade-up">
                    <div class="number">
                        <span>4.</span>
                    </div>
                </div>
                <!-- chapter intro -->
                <div class="col-12 chapter-intro-content" data-aos="fade-up">
                    <h2><?php echo $chapter_title; ?></h2>
                    <?php echo $chapter_intro; ?>
                    <br>
                    <!-- chapter buttons -->
                    <div class="chapter-buttons" data-aos="fade-up" data-aos-offset="100">
                        <div data-aos="fade-up" data-aos-offset="100">
                        <button class="btn btn-danger read-it" data-target="<?php echo $chapter_link; ?>">
                            <?php echo $read_it; ?>
                        </button>
                            <?php if( $the_query->have_posts() ): ?>

                                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <?php if( get_field('shortcut')) : ?>
                                        <button class="chapter-shortcut btn" data-target="<?php echo $chapter_link; ?>" data-shortcut="section-<?php the_field('section_number') ?>"><?php the_field('shortened') ?></button>
                                    <?php endif; ?>
                                <?php endwhile; ?>

                            <?php endif; ?>

                            <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

                        </div>
                    </div>
                    <!-- buttons which only appear when chapter opens -->

                    <div class="open-chapter-buttons hidden-buttons">

                                <?php if( $the_query->have_posts() ): ?>

                                    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                        <button class="chapter-link btn btn-secondary" data-link="section-<?php the_field('section_number') ?>"><?php the_field('shortened') ?></button>
                                    <?php endwhile; ?>

                                <?php endif; ?>

                                <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

                        <br>

                        <!-- next button -->
                        <div class="navigationBtns">
                            <a href="#<?php echo $chapter_previous; ?>" class="chapter-shortcut btn-next btn btn-light" data-target="<?php echo $chapter_previous; ?>"><?php echo $previous ?> <i class="fas fa-arrow-up"></i></a>

                            <a href="#<?php echo $chapter_next; ?>" class="chapter-shortcut btn-next btn btn-dark" data-target="<?php echo $chapter_next; ?>" data-shortcut="section-1"><?php echo $next ?> <i class="fas fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--row end-->
        </div>

        <!-- chapter cover image -->
        <div class="col-12 col-md-10 offset-md-1 col-xl-7 offset-xl-0 chapter-image text-center" data-content="<?php echo $chapter_link; ?>">
            <div class="placeholder">
                <img src="<?php bloginfo ('stylesheet_directory'); ?>/assets/images/04_strategies.png" class="w-100" alt="strategies">
            </div>
            <a href="#<?php echo $chapter_next; ?>" class="btn-next btn-line-link btn btn-primary"><?php echo $next ?> <i class="fas fa-arrow-down"></i></a>
        </div>
    </div>
</section>