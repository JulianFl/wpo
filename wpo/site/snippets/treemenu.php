

            <?php

            // nested menu
            $items = $pages->listed();

            // only show the menu if items are available
            if($items->count()):

                ?>
                <nav class="burgermenu">
                    <div class="container-fluid">
                        <div class="row">
                                <div class="col-md-6 col-xl-4">
                                    <div class="bg-color d-flex align-items-center">
                                        <a class="burger-logo" href="<?= $site->url() ?>">
                                            <img src="<?=$site->image('logo.svg')->url();?>" class="" width="150px" title="" alt="">
                                        </a>

                                        <ul class="ul1">

                                            <?php
                                            $index = 0;
                                            foreach($items as $item): ?>
                                                <li class="depth-<?= $item->depth() ?>">
                                                    <a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
                                                    <?php
                                                    if($index != 0): ?>

                                                    <?php

                                                    // get all children for the current menu item
                                                    $children = $item->children()->listed();

                                                    // display the submenu if children are available
                                                    if($children->count() > 0):

                                                        ?>
                                                        <div class="bg-color2 ">
                                                            <ul class="ul2">
                                                                <?php foreach($children as $child): ?>
                                                                    <li class="depth-<?= $child->depth() ?>"><a<?php e($child->isOpen(), ' class="active"') ?> href="<?= $child->url() ?>"><?= $child->title()->html() ?></a></li>
                                                                <?php endforeach ?>
                                                            </ul>
                                                        </div>

                                                    <?php endif ?>
                                                    <?php endif ?>

                                                </li>
                                            <?php $index = $index+1;endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            <div class="col-md-6 col-xl-8"></div>



                        </div>
                    </div>

                </nav>
            <?php endif ?>

            <nav class="mobile-nav ">

                                <ul class="ul1">
                                    <?php foreach($items as $item): ?>
                                    <li class="depth-<?= $item->depth() ?>">
                                        <a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>">
                                            <button class="" type="button">
                                                    <?= $item->title()->html() ?>
                                            </button>
                                        </a>
                                            <?php if($item->hasChildren() && $item != 'news'): ?>

                                            <button type="button" class=" dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>

                                            <ul class="dropdown-menu ul2">
                                                <?php if($item != 'news'): ?>

                                                    <?php

                                                    // get all children for the current menu item
                                                    $children = $item->children()->listed();

                                                    // display the submenu if children are available
                                                    if($children->count() > 0):

                                                        ?>
                                                                <?php foreach($children as $child): ?>
                                                        <a<?php e($child->isOpen(), ' class="active"') ?> href="<?= $child->url() ?>"> <li class="depth-<?= $child->depth() ?>"><?= $child->title()->html() ?></li></a>
                                                                <?php endforeach ?>

                                                    <?php endif ?>
                                                <?php endif ?>

                                            </ul>
                                            <?php endif ?>


                                    <?php endforeach ?>
                                    </li>

                                </ul>


            </nav>

            </div>

    </div>
