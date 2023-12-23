<?php snippet('header') ?>



<?php snippet('headerbild') ?>



<section class="<?= $page->uid() ?>" id="<?= $page->uid() ?>">
    <div class="container">
        <div class="row">
            <?php $mannschaften = $page->children()->listed() ?>

            <?php foreach($mannschaften as $mannschaft):?>


                    <div class="col-md-6 col-sm-6 margin-bottom ">
                        <a href="<?= $mannschaft->url() ?>">

                        <div class="tx-hive-cpt-cnt-img">
                            <div class="landscape aR aR--16_9">
                                <figure class="focuhila">
                                    <img class="card-img-top b-lazy opacity_0 img-fluid" style="object-fit: cover; object-position: 50% 50%; height: 300px;"src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  data-echo="<?= $mannschaft->headerbild()->toFile()->url(); ?>" title="" alt="">
                                    <figcaption class="figcaption ">
                                        <h5><?= $mannschaft->title()->html(); ?></h5>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        </a>

                    </div>




            <?php endforeach; ?>
        </div>

    </div>

</section>


<?php snippet('footer') ?>


