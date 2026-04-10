<?php

/****************************************
  Template Name: 出勤管理ページ
 *****************************************/; ?>

<?php get_header(); ?>
<div class="attendance-bg">
	<?php while (have_posts()) :
		the_post();
		echo esc_html(the_content());

	endwhile; ?>
</div>
<?php get_footer(); ?>