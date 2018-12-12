<?php get_header(); ?>
<?php /* Se nao tiver post para mostrar exibe uma mensagem */ ?>
<?php if ( ! have_posts() ) : ?>
        <h1>Não Encontrado</h1>
            <p>Desculpe, mas não há o arquivo solicitado</p>
<?php endif; ?>
<?php while ( have_posts() ) : the_post(); ?>
  <div class="post">
    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <?php if ( is_archive() || is_search() ) :
	// So mostra o resumos se encontrar algo. ?>
            <?php the_excerpt(); ?>
    <?php else : ?>
            <?php the_content('Leia mais'); ?>
    <?php endif; ?>
    <div class="dots"></div>
  </div><!-- post -->
  <div class="spacer"></div>
  <?php comments_template( '', true ); ?>
<?php endwhile; ?>
<div class="spacer"></div>
<?php get_footer(); ?>
