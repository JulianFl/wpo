<?php snippet('header') ?>



<?php snippet('headerbild') ?>



<section class="<?= $page->uid() ?>" id="<?= $page->uid() ?>">
<article>
<div class="container einstiegstext">
    <div class="row">
        <div class="col-lg-6">

            <h3><?= $page->ueberschrift()->html() ?></h3>
            <hr class="blau">
            <?= $page->einstiegstext()->kirbytext() ?>

<div class="icons">
            <a href="https://www.facebook.com/pg/Vereinsheim-FV-Tennenbronn-611679572291801/about/?ref=page_internal" target="blank"   title="Facebook">
            <img src="<?=$site->image('facebook.svg')->url();?>" class="" width="50px" title="" alt="">
                </a>

            <a href="mailto:<?= str::encode('schaechletreff-neun10vier10@gmx.de') ?>" title="Sende uns eine E-Mail">

            <img src="<?=$site->image('envelope.svg')->url();?>" class="" width="50px" title="" alt="">
            </a>
</div>
        </div>
        <div class="col-lg-6">
            <div class="tx-hive-cpt-cnt-img">
                <div class="landscape aR aR--16_9">
                    <figure class="focuhila">
                        <img class="card-img-top b-lazy opacity_0 " style="object-fit: cover; object-position: <?php echo image($page->team())->focusPercentageX() ?>% <?php echo image($page->team())->focusPercentageY() ?>%; height: 300px;"src="<?= image($page->team())->url()?>"  data-echo="<?= image($page->team())->url()?>" title="<?= $page->title()->html() ?>" alt="<?= $page->title()->html() ?>">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>
</article>
    <?php

    foreach($page->tabs()->toStructure()->flip() as $item):
        if ($item->picture()->isNotEmpty()):
            $picture = $page->image($item->picture());

            ?>
            <article >
                <div class="container">

                    <div class="row">
                        <div class="col-md-6">
                                                <?php if ($item->title()->isNotEmpty()):?>
                                <h3><?= $item->title()->html() ?>
                                </h3>
                                                    <hr class="blau">

                                                <?php endif;?>
                                <?= $item->text()->kirbytext() ?>

                        </div>
                        <div class="col-md-6">
                            <a href="<?= $picture->url() ?>" target="_blank">

                            <div class="tx-hive-cpt-cnt-img">
                                <div class="landscape aR aR--16_9">
                                    <figure class="focuhila text-center">
                                        <img class="card-img-overlay b-lazy opacity_0 " style="object-fit: cover; object-position: <?php echo $picture->focusPercentageX() ?>% <?php echo $picture->focusPercentageY() ?>%; height: 300px;"src="<?= image($page->team())->url()?>"  data-echo="<?= $picture->url() ?>" title="<?= $item->title()->html() ?>" alt="<?= $item->title()->html() ?>">
                                    </figure>
                                </div>
                            </div>
                            </a>

                        </div>
                    </div>
                </div>
            </article>


            <?php elseif ($item->text()->isNotEmpty()):
            ?>
            <article class="">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                                <?php if ($item->title()->isNotEmpty()):?>

                                <h3><?= $item->title()->html() ?></h3>
                                <hr class="blau">
                                <?php endif; ?>
                            <div class="d-flex justify-content-center">
                                <div>
                                <?= $item->text()->kirbytext() ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </article>
<?php endif ?>
           <?php if ($item->gallery()->isNotEmpty()):?>
            <article class="lightbox">

                <div class="container">
                    <?php if ($item->title()->isNotEmpty()):?>
                    <h3 class="text-c"><?= $item->title()->html() ?>
                    </h3>
                        <hr class="fotos schwarz">

                    <?php endif ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?= $item->gallery()->kirbytext() ?>

                        </div>
                    </div>

                </div>

            </article>




    <?php
    endif;
    endforeach ?>









</section>


<?php snippet('footer') ?>


