    <div class="container navigation">
        <div class="row">
                <a class="" href="<?= $site->url() ?>">
                    <img src="<?=$site->image('logo.svg')->url();?>" class="logo" width="150px" title="" alt="">
                </a>
                <button class="ud_menu_icon ud_menu_icon-X">
                    <?php
                    $detect = new Mobile_Detect;
                    if ($detect->isMobile()):?>
                    <span>
                    </span>
                </button>

                    <?php else: ?>
                        <p class="">
                            Menü
                        </p>
                    <span>
                    </span>
                </button>
                <?php endif; ?>





<?php snippet('treemenu') ?>


