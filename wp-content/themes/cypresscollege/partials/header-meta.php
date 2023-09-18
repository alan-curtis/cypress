<?php $favicon = ( get_field('favicon', 'option') ) ? '<link rel="icon" href="'.get_field('favicon', 'option').'">': ''; ?>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="author" content="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>">
	<?php echo get_field('tracking_head', 'option'); ?>
	<title><?php wp_title('—',true,'right'); ?></title>
	<?php echo $favicon; ?>
