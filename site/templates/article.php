
<?php snippet('header') ?>
<section class="page-article">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <main class="main" role="main">
                    <header class="wrap">
                        <h1><?= $page->title()->html() ?></h1>
                        <div class="intro text">
                            <p class="article-date"><?= $page->date()->toDate('%d.%m.%Y') ?>



                            </p>
                        </div>
                        <hr />
                    </header>
                    <div class="text wrap">
                        <?= $page->text()->kirbytext() ?>
                        <?php if($page->hasImages()):?>

                            <?php
                                $anzahl = $page->files()->count();
                                if($anzahl == 1):
                                ?>

                                    <?php foreach($page->files() as $file): ?>

                                                    <figure class="focuhila " >
                                                        <a href="<?= $file->url() ?>" class="swipebox">
                                                            <img class="card-img-top  opacity_1 img-fluid bild" style="object-fit: cover; object-position:50% 50%; height: 95%" src="<?= $file->url() ?>"  data-echo="<?= $file->url() ?>"   title="<?= $page->title()->html(); ?>" alt="<?= $page->title()->html(); ?>">
                                                        </a>
                                                    </figure>



                                    <?php endforeach; ?>

                                <?php endif; ?>
                               <?php if($anzahl == 2): ?>
                                <?php foreach($page->files() as $file): ?>

                                    <div class="col-md-6 col-sm-6">
                                                <figure class="focuhila" >
                                                    <a href="<?= $file->url() ?>" class="swipebox">
                                                        <img class="card-img-top   img-fluid " src="<?= $file->url() ?>"  data-echo="<?= $file->url() ?>"   title="<?= $page->title()->html(); ?>" alt="<?= $page->title()->html(); ?>">
                                                    </a>
                                                </figure>



                                    </div>
                                <?php endforeach; endif;?>
                                <?php if($anzahl >= 3): ?>
                                    <?php foreach($page->files() as $file): ?>

                                        <div class="col-md-4 col-sm-4">
                                                    <figure class="focuhila " >
                                                        <a href="<?= $file->url() ?>" class="swipebox">
                                                            <img class="card-img-top img-fluid "  src="<?= $file->url() ?>"  data-echo="<?= $file->url() ?>" title="<?= $page->title()->html(); ?>" alt="<?= $page->title()->html(); ?>">
                                                        </a>
                                                    </figure>


                                        </div>
                                    <?php endforeach; endif;?>
                            </div>
                            <div class="buttonbox">
                                <a href="<?= $page->parent()->url() ?>" class="showcase-link">
                                    <button type="button" class="btn btn-primary">
                                        zurück
                                    </button>
                                </a>
                            </div>
                        </div>
                <?php else:?>
                            <div class="buttonbox">
                                <a href="<?= $page->parent()->url() ?>" class="showcase-link">
                                    <button type="button" class="btn btn-primary">
                                        zurück
                                    </button>
                                </a>
                            </div>
                            <div class="pseudo">

                            </div>



                        <?php endif;?>
                    </div>
            </div>
</section>

<?php snippet('footer') ?>