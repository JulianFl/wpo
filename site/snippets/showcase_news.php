
<?php

$projects = page('news')->children()->listed();

/*

The $limit parameter can be passed to this snippet to
display only a specified amount of projects:

```
<?php snippet('showcase', ['limit' => 3]) ?>
```

Learn more about snippets and parameters at:
https://getkirby.com/docs/templates/snippets

*/
$list       = page('news')->children()->paginate(5);
$pagination = $list->pagination();
if(isset($limit)) $projects = $projects->limit($limit);
?>


    <?php
    $i = 1;
    foreach($projects->sortBy('date', 'desc')->paginate(5) as $project ): ?>
        <?php if ($i % 2 == 0 || $i == 0){?>

            <?php if($project->hasImages()){ ?>

                <article class="bg post">
                    <div class="container ">

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="showcase-caption">
                                    <h4 class="showcase-title"><?= $project->title()->html() ?></h4>
                                    <?= $project->date()->toDate('%d.%m.%Y') ?>
                                    <hr>
                                    <?= $project->text()->kirbytext()->excerpt(200, 'words') ?>
                                </div>
                                <div class="buttonbox">
                                    <a href="<?= $project->url() ?>" class="showcase-link">
                                        <button type="button" class="btn btn-secondary">
                                            mehr
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                        <figure class="focuhila">
                                            <img class="card-img-top " width="540" height="303" loading="lazy" src="<?= $project->images()->sortBy('sort', 'asc')->first()->url() ?>" title="<?= $project->title()->html() ?>" alt="<?= $project->title()->html() ?>">
                                        </figure>
                                    </div>
                                </div>
                            </div>

                </article>
            <?php }else

            {?>
                <article class="bg post">
                    <div class="container">

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="showcase-caption">
                                    <h4 class="showcase-title"><?= $project->title()->html() ?></h4>
                                    <?= $project->date()->toDate('%d.%m.%Y') ?>
                                    <hr>
                                    <?= $project->text()->kirbytext()->excerpt(200, 'words') ?>
                                </div>
                                <div class="buttonbox">
                                    <a href="<?= $project->url() ?>" class="showcase-link">
                                        <button type="button" class="btn btn-secondary">
                                            mehr
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php }?><?php
            $i = $i + 1;
        }else{?>
            <?php if($project->hasImages()){ ?>
                <article class="post">
                    <div class="container">

                        <div class="row ">
                            <div class="col-md-6">
                                <div class="showcase-caption">
                                    <h4 class="showcase-title"><?= $project->title()->html() ?></h4>
                                    <?= $project->date()->toDate('%d.%m.%Y') ?>
                                    <hr>
                                    <?= $project->text()->kirbytext()->excerpt(200, 'words') ?>
                                </div>
                                <div class="buttonbox">
                                    <a href="<?= $project->url() ?>" class="showcase-link">
                                        <button type="button" class="btn btn-primary">
                                            mehr
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                        <figure class="focuhila">
                                            <img class="card-img-top " width="540" height="303" loading="lazy" src="<?= $project->images()->sortBy('sort', 'asc')->first()->url() ?>"  title="<?= $project->title()->html() ?>" alt="<?= $project->title()->html() ?>">
                                            <!--width="540" height="303" loading="lazy"-->
                                        </figure>
                                    </div>
                                </div>
                            </div>

                </article>
            <?php }else

            {?>
                <article class="post">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="showcase-caption">
                                    <h4 class="showcase-title"><?= $project->title()->html() ?></h4>
                                    <?= $project->date()->toDate('%d.%m.%Y') ?>
                                    <hr>
                                    <?= 
                                        str::excerpt($project->text()->kirbytext(), 1000, false)
                                    ?>
                                </div>
                                <div class="buttonbox">
                                    <a href="<?= $project->url() ?>" class="showcase-link">
                                        <button type="button" class="btn btn-primary">
                                            mehr
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php }?>


            <?php
            $i=$i+1;
        }?>

    <?php endforeach ?>
<?php if ($page == 'news'):?>
<nav class="pagi">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>

                    <?php if($pagination->hasPrevPage()): ?>
                        <li><a href="<?= $pagination->prevPageURL() ?>">&larr;</a></li>
                    <?php else: ?>
                        <li><span><<</span></li>
                    <?php endif ?>

                    <?php foreach($pagination->range(10) as $r): ?>
                        <li><a<?php if($pagination->page() == $r) echo ' class="active"' ?> href="<?= $pagination->pageURL($r) ?>"><?= $r ?></a></li>
                    <?php endforeach ?>

                    <?php if($pagination->hasNextPage()): ?>
                        <li class="last"><a href="<?= $pagination->nextPageURL() ?>">&rarr;</a></li>
                    <?php else: ?>
                        <li class="last"><span>>></span></li>
                    <?php endif ?>

                </ul>
            </div>
        </div>

    </div>

</nav>
<?php endif;?>