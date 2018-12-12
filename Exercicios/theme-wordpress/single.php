<?php get_header(); ?>

<?php
/* Se nao tiver post para mostrar exibe uma mensagem */
if ( ! have_posts() ) :
?>
  <h1>N&atilde;o Encontrado</h1>
  <p>Desculpe, mas n&atilde;o h&aacute; o arquivo solicitado</p>
<?php endif; ?>

<?php
// looping para mostrar os posts
while ( have_posts() ) : the_post();
?>
<div class="post">
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <div class="post-details">
        <div class="post-details-left">
          <p>Postado em <strong><?php the_date(); ?></strong> por <span class="author"><?php the_author(); ?></span> em <span class="author"><?php //the_category(', '); ?></span> </p>
        </div>
        <div class="post-details-right">
           <?php edit_post_link('Editar', '<span class="comment-count">' , '</span>'); ?>
           <span class="comment-count">
	         <?php comments_popup_link('Deixe um coment&aacute;rio', '1 Coment&aacute;rio', '% Coment&aacute;rios'); ?></span>
        </div>
    </div>
    <?php if ( is_archive() || is_search() ) : // So mostra resumo para arquivos e pesquisas. ?>
    <?php the_excerpt(); ?>
    <?php else : ?>
    <?php the_content('Leia mais'); ?>
    <?php endif; ?>
    <div class="dots"></div>
</div><!-- post -->
<?php endwhile; ?>

<div class="spacer"></div>
<?php comments_template( '', true ); ?>

<?php get_footer(); ?>
