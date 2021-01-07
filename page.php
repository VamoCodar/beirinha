<?php

get_header();?>

<div class="container">
    <div class="row mt-5">

        <div class="text-sobre">
            <h2 class="mb-4"><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>