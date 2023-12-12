<?php snippet('header') ?>



<?php snippet('headerbild') ?>



<section class="<?= $page->uid() ?>" id="<?= $page->uid() ?>">
    <div class="container">


    <?php

    foreach($page->tabs()->toStructure() as $item):
        $picture = $page->image($item->picture());
        $picture1 = $page->image($item->picture1());

        ?>


                <?php if ($item->title()->isNotEmpty()):?>
                    <h2><?= $item->title()->html()?></h2>
                    <hr class="blau">
                <?php endif ?>
                    <div class="row ">
                        <?php if ($item->picture()->isNotEmpty()):?>

                        <div class="col-md-6">
                            <div class="tx-hive-cpt-cnt-img">
                                <div class="landscape aR aR--16_9">
                                    <figure class="focuhila">
                                        <img class="card-img-top b-lazy opacity_0 " style="object-fit: cover; object-position: 50% 50%; height: 300px;"src="<?= $picture->url() ?>"  data-echo="<?= $picture->url() ?>" title="" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
    <?php endif ?>

        <?php if ($item->picture1()->isNotEmpty()):?>

                        <div class="col-md-6">
                            <div class="tx-hive-cpt-cnt-img">
                                <div class="landscape aR aR--16_9">
                                    <figure class="focuhila">
                                        <img class="card-img-top b-lazy opacity_0 " style="object-fit: cover; object-position: 50% 50%; height: 300px;"src="<?= $picture1->url() ?>"  data-echo="<?= $picture1->url() ?>" title="" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>

    <?php endif ?>




    <?php endforeach ?>

    </div>

</section>


<?php snippet('footer') ?>


