<!doctype html>

<html lang="de">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site->title()->html() ?> | <?php if ($page == "home"): echo 'Home'; else: echo $page->title()->html(); endif; ?></title>
    <!--<meta name="google-site-verification" content="s7BeovUnI5rM5hqiGra1zuGtNeCAmt0x4rbR7RbU41M" />-->

    <?php if($page->description() != ''): ?>
        <meta name="description" content="<?= $page->description()->html() ?>" />
    <?php else: ?>
        <meta name="description" content="<?= $site->description()->html() ?>" />
    <?php endif ?>

    <?php if($page->keywords() != ''): ?>
        <meta name="keywords" content="<?= $page->keywords()->html() ?>" />
    <?php else: ?>
        <meta name="keywords" content="<?= $site->keywords()->html() ?>" />
    <?php endif ?>
    <meta name="author" content="Julian Fleig">
    <meta name="robots" content="index, follow" />

    <!-- Analytics-->
    <!-- Analytics-->
    <!-- Analytics
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118128282-2"></script>
    <script type="text/javascript">
        var gaProperty = 'UA-115388787-3';
        var disableStr = 'ga-disable-' + gaProperty;
        if (document.cookie.indexOf(disableStr + '=true') > -1) {
            window[disableStr] = true;
        }
        function gaOptout() {
            document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
            window[disableStr] = true;
            alert('Das Tracking durch Google Analytics wurde in Ihrem Browser für diese Website deaktiviert.');
        }
    </script>-->

    <!-- Global site tag (gtag.js) - Google Analytics
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115388787-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-115388787-3');
    </script>
-->

    <!-- Analytics-->
    <!-- Analytics-->
    <!-- Analytics-->
    <?= css('assets/css/fonts.css') ?>
    <?= css('assets/css/swipebox.min.css') ?>


    <?= css('assets/css/bootstrap.min.css') ?>
    <?= css('assets/css/style.css') ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />



    <!-- ios hover fix-->
        <script>document.addEventListener("touchstart", function(){}, true);</script>


    <link rel="icon" type="image/png" href="<?=$site->image('logo.png')->url();?>">

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />

    <!--<link href="//fonts.googleapis.com/css?family=Poppins" rel="stylesheet">-->
    <?php
    require_once 'Mobile_Detect.php';?>
</head>
<body class="page-<?= $page->uid() ?>">

<?php snippet('menu') ?>
