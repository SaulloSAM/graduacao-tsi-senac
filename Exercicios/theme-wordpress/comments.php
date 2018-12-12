<?php if ( post_password_required() ) return; ?>
<div id="comments" class="comments-area">
  <?php // You can start editing here -- including this comment! ?>
  <?php if ( have_comments() ) : ?>
      <h2 class="comments-title">
      <?php
      printf( _n( 'Uma resposta para “%2$s”', '%1$s respostas para “%2$s”', get_comments_number()), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
      ?>
      </h2>
      <ol class="commentlist"> <!--AQUI-->
        <?php wp_list_comments(); ?>
      </ol>


      <!-- lista de comentarios -->
      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // mostra se existir comentarios ?>
          <nav id="comment-nav-below" class="navigation" role="navigation">
              <h1 class="assistive-text section-heading"><?php _e( 'Comment navigation'); ?></h1>
              <div class="nav-previous">
		<?php previous_comments_link( __( '← Comentários mais antigos') ); ?></div>
              <div class="nav-next">
		<?php next_comments_link( __( 'Comentários mais recentes →') ); ?></div>
          </nav>
      <?php endif; ?>

      <?php
      /* Se nao houver comentarios e os comentarios estiverem fechados, avisamos. */
      if ( ! comments_open() && get_comments_number() ) : ?> <p class="nocomments"><?php _e( 'Comentários encerrados.' ); ?></p>
      <?php endif; ?>
  <?php endif; ?>
</div><!-- comentarios -->

<?php comment_form(); ?>