<?php get_header(); ?>
    <?php while( have_posts() ) : 
        the_post(); 
    ?>
    <h2 class="page-heading"><?php the_title(); ?></h2>
    <div class="post-container">
      <section id="blogpost">
        <div class="card">
          <div class="card-meta-blogpost">
            Posted by <?php the_author(); ?> on <?php the_time('F j, Y') ?>
            <?php if ( get_post_type() == 'post ') : ?>
            in <a href="#"><?php echo get_the_category_list(', '); ?></a>
            <?php endif; ?>
          </div>
          <div class="card-image">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Card img">
          </div>
          <div class="card-description">
            <h3>The Introduction</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatibus incidunt, consectetur non recusandae vel 
              repellendus perspiciatis fugiat illum ipsa possimus nemo
              dolorum maxime doloremque quidem vitae fugit voluptatem
              architecto delectus ea et autem ullam quasi nulla. Odio
              autem libero consectetur?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatibus incidunt, consectetur non recusandae vel 
              repellendus perspiciatis fugiat illum ipsa possimus nemo
              dolorum maxime doloremque quidem vitae fugit voluptatem
              architecto delectus ea et autem ullam quasi nulla. Odio
              autem libero consectetur?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatibus incidunt, consectetur non recusandae vel 
              repellendus perspiciatis fugiat illum ipsa possimus nemo
              dolorum maxime doloremque quidem vitae fugit voluptatem
              architecto delectus ea et autem ullam quasi nulla. Odio
              autem libero consectetur?</p>
          </div>
        </div>
        <div id="comments-section">
            <?php
            $commenter = wp_get_current_commenter();
            $req = get_option( 'require_name_email' );
            $aria_req = ( $req ? " aria-required='true'" : '' );
            ?>
            <?php $fields = array(
                'author' =>
                '<input placeholder="Name" id="author" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' />',

                'email' =>
                '<input placeholder="Email" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email']) .
                '"size="30"' . $aria_req . ' />'
                ); 
            ?>
            <?php
                $args = array(
                    'title_reply' => 'Share Your Thoughts',
                    'fields' => $fields,
                    'comment_field' => '<textarea placeholder="Your Comment" id="comment" name="comment" cols="45" rows="8" aria-required="true">'.'</textarea>',
                    'comment_notes_before' => '<p class="comment-notes">Your email addresss will not
                    be published. All fields are required.</p>'
                );
            ?>
            <?php comment_form($args); ?>
            <?php
            $comments_number = get_comments_number();
            if ( $comments_number != 0 ) : ?>
                <div class="comments">
                    <h3>What others say</h3>
                    <ol class="all-comments">
                        <?php
                            $comments = get_comments( array(
                                'post_id' => $post->ID,
                                'status' => 'approve'
                            ) );
                            wp_list_comments( array(
                                'per_page' => 15
                            ), $comments );
                        ?>
                    </ol>
                </div>            
            <?php endif; ?>
        </div>

      </section>
    <?php endwhile; ?>

      <aside id="sidebar">
        <?php dynamic_sidebar('main_sidebar'); ?>
      </aside>
    </div>

<?php get_footer(); ?>
