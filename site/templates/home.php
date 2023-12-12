<?php snippet('header') ?>
<?php snippet('headerbild') ?>


<!--<section class="corona">
<div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
            <h3>#KlopapierChallenge</h3>

                <p>
                In der Corona-Zeit gibt es die wichtige Botschaft: Zuhause bleiben. Wir als FV Tennenbronn unterstützen diese Botschaft und machten bei der #KlopapierChallenge mit.                 </p>
            </div>
            <div class=" col-md-6">
        
<iframe width="100%" height="315" src="https://www.youtube.com/embed/k4OpkYGP6ZY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
        </div>
    </div>
</section>
-->

<section class="news">

    <h2 id="<?= $page->uid() ?>"><?= page('news')->title() ?></h2>
    <hr class="blau">

    <?php snippet('showcase_news', ['limit' => 2]) ?>
</section>
<section class="verein">
    <?php
    $projects = page('verein')->children()->listed();
    if (isset($limit)) $projects = $projects->limit($limit);

    ?>
    <div class="container">
        <h2><?= page('verein')->title() ?></h2>
        <hr class="schwarz">
        <div class="row">

            <?php
            foreach ($projects as $project):
                $index = 0;

                ?>

                <div class="col-lg-6 col-sm-12">
                    <a href="<?= $project->url() ?>">

                        <figure class="focuhila">
                            <?php if ($project->headerbild()->isNotEmpty()):; ?>
                                <img class="card-img-top "  src="<?= $project->headerbild()->toFile()->url() ?>"
                                     title="<?= $project->title()->html() ?>" alt=" <?= $project->title()->html() ?>" width="540" height="231" loading="lazy" /><!--width="540" height="231" loading="lazy"-->
                            <?php endif ?>
                            <figcaption class="figcaption d-flex align-items-center justify-content-center">
                                <h5><?= $project->title()->html() ?></h5>
                            </figcaption>
                        </figure>

                    </a>
                </div>

            <?php
            endforeach ?>
        </div>
    </div>
</section>
<section class="countup" id="counter">
    <div class="container">
        <div class="row d-flex justify-content-center no-gutters">

            <div class="col-lg-3 col-md-12">
                <h3 class="counter-value" data-count="1914">1914</h3>
                <h3>Gründung</h3>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="counter-value" data-count="280">280</h3>
                <h3>Aktive</h3>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="counter-value" data-count="456">456</h3>
                <h3>Passive</h3>
            </div>
        </div>
    </div>
    <noscript>
        <div id="fixed-image"></div>
    </noscript>
</section>

<section class="mannschaften">
    <?php


    $projects = page('mannschaften')->children()->listed();

    if (isset($limit)) $projects = $projects->limit($limit);

    ?>


    <div class="container">

        <h2><?= page('mannschaften')->title() ?></h2>

        <hr class="blau">
        <?php foreach ($projects as $project): ?>


        <div class="row no-gutters">
            <div class="col-md-12">
                <a href="<?= $project->url() ?>">
                    <figure class="focuhila">
                        <?php if ($project->headerbild()->isNotEmpty()): ?>
                            <img class="card-img-top " src="<?= $project->headerbild()->toFile()->url() ?>"
                                 title="<?= $project->title()->html() ?>"
                                 alt=" <?= $project->title()->html() ?>"
                                 width="1110" height="457" loading="lazy"
                            />
                            <!-- width="1110" height="457" loading="lazy"-->
                        <?php endif ?>
                        <figcaption class="figcaption d-flex align-items-center justify-content-center">
                            <h5><?= $project->title()->html() ?></h5>
                        </figcaption>
                    </figure>
                </a>
            </div>
        </div>

            <?php endforeach; ?>
        </div>
</section>
<section class="kontakt">
    <h2>Kontakt</h2>
    <hr class="blau">
    <div class="container no-padding">
        <div class="row no-gutters">
            <div class="col-md-12 no-padding" id="map-wrapper">
                <div class="iframe" id="iframe-placeholder">
                    <button class="btn btn-primary" id="maps-btn">Karte anzeigen</button>

                </div>
                <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2659.877765606774!2d8.339553916025118!3d48.18970657922769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4790c6ded3b6d6d5%3A0x2275aaceef3d2644!2sVereinsgastst%C3%A4tte+Fu%C3%9Fball-+ballverein+1914+e.+V.!5e0!3m2!1sde!2sde!4v1536157707364"
                        width="100%" height="450"  style="border:0" allowfullscreen></iframe>-->
                <div class="margin-button">
                    <a href="<?= page('kontakt')->url() ?>">
                        <button type="button" class="btn btn-primary">
                            mehr
                        </button>
                    </a>
                </div>
            </div>

</section>

<?php snippet('footer') ?>


