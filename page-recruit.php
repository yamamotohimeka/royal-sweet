<?php /* Template Name: 求人情報 */ ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include('head-meta.php'); ?>
</head>

<body>
  <div class="wrapper">
    <?php include('header.php'); ?>
    <main class="touch-area">
      <div class="bg-white">
        <div class="gold-border"></div>

        <div class="top-visual">
          <div class="top-visual__bg">
            <img class="pc-topimg" src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit-top.png" alt="">
            <img class="sp-topimg" src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit-top02.jpg"
              alt="">
          </div>
          <div class="top-visual__text">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit-toptext-royal.png"
              alt="圧倒的な高収入！安心して長く働ける！頑張る女性を応援します">
          </div>
          <div class="list-bg">
            <ul class="top-visual__list">
              <li class="top-visual__list--item"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/merit01.png" alt="未経験でも大歓迎！安心の研修制度"></li>
              <li class="top-visual__list--item"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/merit02.png" alt="ノルマ一切ナシ！完全自由出勤制度 "></li>
              <li class="top-visual__list--item"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/merit03.png" alt="圧倒的リピート会員数。しっかりと稼げます">
              </li>
            </ul>
          </div>
        </div><!-- .top-visual -->

        <section class="features">
          <h2 class="features__heading">
            <div class="features__heading--skew">Royal Sweet<span class="newline-xs"><br></span>お仕事についての特徴</div>
          </h2>
          <div class="features__container features-margin01">
            <div class="features__container--img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/work01.png" alt="70%が未経験からのスタート！">
            </div>
            <div class="features__container--text">
              <h3 class="features__container--large">
                今、働いている<span class="deep-red">70％のセラピストが未経験者</span>からのスタート！
              </h3>
              <p class="features__container--medium gothic">
                未経験からのスタートの方もご安心ください。エステ歴5年以上の女性スタッフが親切、丁寧に教えさせて頂きます。<br>
                又、施術のスキルアップしたい方や接客マナーなども細く教えさせて頂きます。
              </p>
            </div>
          </div><!-- .features__contaniner -->

          <div class="features__container reverse">
            <div class="features__container--img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/work02.png" alt="週1日からでも出勤できます！">
            </div>
            <div class="features__container--text">
              <h3 class="features__container--large">
                施術以外の業務一切なし！<span class="deep-red">毎日がお給料</span>
              </h3>
              <p class="features__container--medium gothic">
                経験者の方ならご存知だと思いますが他店舗で入店後にルーム清掃･洗濯･釣り銭の用意･雑費引きがある店舗も存在いたします。当店は施術以外のお仕事はセラピスト退室後<span
                  class="red">スタッフが全て行います</span>。セラピストの方はお客様の施術だけに専念でき、帰宅の際もスムーズに退出いただけます。
              </p>
            </div>
          </div><!-- .features__contaniner -->

          <div class="features__container features-margin02">
            <div class="features__container--img">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/work03.png" alt="プライバシー管理も徹底！">
            </div>
            <div class="features__container--text">
              <h3 class="features__container--large">
                <span class="deep-red">プライバシー管理を徹底</span>しているので安心して働けます！
              </h3>
              <p class="features__container--medium gothic">
                お店のサイトではお顔出しは一切ありません。また、完全個室なので自分の担当以外のお客様や他のセラピストと顔を合わすこともありません。出勤退勤時の出入りも<span
                  class="bold">人目を気にすることなく安心して働いていただけます</span>。
              </p>
            </div>
          </div><!-- .features__contaniner -->
        </section><!-- .features -->

        <section class="salary">

          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/salary-text.png" alt="">

        </section><!-- .salary -->

        <section class="simulation">
          <div class="simulation__container">
            <h2 class="simulation__heading">
              <div class="simulation__heading--skew">給料シミュレーション</div>
            </h2>
            <div class="model">
              <div class="modelbox">
                <div class="modelbox__img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/simulation01.png" alt="">
                  <p class="modelbox__img--name gothic">Aさん未経験</p>
                </div>
                <p class="modelbox__desc--medium gothic">勤務時間（12:00~18:00）</p>
                <p class="modelbox__desc"><span class="bgbrown gothic">1日<span class="thirtyone">の</span>給料</span><span
                    class="modelbox__desc--large">35,000<span class="sixtyfive">円</span></span></p>
                <table class="modelbox__table">
                  <tbody>
                    <tr>
                      <th class="modelbox__table--left">
                        12:00～13:30施術
                      </th>
                      <td class="modelbox__table--right">
                        90分コース　10,000円
                      </td>
                    </tr>
                    <tr>
                      <th class="modelbox__table--left">
                        14:00～15:30施術
                      </th>
                      <td class="modelbox__table--right">
                        90分コース　10,000円
                      </td>
                    </tr>
                    <tr>
                      <th class="modelbox__table--left">
                        16:00～18:00施術
                      </th>
                      <td class="modelbox__table--right">
                        120分コース　15,000円
                      </td>
                    </tr>
                    <tr>
                      <th class="modelbox__table--left">
                        合計
                      </th>
                      <td class="modelbox__table--right">
                        35,000円
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- .modelbox -->
              <div class="modelbox">
                <div class="modelbox__img">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/simulation02.png" alt="">
                  <p class="modelbox__img--name gothic">Bさん経験者</p>
                </div>
                <p class="modelbox__desc--medium gothic">勤務時間　（15:00~26:00）</p>
                <p class="modelbox__desc"><span class="bgbrown gothic">1日<span class="thirtyone">の</span>給料</span><span
                    class="modelbox__desc--large">65,000<span class="sixtyfive">円</span></span></p>
                <table class="modelbox__table">
                  <tbody>
                    <tr>
                      <th class="modelbox__table--left">
                        15:00～17:00施術
                      </th>
                      <td class="modelbox__table--right">
                        120分コース　15,000円
                      </td>
                    </tr>
                    <tr>
                      <th class="modelbox__table--left">
                        17:30～19:00施術
                      </th>
                      <td class="modelbox__table--right">
                        90分コース　10,000円
                      </td>
                    </tr>
                    <tr>
                      <th class="modelbox__table--left">
                        19:30～21:00施術
                      </th>
                      <td class="modelbox__table--right">
                        90分コース　10,000円
                      </td>
                    </tr>
                    <tr>
                      <th class="modelbox__table--left">
                        21:30～23:30施術
                      </th>
                      <td class="modelbox__table--right">
                        120分コース　15,000円
                      </td>
                    </tr>
                    <tr>
                      <th class="modelbox__table--left">
                        24:00～26:00施術
                      </th>
                      <td class="modelbox__table--right">
                        120分コース　15,000円
                      </td>
                    </tr>
                    <tr>
                      <th class="modelbox__table--left">
                        合計
                      </th>
                      <td class="modelbox__table--right">
                        65,000円
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- .modelbox -->
            </div><!-- .model -->
          </div><!-- .simulation__container -->
        </section>

        <section class="worry">
          <div class="worry__container">
            <h2 class="worry__heading">
              <div class="worry__heading--skew">お仕事でこんな経験や<span class="newline-sp"><br></span>お悩みありませんか？</div>
            </h2>
            <div class="arrow01"></div>
            <div class="arrow02"></div>
            <div class="worry-flex">
              <ul class="worry__list">
                <li class="worry__list--item"><span class="check"></span>給与が説明された金額と違った…</li>
                <li class="worry__list--item"><span class="check"></span>年齢制限で面接もされない…</li>
                <li class="worry__list--item"><span class="check"></span>実際に働いてみても暇で全然稼げない…</li>
                <li class="worry__list--item"><span class="check"></span>事前確認の内容と異なるサービスを強要された…</li>
                <li class="worry__list--item"><span class="check"></span>ホームページの内容と面接の内容が違う…</li>
                <li class="worry__list--item"><span class="check"></span>給与システムが明確じゃない…</li>
              </ul>
              <div class="worry__img">
                <img class="worry__img--mainimg"
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/worry01.png" alt="">
                <div class="worry__img--deco01"><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/moyamoya.png" alt=""></div>
                <div class="worry__img--deco02"><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/konnnahazu.png" alt="こんなはずでは"></div>
              </div>
            </div>
          </div><!-- .worry-container -->
        </section><!-- ."worry -->

        <section class="safety">
          <div class="safety__container">
            <p class="safety__heading gothic">ご安心下さい！</p>
            <p class="safety__heading gothic">不誠実な対応・採用は一切致しません！</p>
            <div class="safety__imgbox">
              <div class="safety__imgbox--img"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/safety01.png" alt=""></div>
              <div class="safety__imgbox--img"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/safety02.png" alt=""></div>
            </div>
            <p class="safety__desc gothic">頑張って働く女性に<span class="fortyfour-red">「稼ぐ実感」</span>と<span
                class="newline-sp"><br></span><span class="newline-tb"><br></span><span
                class="fortyfour-red">「働きやすい環境」</span>の両立を徹底しています。</p>
          </div><!-- .safety__container -->
        </section><!-- .safety -->

        <section class="question">
          <div class="question__container">
            <h2 class="question__heading">
              <div class="question__heading--skew">Q&A・気になる質問</div>
            </h2>
            <table class="question__table gothic">
              <tbody>
                <tr>
                  <th class="question__table--q">
                    <div class="question__table--left"><span class="forty">Q</span></div>
                    <div class="question__table--right"><span class="vertical-adjust">未経験で何も分からないのですが大丈夫でしょうか？</span>
                    </div>
                  </th>
                  <td class="question__table--a">
                    <div class="question__table--left"><span class="forty">A</span></div>
                    <div class="question__table--right"><span
                        class="vertical-adjust">もちろん大丈夫です！デビュー前にしっかり親切丁寧に研修しますので未経験の方でも大丈夫です！</span></div>
                  </td>
                </tr>
                <tr>
                  <th class="question__table--q">
                    <div class="question__table--left"><span class="forty">Q</span></div>
                    <div class="question__table--right"><span class="vertical-adjust">風俗店とは違うのですか？</span></div>
                  </th>
                  <td class="question__table--a">
                    <div class="question__table--left"><span class="forty">A</span></div>
                    <div class="question__table--right"><span
                        class="vertical-adjust">性的サービスは一切ございません！当店は健全なリラクゼーションのお店です。安心して働いていただけます。</span></div>
                  </td>
                </tr>
                <tr>
                  <th class="question__table--q">
                    <div class="question__table--left"><span class="forty">Q</span></div>
                    <div class="question__table--right"><span class="vertical-adjust">ノルマはありますか？</span></div>
                  </th>
                  <td class="question__table--a">
                    <div class="question__table--left"><span class="forty">A</span></div>
                    <div class="question__table--right"><span
                        class="vertical-adjust">ノルマは一切ありません。ノルマを一切気にせず、ご自身のライフスタイルに無理なく合わせて働いていただけます。</span></div>
                  </td>
                </tr>
                <tr>
                  <th class="question__table--q">
                    <div class="question__table--left"><span class="forty">Q</span></div>
                    <div class="question__table--right"><span class="vertical-adjust">どんなお客様が来店してますか？</span></div>
                  </th>
                  <td class="question__table--a">
                    <div class="question__table--left"><span class="forty">A</span></div>
                    <div class="question__table--right"><span
                        class="vertical-adjust">30代～50代の会社員・経営者など、マナーのある紳士的な男性を客層としています。安心して働いていただけます。</span></div>
                  </td>
                </tr>
                <tr>
                  <th class="question__table--q">
                    <div class="question__table--left"><span class="forty">Q</span></div>
                    <div class="question__table--right"><span class="vertical-adjust">他のお仕事との掛け持ちは可能ですか？</span></div>
                  </th>
                  <td class="question__table--a">
                    <div class="question__table--left"><span class="forty">A</span></div>
                    <div class="question__table--right"><span
                        class="vertical-adjust">副業・ダブルワーク大丈夫です！キャリアを積めば独立開業も夢ではありあません。そのためのキャリアアップサポートもしっかりいたします。</span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th class="question__table--q">
                    <div class="question__table--left"><span class="forty">Q</span></div>
                    <div class="question__table--right"><span class="vertical-adjust">まずは面接だけでも問題ないでしょうか？</span></div>
                  </th>
                  <td class="question__table--a heightauto">
                    <div class="question__table--left"><span class="forty-adjust">A</span></div>
                    <div class="question__table--right"><span
                        class="vertical-adjust">もちろん大丈夫です！不安がないように面接で包み隠さずお話をさせていただきます。その場でスグに決めなくても、じっくり考えていただいてからで構いませんのでご検討ください。</span>
                      <div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- .question__container -->
        </section><!-- .question -->

        <section class="recruit-contact">
          <div class="recruit-contact__container">
            <h2 class="recruit-contact__heading">
              <div class="recruit-contact__heading--skew">お問い合わせ</div>
            </h2>
            <p class="recruit-contact__info gothic">TEL：<span class="thirtyfive">080-9299-4519</span></p>
            <!-- <p class="recruit-contact__info gothic">MAIL：sk-p@abcdefg.com</p> -->
            <div class="recruit-line"><a href="https://line.me/ti/p/6GV7QoHXlq" target="_blank"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit-line.png" alt=""></a></div>
            <p class="recruit-contact__desc gothic">電話・ショートメール・LINEでお気軽にご質問・ご応募ください。</p>
            <div class="recruit-contact__qr">
              <div class="qr-flex">
                <div class="qr-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/recruit-qr.png"
                    alt=""></div>
                <p class="recruit-contact__qr--medium gothic">
                  QRコード読み取りでスグにお友達追加ができます。
                </p>
              </div>
            </div>
            <p class="recruit-contact__qr--bgsilver gothic">LINE名：royal-sweet</p>
          </div><!-- .recruit-contact__container -->

        </section><!-- .recruit-contact -->
        <div class="gold-border"></div>
      </div><!-- .bg-white -->
    </main>
    <?php include('footer.php'); ?>
</body>

</html>