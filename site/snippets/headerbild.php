<section class="header-bild ">
    <!--Scroll down-->

    <div class="scrolldown">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <a class="smooth" href="<?= $page->url() ?>#<?= $page->uid() ?>">
                        <div class="downArrow bounce">
                            <div class="down"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-md-12">
                <figure style="aspect-ratio: 21/9" id="header-image-wrapper">

                    <?php if ($image = $page->headerbild()->toFile()): ?>

                           <img class="card-img-top img-fluid bild" fetchPriority="high" id="header-image"  src="<?= $image->url() ?>"
                             title="<?= $page->title()->html(); ?>" alt="<?= $page->title()->html(); ?>">
                    <?php endif ?>
                </figure>
                <div class="figcaption">
                    <h1>
                        <?= $page->title()->html() ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>
