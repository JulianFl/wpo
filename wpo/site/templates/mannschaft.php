<?php snippet('header') ?>
<?php snippet('headerbild') ?>




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
<?php if($image = $team->mannschaftsbild()->toFile()): ?>

               <div class="row">
                   <div class="col-md-12 ud_gallery">
                                   <figure class="focuhila " >
                                           <img class="card-img-top img-fluid " src="<?= $image->url() ?>" title="<?= $page->title()->html(); ?>" alt="<?= $page->title()->html(); ?>">
                                   </figure>
                               </div>
                           </div>
                   </div>
               </div>
               <?php endif ?>

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

                                        <figure class="focuhila">

                                            <?php if($image = $trainer->trainerbild()->toFile()): ?>

                                                <img class="card-img-top " src="<?= $image->url() ?>"  data-echo="<?= $image->url() ?>" title=" <?= $trainer->name() ?>" alt=" <?= $trainer->name() ?>">
                                            <?php endif; ?>
                                        </figure>
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
                                <figure class="focuhila">

                                    <?php if($image = $trainer->trainerbild()->toFile()): ?>

                                        <img class="card-img-top  " src="<?= $image->url() ?>"   title=" <?= $trainer->name() ?>" alt="  <?= $trainer->name() ?>">
                                    <?php endif; ?>
                                   </figure>
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

</section>

<?php snippet('footer') ?>


