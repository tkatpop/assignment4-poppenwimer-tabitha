<?php get_header(); ?>
 <main class="container">
    <div class="row">
        <main class="col-md-9">
            <section class="archive-container">
                <h1 class="archive-title">
                    <?php 
                        if(is_category()){
                            single_cat_title();
                        }elseif(is_tag()){
                            single_tag_title();
                        }elseif(is_day()){
                            echo "Daily Archives: " . get_the_date();
                        }elseif(is_month()){
                            echo "Monthly Archives: " . get_the_date('F Y');
                        }elseif(is_year()){
                            echo "Yearly Archives: " . get_the_date('Y');
                        }else{
                            echo "Archives";
                        }
                    ?>    
                </h1>

                <?php
                    if(have_posts()){
                        while(have_posts()){
                            the_post(); ?>
                            <article class="individual-post">
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                                <?php
                                    //Display Author and Publish Date Links
                                    post_data();
                                ?>

                                <?php the_post_thumbnail('thumbnail'); ?>
                                <?php the_excerpt(); ?>
                            </article>

                            <?php
                        }
                    }

                ?>
            </section>
        </main>
    </div>
 </main>

<?php get_footer(); ?>