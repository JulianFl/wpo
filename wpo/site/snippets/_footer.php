
  <footer>
      <div class="overlay-bg">

      <div class="container">
          <div class="row d-flex align-items-center">

              <div class=" col-md-4 col-sm-6">
                  <div class="d-flex justify-content-center">
                  <ul class="impressum-datenschutz">
                      <li><a href="<?= page('impressum')->url() ?>">
                              Impressum
                          </a>
                      </li>

                      <li><a href="<?= page('datenschutz')->url() ?>">
                           Datenschutz
                          </a>
                      </li>

                  </ul>
                  </div>
                  </div>

              <div class="col-md-4 col-sm-6">
              <div class="d-flex justify-content-center">
                  <a href="<?php echo $site->url() ?>" >
                      <img src="<?=$site->image('wimpel.png')->url();?>" class="" width="200px" title="" alt="">

                  </a>
          </div>
              </div>

              <div class="col-md-4 col-sm-12">
                  <h4>Sitemap</h4>
              <div class="d-flex justify-content-center">
                  <ul class="sitemap">
                  <?php foreach($site->children()->listed() as $p):

                      ?>

                      <li><a href="<?= $p->url()?> " ><?= $p->title()->html()?> </a>
                          <?php if($p->hasChildren() && $p != 'news'):?>

                              <ul>
                                  <?php foreach($p->children()->listed() as $q):?>
                                      <li><a href="<?= $q->url()?> " ><?= $q->title()->html()?> </a>

                                      <?php endforeach; ?>
                              </ul>
                          <?php endif; ?>

                      </li>
                    <?php endforeach; ?>
                  </ul>
              </div>
              </div>

          </div>

      </div>
      </div>

  </footer>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->




  <script>var hive_cfg_typoscript__windowLoad=!0;</script>


  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="//code.jquery.com/jquery-latest.js"></script>

  <?= js([

      'assets/js/jquery.swipebox.min.js',
      'assets/js/bootstrap.bundle.min.js',
      'assets/js/script.js',

  ]) ?>


    </body>
</html>
