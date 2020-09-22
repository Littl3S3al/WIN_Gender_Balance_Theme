<!-- additional content from the right -->
<section class="additional-section section-right container-fluid">
    <div class="row">
        <div id="additional-screen" class="screen d-none d-xl-block col-xl-7 "></div>

        <div class="col-12 col-xl-5 additional-content">
            <!-- colour bars -->
            <div class="sticky-top close-section">
                <div class="chapter-stripes">
                    <div class="chapter-stripe red"></div><div class="chapter-stripe teal" style="left: 25%"></div><div class="chapter-stripe yellow" style="left: 50%"></div><div class="chapter-stripe purple" style="left: 75%"></div>
                </div>

                <button class="btn btn-center btn-round btn-dark close-addition"><i class="fas fa-times"></i></button>
            </div>

            <!-- the additional sections -->
            <?php $loop = new WP_Query( array('post_type' => 'additional', 'orderby' => 'post_id', 'order' => 'ASC'));?>

            <?php while( $loop ->have_posts()) : $loop->the_post(); ?>

                <div id="<?php the_field('data-target') ?>" class="text-content d-none">
                    <div class="row">
                        <div class="col-12">
                            <h2><?php the_title() ?></h2>
                            <hr>
                        </div>
                        <div class="col-12">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

            <?php 
                endwhile; 
                wp_reset_query();
            ?>

            <!-- the glossary -->
            <div id="glossary" class="text-content d-none">
                <div class="row">
                    <div class="col-12">
                        <h2>Glossary</h2>
                        <hr>
                    </div>

                    <!-- search form -->
                    <div class="col-6 mb-5">
                        <form id="glossary-search-form">
                            <div class="form-group  d-flex justify-content-center md-form form-sm mt-0">
                                <label for="search-glossary" class="sr-only">Search the Glossary</label>
                                <input type="text" class="form-control form-control-lg" id="search-glossary" aria-describedby="search form" placeholder="Search...">
                              </div>
                        </form>
                    </div>
                    <div class="col-12 p-0" id="gloss-keyword-row"></div>

                    <div class="col-12 p-0">
                        <hr>
                    </div>

                    <!-- glossary cards -->
                    <?php $loop = new WP_Query( array('post_type' => 'glossary', 'orderby' => 'post_id', 'order' => 'ASC'));?>

                    <?php while( $loop ->have_posts()) : $loop->the_post(); ?>

                    <div class="col-12 card gloss-term" id="glossary-<?php the_field('target') ?>">
                        <div class="card-body">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <?php 
                        endwhile; 
                        wp_reset_query();
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>