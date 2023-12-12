<?php snippet('header') ?>



<?php snippet('headerbild') ?>



<section class="<?= $page->uid() ?>" id="<?= $page->uid() ?>">
    <div class="container-fluid">
        <div class="row">
            <?php $mannschaften = $page->children() ?>

            <?php foreach($mannschaften as $mannschaft):?>
                    <h2><?= $mannschaft->title()->html()?>
                        <hr class="blau">
                    </h2>

               <?php $i=1;foreach($mannschaft->children() as $team):?>
                    <div class="col-lg-6 col-xl-4 col-md-12 ">
                        <a href="<?= $mannschaft->url() ?>/page:<?=$i ?>#<?= $mannschaft->uid() ?>">

                                <figure class="focuhila">
                                    <img class="card-img-top img-fluid" src="<?= $team->mannschaftsbild()->toFile()->url(); ?>"  title="" alt="">
                                    <figcaption class="figcaption ">
                                        <h5><?= $team->title()->html()?></h5>
                                    </figcaption>
                                </figure>
                        </a>
                            </div>
                <?php $i=$i+1; endforeach; ?>




            <?php endforeach; ?>
                        </div>
                    </div>
</section>


<?php snippet('footer') ?>


