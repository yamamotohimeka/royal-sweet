<?php get_header(); ?>

<main style="background-color: #000;">
  <div class="gold-border double"></div>
  <section id="section">
    <?php
    echo esc_html(the_content());
    ?>
  </section>
  <div class="gold-border"></div>
</main>
<?php get_footer(); ?>