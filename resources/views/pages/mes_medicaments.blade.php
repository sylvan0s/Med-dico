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
                <h4>Mes medicaments</h4>
                @foreach ($medicaments as $medicament)
                    <li>
                        <a href='medicaments/fiche/{{ $medicament->id }}'>{{ $medicament->name }}</a>
                        <a href='medicaments/update/{{ $medicament->id }}' class="cta-submit">Modifier</a>
                        <a href='medicaments/delete/{{ $medicament->id }}' class="cta-submit">Supprimer</a>
                        </br>
                        </br>
                        </br>
                    </li>
                @endforeach
                <br/>
                <br/>
                <a href='medicaments/add' class="cta-submit">Rajouter un medicament</a>
            </div>
        </section>

        <footer id="website-footer">
            @include('includes.footer')
        </footer>

    </body>
</html>
