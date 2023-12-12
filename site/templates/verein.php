<?php snippet('header') ?>



<?php snippet('headerbild') ?>

<section class="<?= $page->uid() ?>" id="<?= $page->uid() ?>">

    <div class="container-fluid">
    <div class="jugendleitfaden">
        <?= $page->text()->kirbytext() ?>
    </div>

        <div class="row">



            <?php $mannschaften = $page->children()->listed() ?>

            <?php foreach($mannschaften as $mannschaft):?>


                    <div class="col-md-6 col-sm-6 margin-bottom ">
                        <a href="<?= $mannschaft->url() ?>">

                                <figure class="focuhila">
                                    <img class="card-img-top b-lazy opacity_0 img-fluid" src="<?= $mannschaft->headerbild()->toFile()->url(); ?>" title="" alt="">
                                    <figcaption class="figcaption ">
                                        <h5><?= $mannschaft->title()->html(); ?></h5>
                                    </figcaption>
                                </figure>
                        </a>

                    </div>




            <?php endforeach; ?>
        </div>

    </div>

</section>


<?php snippet('footer') ?>


