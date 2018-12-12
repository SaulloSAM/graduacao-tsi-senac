<?php get_header(); ?>

<?php
/* Se nao tiver post para mostrar exibe uma mensagem */
if ( ! have_posts() ) :
?>
  <div class="msg-sem-post">
    <h1>Página não Encontrada</h1>
    <p>Desculpe, mas n&atilde;o h&aacute; o arquivo solicitado</p>
  </div>
<?php endif; ?>


<?php
  // looping para mostrar os posts
  while ( have_posts() ) : the_post();
?>
  <div class="post">
      <!-- Título do Post -->
      <h1>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h1>

      <!-- Detalhe do Post -->
      <div class="post-details">

          <div class="post-details-left">
            Postado em <strong><?php the_date(); ?></strong> por <span class="author"><?php the_author(); ?></span> em <span class="author"><?php the_category(','); ?> </span>
          </div>

          <div class="post-details-right">
            <?php edit_post_link('Editar', '<span class="comment-count">' , '</span>'); ?>
            <span class="comment-count"> <?php comments_popup_link('Deixe um coment&aacute;rio'); ?> </span>
          </div>
      </div>

      <?php if ( is_archive() || is_search() ) : // So mostra resumo para arquivos e pesquisas. ?>
      <?php the_excerpt(); ?>
      <?php else : ?>
      <?php the_content('Leia mais'); ?>
      <?php endif; ?>
      <div class="dots"></div>
  </div> <!-- post -->
<?php endwhile; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <div id="older-posts">
      <?php next_posts_link('Posts mais antigos'); ?>
  </div>

  <div id="newer-posts">
      <?php previous_posts_link('Posts mais novos'); ?>
  </div>

  <?php // else: ?>
    <!-- <div id="only-page"> Nã há posts mais novos ou antigos </div> -->
<?php endif; ?>

<div class="spacer"></div>


<?php get_footer(); ?>
