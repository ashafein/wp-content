<?php // Template Name: Поиск
get_header(); ?>
<div class="color-white catalog-page">

	<?php get_template_part('header-slider'); ?>

	<div class="container-fluid">

		<?php get_template_part('search-horizontal'); ?>


		<?php
		$search = $_GET;
		$realty_type = $search["search_realty_type"];

		$args = array(
			'post_type' => 'realty',
			'posts_per_page' => 200,
			'paged' => get_query_var('paged'),
		);

		$i = 0;

		if($search["search_region"]) {
			$term_id =$search["search_region"];
			$term = get_term( $term_id, 'tax-region' );
			$args_region = array(
				'tax-region' => $term->slug,
			);
			$args = $args + $args_region;
		}

		$meta_query[0] = array(
			'relation'		=> 'AND',
		);

		if($search["search_realty_type"]) {
			$i++;
			$realty_type = $search["search_realty_type"];
			$args_type = array(
				'key'		=> 'realty_type',
				'value'	=> (int)$realty_type,
				'compare'	=> '='
			);
			$meta_query[$i] =$args_type;
		}

		if($search["search_price"]) {
			$i++;
			$realty_price = $search["search_price"];
			$args_price = array(
				'key'		=> 'realty_price',
				'value'	=> $realty_price,
				'compare'	=> '='
			);
			$meta_query[$i] =$args_price;
		}

		if($search["search_lot"]) {
			$i++;
			$realty_lot = $search["search_lot"];
			$args_lot = array(
				'key'		=> 'realty_lot',
				'value'	=> $realty_lot,
				'compare'	=> '='
			);
			$meta_query[$i] =$args_lot;
		}
		if($i > 0){
			$args_meta = array('meta_query'	=> $meta_query);
			$args = $args + $args_meta;
		}

		query_posts( $args );

		?>

		<div class="container-fluid color-white catalog-content">
			<?php


			if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp
				?>
				<?php get_template_part('items-template-part/realty-item'); ?>
			<?php endwhile; // конец цикла
			else: echo '<h2>По вашему запросу ничего не найдено</h2>'; endif; ?>

		</div>

		<?php  // pagination(); // пагинация, функция нах-ся в function.php ?>
	</div>
</div>
<?php wp_reset_query(); ?>

<?php get_template_part('contact-form-part/contact-form-blue'); ?>
<?php get_footer();?>

