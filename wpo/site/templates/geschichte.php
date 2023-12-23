<?php snippet('header') ?>



<?php snippet('headerbild') ?>



<section class="<?= $page->uid() ?>" id="<?= $page->uid() ?>">

    <?php $tabs = $page->tabs();?>
    <nav class="anker-nav d-flex justify-content-center align-items-center">
        <ul>
            <?php $j = 0;
            foreach($tabs->toStructure() as $trainer): ?>

                <li><a class="smooth" href="#<?= $page->uid() ?><?=$j?>"> <?= $trainer->title() ?></a> </li>
            <?php

                $j=$j+1;
            endforeach ?>
        </ul>
    </nav>
    <?php $i=0;

     foreach($page->tabs()->toStructure() as $item):

         if ($i % 2 == 0):
         ?>

            <article  id="<?= $page->uid() ?><?=$i?>">


        <div class="container ">


            <?php if($image = $item->picture()->toFile()): ?>
            <img class=" b-lazy opacity_0 " style="object-fit: cover; object-position: 50% 50%; height: auto;"src="<?= $image->url() ?>"  data-echo="<?= $image->url() ?>" title="<?= $item->title()?>" alt="<?= $item->title()?>" >
             <?php endif; ?>

            <h3><?= $item->title() ?></h3>
            <?= $item->text()->kirbytext() ?>

        </div>


            </article>
            <?php

            $i = $i + 1;
            else:?>

             <article class="bg" id="<?= $page->uid() ?><?=$i?>">
                 <div class="container ">

                     <?php if($image = $item->picture()->toFile()): ?>
                         <img class=" b-lazy opacity_0 " style="object-fit: cover; object-position: 50% 50%; height: auto;"src="<?= $image->url() ?>"  data-echo="<?= $image->url() ?>" title="<?= $item->title()?>" alt="<?= $item->title()?>" >
                     <?php endif; ?>

                     <h3><?= $item->title() ?></h3>
                     <?= $item->text()->kirbytext() ?>
                 </div>
             </article>
            <?php
            $i=$i+1;
        endif;?>
    <?php endforeach ?>
</section>


<?php snippet('footer') ?>


