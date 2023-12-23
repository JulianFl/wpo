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

    <?php snippet('showcase_news', ['limit' => 1]) ?>
</section>
<section class="verein">
    <?php
    $projects = page('verein')->children()->listed();
    if(isset($limit)) $projects = $projects->limit($limit);

    ?>
    <div class="container">
        <h2><?= page('verein')->title() ?></h2>
        <hr class="schwarz">
        <div class="row">

            <?php
            foreach($projects as $project):
                $index = 0;

                ?>

                <div class="col-md-6" >
                    <a href="<?= $project->url() ?>">
                        <div class="tx-hive-cpt-cnt-img">
                            <div class="landscape aR aR--4_3">
                                <figure class="focuhila">
                                    <?php if($project->headerbild()->isNotEmpty()):;   ?>
                                        <img class="card-img-top b-lazy opacity_0 " style="object-fit: cover; object-position:50% 50%; height: 300px;" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  data-echo="<?= $project->headerbild()->toFile()->url() ?>" title="<?= $project->title()->html() ?>" alt=" <?= $project->title()->html() ?>">
                                    <?php endif ?>
                                    <figcaption class="figcaption d-flex align-items-center justify-content-center">
                                        <h5><?= $project->title()->html() ?></h5>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </a>
                </div>

            <?php
            endforeach ?>
        </div>
    </div>
</section>
<section class="countup" id="counter">

    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-lg-3 col-md-12">
                <h3 class="counter-value" data-count="1914">0</h3>
                <h3>Gründung</h3>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="counter-value" data-count="280">0</h3>
                <h3>Aktive</h3>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="counter-value" data-count="456">0</h3>
                <h3>Passive</h3>
            </div>
        </div>
    </div>
</section>

<section class="mannschaften">
    <?php


    $projects = page('mannschaften')->children()->listed();

    if(isset($limit)) $projects = $projects->limit($limit);

    ?>


    <div class="container-fluid">

        <h2><?= page('mannschaften')->title() ?></h2>

         <hr class="blau">
            <?php $i=0;$j=0;  foreach($projects as $project):
                $index=0;
                ?>

               <?php if ($i == 0){?>
                    <div class="row">
                    <div class="col-md-12 col-sm-12 ">


                        <a href="<?= $project->url() ?>">
                            <div class="tx-hive-cpt-cnt-img">
                            <?php
                            $detect = new Mobile_Detect;
                            if ($detect->isMobile() || $detect->isTablet()):?>
                                 <div class="landscape aR aR--21_9">
                                     <?php else: ?>
                                 <div class="landscape aR aR--21_5">
                                      <?php endif; ?>

                                    <figure class="focuhila">
                                        <img class="card-img-top b-lazy opacity_0 " style="object-fit: cover; object-position:50% 40%; height: 300px;" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  data-echo="<?=  $project->headerbild()->toFile()->url() ?>" title="<?= $project->title()->html() ?>" alt=" <?= $project->title()->html() ?>">
                                        <figcaption class="figcaption d-flex align-items-center justify-content-center">
                                            <h5><?= $project->title()->html() ?></h5>
                                        </figcaption>
                                    </figure>


                                </div>
                            </div>
                        </a>

                    </div>
                    </div>
                    <?php
                    $i = $i + 1;
                }else{ ?>
                    <?php if ($j % 2 == 0):?>
                        <div class="row">
                            <div class="col-lg-6 col-md-12" >
                                <a href="<?= $project->url() ?>">
                                    <div class="tx-hive-cpt-cnt-img">
                                        <div class="landscape aR aR--21_9">
                                            <figure class="focuhila">
                                                <?php if($project->headerbild()->isNotEmpty()): ?>
                                                    <img class="card-img-top b-lazy opacity_0 " style="object-fit: cover; object-position:50% 50%; height: 300px;" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  data-echo="<?=  $project->headerbild()->toFile()->url() ?>" title="<?= $project->title()->html() ?>" alt=" <?= $project->title()->html() ?>">                                                <?php endif ?>
                                                <figcaption class="figcaption d-flex align-items-center justify-content-center">
                                                    <h5><?= $project->title()->html() ?></h5>
                                                </figcaption>
                                            </figure>

                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php $j=$j+1; else: ?>
                        <div class="col-lg-6 col-md-12" >
                            <a href="<?= $project->url() ?>">
                                <div class="tx-hive-cpt-cnt-img">
                                    <div class="landscape aR aR--21_9">
                                        <figure class="focuhila">
                                            <?php if($project->headerbild()->isNotEmpty()): ?>
                                                <img class="card-img-top b-lazy opacity_0 " style="object-fit: cover; object-position:50% 50%; height: 300px;" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="  data-echo="

                                              <?= $project->headerbild()->toFile()->url() ?>

                                    " title="<?= $project->title()->html() ?>" alt=" <?= $project->title()->html() ?>">                                            <?php endif ?>
                                            <figcaption class="figcaption d-flex align-items-center justify-content-center">
                                                <h5><?= $project->title()->html() ?></h5>
                                            </figcaption>
                                        </figure>

                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>


             <?php
                        $j=$j+1;
                    endif;

                       $i=$i+1; };
                endforeach;
                ?>
        </div>
</section>
<section class="kontakt">
    <h2>Kontakt</h2>
    <hr class="blau">
    <div class="container-fluid no-padding">
        <div class="row">
            <div class="col-md-12 no-padding">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2659.877765606774!2d8.339553916025118!3d48.18970657922769!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4790c6ded3b6d6d5%3A0x2275aaceef3d2644!2sVereinsgastst%C3%A4tte+Fu%C3%9Fball-+ballverein+1914+e.+V.!5e0!3m2!1sde!2sde!4v1536157707364" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            <div class="margin-button">
                <a href="<?= page('kontakt')->url() ?>">
                    <button type="button" class="btn btn-primary">
                        mehr
                    </button>
                </a>
            </div>
            </div>

</section>

<script src="//code.jquery.com/jquery-latest.js"></script>
<script >
    /*count up*/
    var a = 0;
    $(window).scroll(function() {

        var oTop = $('#counter').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter-value').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                        countNum: countTo
                    },

                    {

                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }

                    });
            });
            a = 1;
        }

    });

</script>

<?php snippet('footer') ?>


