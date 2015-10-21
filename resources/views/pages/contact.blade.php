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

        <header id="website-header">
            @include('includes.header')
        </header>

        <section id="section-contact-website">
            <div class="inner">
                <h4>Formulaire de contact</h4>

                <form action="#" method="post">
                    <div class="form-el">
                        <input type="text" name="lastname" id="lastname" placeholder="Votre nom" required />
                    </div>
                    <div class="form-el">
                        <input type="text" name="firstname" id="firstname" placeholder="Votre prénom" required />
                    </div>
                    <div class="form-el">
                        <input type="text" name="email" id="email" placeholder="Votre email" required />
                    </div>
                    <div class="form-el">
                        <input type="text" name="sujet" id="sujet" placeholder="Sujet du message" required />
                    </div>
                    <div class="form-el">
                        <textarea type="text" name="message" id="message" rows="8" cols="40" placeholder="Votre message" required></textarea>
                    </div>
                    <div class="form-el">
                        <button type="submit" class="cta-submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </section>

        <footer id="website-footer">
            @include('includes.footer')
        </footer>

    </body>
</html>
