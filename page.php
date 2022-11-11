<?php get_header(); ?>
    <main class="container">
        <?php
            if(have_posts()){
                while(have_posts()){
                    the_post(); ?>

                    <div class="page">
                        <div class="text-container">
                            <h2><?php the_title(); ?></h2>
                            <pack class="body-content"><?php the_content(); ?></p>
                        </div>
                    </div>
                    
                    <?php
                    
                }
            }
        ?>
    </main>
<?php get_footer(); ?>