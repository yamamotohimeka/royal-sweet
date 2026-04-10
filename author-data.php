<div class="author-data">
  <p class="author-data__top">
    <span class="author-data__top--name">
      <?php echo $udata->display_name; ?>
      <?php if (!empty($udata->fage)) echo "(" . $udata->fage . ")"; ?>
    </span>
  </p>
  <p class="author-data__bottom">
    <span class="author-data__bottom--tall">T：<?php echo $udata->staff_tall; ?></span>
    <span class="author-data__bottom--fee">指名料＋<?php echo $udata->extra_fee; ?></span>
  </p>
</div>