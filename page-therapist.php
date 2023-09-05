<?php /* Template Name: セラピスト */ ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include('head-meta.php'); ?>
</head>

<body>
  <div class="wrapper">
    <?php include('header.php'); ?>
    <main class="touch-area">
      <div class="gold-border"></div>
      <section class="therapist">
        <h2 class="therapist__heading">THERAPIST</h2>
        <p class="therapist__heading--small">セラピスト</p>
        <div class="therapist-container">
          <?php $users = get_users(array('order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_key' => 'priority', 'exclude' => '1 2')); ?>
          <?php
          foreach ($users as $girls) :
            $uid = $girls->ID;
            $userData = get_userdata($uid);
          ?>
            <?php if ($userData->attmgr_ex_attr_staff) : ?>
              <div class="therapist-list">
                <a class="therapist-list__link" href="<?php echo home_url() . '/?author=' . $uid; ?>">
                  <div class="therapist-list__box-wrapper">
                    <div class="therapist-list__box <?php if ($userData->newface) echo 'new'; ?>">
                      <div class="therapist-list__box--img"><?= get_avatar($uid, 420) ?></div>
                      <div class="therapist-list__box--bg">
                        <p class="therapist-list__box--small">
                          <?= $girls->display_name ?><br>
                          （<?php echo $girls->fage; ?>） T:<?php echo $girls->staff_tall; ?>
                        </p>
                      </div><!-- .therapist-list__box--bg -->
                    </div><!-- .therapist-list__box -->
                    <p class="therapist-list__fee">
                      指名料+<?php echo $girls->extra_fee; ?>円
                    </p>
                  </div>
                  <p class="therapist-list__text">
                    <?php echo $girls->user_description; ?>
                  </p>
                </a>
              </div><!-- .therapist-list -->
            <?php endif; ?>
          <?php endforeach; ?>
        </div><!-- .therapist-container -->
      </section>
      <div class="gold-border"></div>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>