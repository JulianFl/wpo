<?php snippet('header') ?>



<section class="header-bild-mannschaft  <?php
$detect = new Mobile_Detect;
if ($detect->isMobile()):
    ?>headerlight<?php endif;?>">
    <!--Scroll down-->


    <div class="figcaption">
        <h1>
            <?= $page->title()->html() ?>
        </h1>
    </div>
    <?php if($image = $page->headerbild()->toFile()): ?>

    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-md-12 no-padding  <?php
            $detect = new Mobile_Detect;
            if ($detect->isMobile()):
                ?>ud_gallery<?php endif;?>">
                <div class="tx-hive-cpt-cnt-img">
                    <div class="landscape aR aR--21_9">
                        <figure class="focuhila">


                                <img class="card-img-top b-lazy opacity_0 img-fluid bild" style="object-fit: cover; object-position:50% 50%; height: 300px;" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  data-echo="<?= $image->url() ?>" title="<?= $page->title()->html(); ?>" alt="<?= $page->title()->html(); ?>">

                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif ?>

</section>



<section class="mannschaft" id="<?= $page->uid() ?>">


    <?php

    $list       = $page->children()->paginate(1);

    $pagination = $list->pagination();

    ?>

    <nav class="nav1 margin-bottom" >
        <div class="container d-flex justify-content-center">
                <ul>

                    <?php
                    $r = 1  ;

                    foreach($page->children() as $children): ?>
                            <li>
                                <a <?php if($pagination->page() == $r) echo ' class="active"' ?> href="<?= $pagination->pageURL($r) ?>#<?= $page->uid() ?>">
                                    <?= $children->title()->html() ; ?>
                                </a>
                            </li>

                        <?php $r=$r+1; endforeach;?>

                </ul>


        </div>
    </nav>





        <?php  foreach($page->children()->paginate(1) as $team ):

            ?>

<!--<div class="container-fluid">
    <div class="row">

-->
<div class="container margin-bottom">
    <div class="row">
        <div class="col-md-12">
            <h2><?= $team->title()->html() ?></h2>
            <hr class="blau">
            <?= $team->text()->kirbytext() ?>

        </div>
    </div>
</div>
           <div class="container no-padding margin-bottom">
               <div class="row">
                   <div class="col-md-12 ud_gallery">
                           <div class="tx-hive-cpt-cnt-img">
                               <div class="landscape aR aR--21_9">
                                   <figure class="focuhila " >
                                       <?php if($image = $team->mannschaftsbild()->toFile()): ?>
                                           <img class="card-img-top b-lazy opacity_0 img-fluid bild" style="object-fit: cover; object-position:50% 50%; height: 300px;" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  data-echo="<?= $image->url() ?>" title="<?= $page->title()->html(); ?>" alt="<?= $page->title()->html(); ?>">
                                       <?php endif ?>
                                   </figure>
                               </div>
                           </div>
                   </div>
               </div>
           </div>
    <?php if ($team->tabs()->isNotEmpty() ): ;?>

    <section class="trainer">

        <h2>Trainer</h2>
        <hr class="blau">
            <?php  ?>
            <?php $i=0; foreach($team->tabs()->toStructure() as $trainer):

            if ($i % 2 == 0 || $i == 0):
            ?>

                 <article class="bg">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-4 ">
                                <div class="tx-hive-cpt-cnt-img">
                                    <div class="portrait aR aR--3_4">

                                        <figure class="focuhila">

                                            <?php if($image = $trainer->trainerbild()->toFile()): ?>

                                                <img class="card-img-top b-lazy opacity_0 " style="object-fit: cover; object-position: 50% 50%; height: 347px;"src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  data-echo="<?= $image->url() ?>" title=" <?= $trainer->name() ?>" alt=" <?= $trainer->name() ?>">
                                            <?php endif; ?>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 daten d-flex align-items-center justify-content-center">
                                <div class="">
                                    <h3><?= $trainer->name()->html() ?></h3>

                                    <hr class="schwarz">

                                    <ul>


                                        <?php if ($trainer->street()->isNotEmpty()):?>
                                            <li><?= $trainer->street()->html() ?></li>
                                        <?php endif ?>
                                        <?php if ($trainer->zip()->isNotEmpty()):?>
                                            <li><?= $trainer->zip()->html() ?> <?= $trainer->location()->html() ?></li>
                                        <?php endif; ?>
                                        <?php if ($trainer->phone()->isNotEmpty()):?>
                                            <li><?= html::a("tel:" . $trainer->phone(), $trainer->phone()) ?></li>
                                        <?php endif;?>
                                        <?php if ($trainer->email()->isNotEmpty()):?>
                                            <li><a href="mailto:<?= str::encode($trainer->email()) ?>"><?= $trainer->email()->html() ?></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                     </article>
                 <?php $i=$i+1; else:?>
                 <article >
                 <div class="container">
                <div class="row ">
                    <div class="col-md-8 d-flex align-items-center justify-content-center daten">
                        <div class="">
                            <h3><?= $trainer->name()->html() ?></h3>

                            <hr class="schwarz">

                            <ul>

                                <?php if ($trainer->street()->isNotEmpty()):?>
                                    <li><?= $trainer->street()->html() ?></li>
                                <?php endif ?>
                                <?php if ($trainer->zip()->isNotEmpty()):?>
                                    <li><?= $trainer->zip()->html() ?> <?= $trainer->location()->html() ?></li>
                                <?php endif; ?>
                                <?php if ($trainer->phone()->isNotEmpty()):?>
                                    <li><?= html::a("tel:" . $trainer->phone(), $trainer->phone()) ?></li>
                                <?php endif;?>
                                <?php if ($trainer->email()->isNotEmpty()):?>
                                    <li><a href="mailto:<?= str::encode($trainer->email()) ?>"><?= $trainer->email()->html() ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tx-hive-cpt-cnt-img">
                            <div class="portrait aR aR--3_4 ">
                                <figure class="focuhila">

                                    <?php if($image = $trainer->trainerbild()->toFile()): ?>

                                        <img class="card-img-top b-lazy opacity_0 " style="object-fit: cover; object-position: 50% 50%; height: 347px;"src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  data-echo="<?= $image->url() ?>" title=" <?= $trainer->name() ?>" alt="  <?= $trainer->name() ?>">
                                    <?php endif; ?>
                                   </figure>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
                 </article>
                <?php $i=$i+1; endif; ?>
            <?php endforeach;?>
    </section>

        <?php endif;?>
        <?php endforeach; ?>

    <!-- </div>
 </div>-->
    <div class="container">
    <div class="row">
        <div class="col-md-12">

            <div id="widget1"></div>

            </div>


    </div>
    </div>



</section>

<?php snippet('footer') ?>


