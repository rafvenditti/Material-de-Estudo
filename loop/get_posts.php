<!--Ao usar get_posts() iniciar a consulta, definindo os seus parâmetros e, em seguida, recebendo as mensagens.-->
<?php
$args = array( 'posts_per_page'   => 5,
	           'offset'           => 0,
	           'category'         => '',
	           'orderby'          => 'post_date',
	           'order'            => 'DESC',
	           'include'          => '',
	           'exclude'          => '',
	           'meta_key'         => '',
	           'meta_value'       => '',
	           'post_type'        => 'post',
	           'post_mime_type'   => '',
	           'post_parent'      => '',
	           'post_status'      => 'publish',
	           'suppress_filters' => true );

$theposts = get_posts( $args );


//Percorrer a matriz de mensagens usando a função PHP foreach().
foreach($theposts as $post) :


//Em seguida, para obter todas as funções de conteúdo WordPress como the_content() chamam a setup_postdata() e defina seu argumento para a variável $post do loop foreach .

setup_postdata($post);
?>

<?php the_title(); ?>
<?php the_excerpt(); ?>

<!--Termine o loop foreach.-->
<?php
endforeach;

//Finalizando o loop chamando wp_reset_postdata().

wp_reset_postdata();
?>


<!--referencia: 
    http://codex.wordpress.org/Function_Reference/query_posts
-->