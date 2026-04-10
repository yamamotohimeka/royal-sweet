<?php

/****************************************
  Template Name: セラピスト一覧
 *****************************************/; ?>
<?php include('load-schedule.php'); ?>
<?php get_header(); ?>
<main>
  <div class="gold-border double"></div>
  <section class="page-therapists common-bg">
    <div class="common-title">
      <h2 class="common-title__main">THERAPIST</h2>
      <p class="common-title__sub">セラピスト</p>
    </div>
    <div class="therapist-container">
      <?php $users = get_users(array('order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_key' => 'priority', 'exclude' => '1 2')); ?>
      <ul class="therapist-listwrap">
        <?php
        foreach ($users as $girls):
          $uid = $girls->ID;
          $userData = get_userdata($uid);
          $newfaceDate = get_the_author_meta('newface', $girls->ID);
          $date = DateTime::createFromFormat('Ymd', $newfaceDate);
          $user_link = get_author_posts_url($uid);
        ?>
          <?php if ($userData->attmgr_ex_attr_staff): ?>
            <li class="therapist-list">
              <div class="therapist-list__link">
                <div class="therapist-list__link--top">
                  <div class="therapist-image <?php if ($userData->newface) echo 'therapist-new'; ?>">
                    <!-- セラピスト画像 -->
                    <a class="therapist-image__img" href="<?php echo home_url() . '/?author=' . $uid; ?>">
                      <?php echo get_avatar($uid, 420); ?>
                    </a>
                    <!-- 名前、年齢、身長 -->
                    <div class="therapistData-wrap">
                      <a class="therapist-image__data" href="<?php echo home_url() . '/?author=' . $uid; ?>">
                        <span><?= $girls->display_name ?>（<?php echo $girls->fage; ?>）</span><br>
                        <span>T:<?php echo $girls->staff_tall; ?></span>
                      </a>
                      <?php if (!empty(get_field('twitter', 'user_' . $uid))) : ?>
                        <div class="therapist-image__twitter">
                          <a href="<?php the_field('twitter', 'user_' . $uid); ?>" target="_blank">
                            <img src="<?php echo get_template_directory_uri() ?>/img/icon-x.png" alt="twitter icon">
                          </a>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <!-- 指名料 -->
                  <a class="therapist-fee" href="<?php echo home_url() . '/?author=' . $uid; ?>">
                    <span>指名料+<?php echo $girls->extra_fee; ?>円</span>
                  </a>
                </div>
                <a class="therapist-list__link--bottom" href="<?php echo home_url() . '/?author=' . $uid; ?>">
                  <span><?php echo $girls->user_description; ?></span>
                </a>
              </div>
            </li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>

  </section>
  <div class="gold-border"></div>
</main>
<?php get_footer(); ?>