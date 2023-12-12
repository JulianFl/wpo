<?php snippet('header') ?>



<?php snippet('headerbild') ?>



<section class="<?= $page->uid() ?>" id="<?= $page->uid() ?>">


    <?php

    $i = 0;
    foreach($page->tabs()->toStructure() as $item): ?>

        <?php if ($i % 2 == 0 || $i == 0){ ?>

            <article class="bg">
                <div class="container" id="<?= $page->uid() ?><?=$i?>">
                    <div class="row">
                        <div class="col-md-4 ">
                                    <figure class="focuhila">
                                        <?php if($image = $item->picture()->toFile()): ?>

                                            <img class="card-img-top" src="<?= $image->url() ?>"  title=" <?= $item->title() ?>" alt=" <?= $item->title() ?>">
                                        <?php endif; ?>
                                    </figure>
                        </div>
                        <div class="col-md-8  d-flex align-items-center justify-content-center">
                            <div>

                                <h3><?= $item->title()->html() ?></h3>

                                <hr class="schwarz">

                                <ul>
                                    <?php if ($item->name()->isNotEmpty()):?>
                                        <li><?= $item->name()->html() ?></li>
                                    <?php endif ?>
                                    <?php if ($item->street()->isNotEmpty()):?>
                                        <li><?= $item->street()->html() ?></li>
                                    <?php endif ?>
                                    <?php if ($item->zip()->isNotEmpty()):?>
                                        <li><?= $item->zip()->html() ?> <?= $item->location()->html() ?></li>
                                    <?php endif; ?>
                                    <?php if ($item->phone()->isNotEmpty()):?>
                                        <li><?= html::a("tel:" . $item->phone(), $item->phone()) ?></li>
                                    <?php endif;?>
                                    <?php if ($item->email()->isNotEmpty()):?>
                                        <li><a href="mailto:<?= str::encode($item->email()) ?>"><?= $item->email()->html() ?></a></li>
                                    <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </article>
            <?php
            $i = $i + 1;
        }else{?>
            <?php  ?>

            <article>
                <div class="container" id="<?= $page->uid() ?>">
                    <div class="row">

                        <div class="col-md-8 d-flex align-items-center justify-content-start ">
                            <div>
                                <h3><?= $item->title()->html() ?></h3>

                                <hr class="schwarz">

                                <ul>
                                    <?php if ($item->name()->isNotEmpty()):?>
                                        <li><?= $item->name()->html() ?></li>
                                    <?php endif ?>
                                    <?php if ($item->street()->isNotEmpty()):?>
                                        <li><?= $item->street()->html() ?></li>
                                    <?php endif ?>
                                    <?php if ($item->zip()->isNotEmpty()):?>
                                        <li><?= $item->zip()->html() ?> <?= $item->location()->html() ?></li>
                                    <?php endif; ?>
                                    <?php if ($item->phone()->isNotEmpty()):?>
                                        <li><?= html::a("tel:" . $item->phone(), $item->phone()) ?></li>
                                    <?php endif;?>
                                    <?php if ($item->email()->isNotEmpty()):?>
                                        <li><a href="mailto:<?= str::encode($item->email()) ?>"><?= $item->email()->html() ?></a></li>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                                    <figure class="focuhila">

                                        <?php if($image = $item->picture()->toFile()): ?>

                                            <img class="card-img-top" src="<?= $image->url() ?>" title=" <?= $item->title() ?>" alt=" <?= $item->title() ?>">
                                        <?php endif; ?>

                                    </figure>
                                </div>
                            </div>
                        </div>
            </article>
            <?php
            $i=$i+1;
        }?>
    <?php endforeach ?>
</section>


<?php snippet('footer') ?>


