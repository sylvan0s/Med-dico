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

<section id="section-fiche">
    <div class="inner">
        @foreach ($medicament as $medoc)
            <div class="header-fiche">
                <h4>{{ $medoc->name }}</h4>
                <!-- <a href="#"><button class="cta-modifier">Modifier</button></a> -->
            </div>

            <div class="body-fiche">
                <p class="keywords">Mots-clés : keyword1 - keyword2</p>
                <p>{{ $medoc->description }}</p>
            </div>
        @endforeach
    </div>
</section>

<footer id="website-footer">
    @include('includes.footer')
</footer>

</body>
</html>
