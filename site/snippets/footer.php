
  <footer>

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
                      <img src="<?=$site->image('wimpel.png')->url();?>" class=""  title="" alt="" loading="lazy" width="200px">
                      <!--loading="lazy" width="200px"-->
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

  </footer>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

  <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
  <script>
      window.cookieconsent.initialise({

          "palette": {
              "popup": {
                  "background": "#000000",
                  "text": "#ffffff"
              },
              "button": {
                  "background": "#0A246A",
                  "text": "#ffffff"
              }
          },
          "theme": "edgeless",
          "type": "opt-in",
          "content": {
              "message": "Wir verwenden Cookies, um Ihnen ein optimales Webseiten-Erlebnis zu bieten. Dazu zählen Cookies, die zu anonymen Statistikzwecken genutzt werden. Sie können selbst entscheiden, ob Sie Cookies zulassen möchten. Weitere Informationen finden Sie im Datenschutz.",
              "deny": "Ablehnen",
              "allow": "Akzeptieren",
              "link": "Datenschutz",
              "href": "/datenschutz"

          }
      });
  </script>


  <!-- Include all compiled plugins (below), or include individual files as needed -->
<!--  <script src="//code.jquery.com/jquery-latest.js"></script>-->
  <?= js('assets/js/performance.js', ['type' => "module"]) ?>
  <?= js('assets/js/script.js', ['type' => "module"]) ?>


    </body>
</html>
