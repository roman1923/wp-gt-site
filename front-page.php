<?php get_header(); ?>

  <div id="banner">
    <h1>&lt;GTCoding/&gt;</h1>
    <h3>Coding</h3>
  </div>
  <main>
    <a href="<?php echo site_url('/blog'); ?>">
      <h2 class="section-heading">All Blogs</h2>
    </a>
    <section>

    <?php 
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 2,
        );

        $blogposts = new WP_Query($args);

        while($blogposts->have_posts()) :
            $blogposts->the_post();
        
    ?>
      <div class="card">
        <div class="card-image">
          <a href="<?php echo the_permalink(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Card Image">
          </a>
        </div>
        <div class="card-description">
          <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
          </a>
          <p>
            <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
          </p>
          <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
        </div>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
    </section>

    <h2 class="section-heading">All Projects</h2>

    <section>
    <?php 
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => 2,
        );

        $projects = new WP_Query($args);

        while($projects->have_posts()) :
            $projects->the_post();
        
    ?>
      <div class="card">
        <div class="card-image">
          <a href="<?php echo the_permalink(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Card Image">
          </a>
        </div>
        <div class="card-description">
          <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
          </a>
          <p>
            <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
          </p>
          <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
        </div>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
    </section>

    <h2 class="section-heading">Source Code</h2>

    <section class="section-source">
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing
        elit. Fugiat atque dicta eligendi amet. Praesentium
        necessitatibus quia consequatur blanditiis cumque
        nam error amet, enim, harum, voluptates alias
        sequi eligendi sunt inventore.
      </p>
      <a class="btn-readmore" href="#">
        GitHub Profile
      </a>
    </section>

<?php get_footer(); ?>