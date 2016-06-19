<?php
header('Content-Type: text/html; charset=utf-8');
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Kotiseudun linnut</title>
        <meta name="description" content="Tutustu mitä lintuja koti- tai mökkiseudullasi esiintyy">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/app.css">


        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="header-container">
            <header class="wrapper clearfix">
                <h2 class="title">
                    <a href="./" id="titlelink">
                        <img src="images/cygcyg.svg.php" id="logo" alt="">
                        Kotiseudun linnut
                    </a>
                    <a id="helplink" href="#" title="Apua ja taustatietoa">?</a>
                </h2>
            </header>
        </div>


        <div id="help-container">
            <p>Tämä sivu hakee sijaintisi ja näyttää mitä lintuja ympärilläsi pesii. Linnustotiedot ovat peräisin <a href="http://atlas3.lintuatlas.fi/" target="_blank">Lintuatlas</a>-hankkeesta, jossa koko Suomen linnusto kartoitettiin 10x10 km suuruisissa tutkimusruuduissa vuosina 2005-2010.</p>

            <p>Erikoisemmat alueella pesivät lajit on merkitty ikoneilla:</p>
            <p>
            <img src='images/star-green.png' alt='harvalukuinen' title='harvalukuinen' class='icon greenstar'> Harvalukuinen: Suomessa pesii vain vähän tämän lajin edustajia.<br />
            <img src='images/star-blue.png' alt='harvinainen' title='harvinainen' class='icon bluestar'> Harvinainen: Laji elää Suomessa vain harvoilla paikoilla tai pienellä alueella.<br />
            <img src='images/cr.png' alt='äärimmäisen uhanalainen' title='äärimmäisen uhanalainen' class='icon cr'> Äärimmäisen uhanalainen laji (Critically Endangered)<br />
            <img src='images/en.png' alt='erittäin uhanalainen' title='erittäin uhanalainen' class='icon en'> Erittäin uhanalainen laji (ENdangered)<br />
            <img src='images/vu.png' alt='vaarantunut' title='vaarantunut' class='icon vu'> Vaarantunut uhanalainen laji (VUlnerable)
            </p>

        </div>

        <div id="error-container"></div>
        <div id="message-container"></div>

        <div id="main-container">
        </div> <!-- #main-container -->

        <div id="share-container">
            <div class="fb-share-button" data-href="http://www.biomi.org/kotiseudun-linnut/" data-layout="button_count"></div>
            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="fi" data-dnt="true">Twiittaa</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

            <p id="seealso"><a href="/retkelle/">Katso tästä lähimmät lintutornit</a></p>
            <p id="feedback"><a href='http://goo.gl/forms/Xgh1Lpf1u5TjwEXD2'>Palaute</a></p>

        </div>

        <div id="footer-container">
            <footer class="wrapper">


                <h3>Tietolähteet</h3>

                <h4>Levinneisyystiedot</h4>

                <p><strong>Suomen 3. lintuatlaksen tulokset</strong>. Luonnontieteellinen keskusmuseo Luomus, Helsingin yliopisto. Käyttö <a href="http://creativecommons.org/licenses/by/4.0/deed.fi">Creative Commons Nimeä 4.0</a> -lisenssillä.</p>

                <p>Valkama, Jari, Vepsäläinen, Ville & Lehikoinen, Aleksi 2011: <strong>Suomen III Lintuatlas</strong>. – Luonnontieteellinen keskusmuseo ja ympäristöministeriö. <a href="http://atlas3.lintuatlas.fi">http://atlas3.lintuatlas.fi</a> (viitattu 24.1.2015) ISBN 978-952-10-6918-5</p>

                <h4>Uhanalaisuustiedot</h4>

                <p>Tiainen, Juha; Mikkola-Roos, Markku; Below, Antti; Jukarainen, Aili; Lehikoinen, Aleksi; Lehtiniemi, Teemu; Pessa, Jorma; Rajasärkkä, Ari; Rintala, Jukka; Sirkiä, Päivi; Valkama, Jari 2015: <strong>Suomen lintujen uhanalaisuus 2015</strong>. <a href="http://hdl.handle.net/10138/159435 ISBN 978-952-11-4552-0">http://hdl.handle.net/10138/159435 ISBN 978-952-11-4552-0</a></p>

                <p><strong><a href="credits/">Kuvien tekijätiedot</a></strong></p>

                <h3>Tietosuoja</h3>
                <p>Palvelu tallettaa käyttäjän sijainnin ja selaimen ominaisuuksia, mutta ei henkilö- tai tunnistetietoja. Palvelun käyttöä seurataan <a href="https://www.google.com/policies/privacy/partners/">Google Analytics:in</a> ja evästeiden avulla. Voit halutessasi estää evästeiden käytön selaimestasi.</p>

                <p id="credits">Toteutus: <strong>Mikko Heikkinen / <a href="http://www.biomi.org/">biomi.org</a></strong> | <a href="https://github.com/mikkohei13/Suomen-linnut">Code on Github</a> | <a href="/retkelle/tietosuojaseloste/">Tietosuojaseloste</a></p>



            </footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="js/vendor/jquery.modal.css" type="text/css" media="screen" />

        <script>
            var logData = { };
            <?php
                echo "logData.datetime = " . date("YmdHis") . ";\n";
                echo "logData.ip = \"" . sha1($_SERVER['REMOTE_ADDR']) . "\";\n"; // hashing hides the real IP address


                // Automatic base url, https://gist.github.com/mikkohei13/9312936
                $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
                $base_url .= "://".$_SERVER['HTTP_HOST'];
                $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

                echo "var rootUrl = \"" . $base_url . "\";\n" // http://192.168.56.10/suomen-linnut/

            ?>
        </script>
        <script src="js/main.js"></script>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>



        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <?php include_once "../../googleanalytics.php"; ?>

    </body>
</html>
