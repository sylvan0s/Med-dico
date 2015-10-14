<!doctype html>
<!--[if lte IE 7]> <html class="ie7" lang="fr"> <![endif]-->
<!--[if IE 8]> <html class="ie8" lang="fr"> <![endif]-->
<!--[if IE 9]> <html class="ie9" lang="fr"> <![endif]-->
<html lang="fr">
<head>
    @include('includes.head')
</head>

<body>
<a href="#" class="header-controls menu"><i class="fa fa-bars"></i></a>
<a href="#" class="header-controls close"><i class="fa fa-times"></i></a>

<header id="header-landing">
    @include('includes.header-vitrine')
</header>

<section id="section-bienvenue">
    <div class="valign">
        <div class="inner">
            <div class="left"></div><!--
            --><div class="right">
                <p>La <span class="bold">meilleure base de données</span> de médicament !</p>
                <ul>
                    <li><a href="#section-a-propos" class="anchor"><button class="cta">En savoir plus</button></a></li><!--
                --><li><a href="#section-download" class="anchor"><button class="cta">Téléchargez</button></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="section-a-propos">
    <div class="inner">
        <div class="titles">
            <h1>À propos de nous</h1>
            <h3>Med'dico, késako ?</h3>
        </div>

        <ul>
            <li>
                <div class="about-icon">
                    <i class="fa fa-medkit"></i>
                    <h2>La référence pharmaceutique</h2>
                </div>
                <div class="about-text">
                    <p>Avec nos XXX médicaments enregistrés, Med'dico est LA référence !</p>
                </div>
            </li><!--
            --><li>
                <div class="about-icon">
                    <i class="fa fa-tablet"></i>
                    <h2>Multi-plateforme</h2>
                </div>
                <div class="about-text">
                    <p>Que vous soyez sur smartphone, tablette ou ordinateur, Med'dico est toujours accessible !</p>
                </div>
            </li><!--
            --><li>
                <div class="about-icon">
                    <i class="fa fa-users"></i>
                    <h2>Social connect</h2>
                </div>
                <div class="about-text">
                    <p>Vous avez la possibilité de vous inscrire avec votre compte Facebook !</p>
                </div>
            </li><!--
            --><li>
                <div class="about-icon">
                    <i class="fa fa-cog"></i>
                    <h2>Assistance utilisateur</h2>
                </div>
                <div class="about-text">
                    <p>Qu'importe votre soucis, notre équipe s'engage à vous répondre le plus rapidement possible.</p>
                </div>
            </li>
        </ul>
    </div>
</section>

<section id="section-screenshots">
    <div class="inner">
        <div class="titles">
            <h1>Screenshots</h1>
            <h3>Ayez un aperçu de l'application</h3>
        </div>

        <div id="slider">
            <div>Slide 1</div>
            <div>Slide 2</div>
            <div>Slide 3</div>
            <div>Slide 4</div>
        </div>

        <a href="#" class="screen-chevron chevron-left"><i class="fa fa-chevron-circle-left"></i></a>
        <a href="#" class="screen-chevron chevron-right"><i class="fa fa-chevron-circle-right"></i></a>
    </div>
</section>

<section id="section-demo">
    <div class="inner">
        <div class="titles">
            <h1>Démo</h1>
            <h3>Découvrez plus de détails</h3>
        </div>

        <div class="container-video">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen rel="0"></iframe>
        </div>
    </div>
</section>

<section id="section-download">
    <div class="inner">
        <div class="titles">
            <h1>Téléchargez</h1>
            <h3>Choisissez votre plateforme et c'est parti !</h3>
        </div>

        <div class="downloads">
            <ul>
                <li><a href="#" target="_blank"><button class="cta"><i class="fa fa-apple"></i> <span>Téléchargez pour<br />Apple iOS</span></button></a></li><!--
              --><li><a href="#" target="_blank"><button class="cta"><i class="fa fa-android"></i> <span>Téléchargez pour<br />Android</span></button></a></li>
            </ul>
        </div>
    </div>
</section>

<section id="section-contact">
    <div class="inner">
        <div class="titles">
            <h1>Contact</h1>
            <h3>Pour plus d'infos ou support, <br />contactez-nous !</h3>
        </div>

        <div class="left">
            <form action="#" method="post" id="formulaire-contact">
                <div class="form-el">
                    <input type="text" name="name" id="name" placeholder="Votre nom" value="" required />
                </div>
                <div class="form-el">
                    <input type="email" name="email" id="email" placeholder="Votre email" value="" required />
                </div>
                <div class="form-el">
                    <textarea name="message" id="message" placeholder="Votre message" rows="8" cols="40" required /></textarea>
                </div>
                <div class="form-el">
                    <input type="submit" name="envoyer" id="envoyer" value="Envoyer" class="cta" />
                </div>
            </form>
        </div><!--
          --><div class="right">
            <ul>
                <li>
                    <i class="fa fa-map-marker"></i><!--
                --><p>
                        9 rue Maurice Grandcoing<br />
                        94200 Ivry-Sur-Seine
                    </p>
                </li>
                <li>
                    <i class="fa fa-envelope-o"></i><!--
                --><p><a href="mailto:contact@meddico.fr">contact@meddico.fr</a></p>
                </li>
            </ul>
        </div>
    </div>
</section>

<footer id="landing-footer">
    @include('includes.footer-vitrine')
</footer>

<script src="assets/js/vendor/jquery-1.7.2.min.js"></script>
<script src="assets/js/vendor/modernizr-2.5.3.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/libs/slick.min.js"></script>
<script src="assets/js/libs/response.min.js"></script>
<script src="assets/js/libs/jquery.validate.min.js"></script>
<script src="assets/js/libs/additional-methods.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
