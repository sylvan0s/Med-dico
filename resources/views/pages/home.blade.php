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

<section id="section-index">
    <div class="inner">
        <div class="left">
            <div id="section-last-medicaments">
                <div class="inner">
                    <h4>Les derniers médicaments</h4>

                    <ul>
                        @foreach ($medicaments as $medicament)
                            <li>1. <a href='medicaments/fiche/{{ $medicament->id }}'>{{ $medicament->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div><!--

          --><div class="right">
            <div id="section-top-contributeurs">
                <div class="inner">
                    <h4>Top contributeurs</h4>

                    <ul>
                        @foreach ($users as $user)
                            <li>1. {{$user->pseudo}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div id="section-top-medicaments">
                <div class="inner">
                    <h4>Top médicaments consultés</h4>

                    <ul>
                        <li>1. <a href="#" target="_blank">Médicament 1</a></li>
                        <li>2. <a href="#" target="_blank">Médicament 2</a></li>
                        <li>3. <a href="#" target="_blank">Médicament 3</a></li>
                        <li>4. <a href="#" target="_blank">Médicament 4</a></li>
                        <li>5. <a href="#" target="_blank">Médicament 5</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<footer id="website-footer">
    @include('includes.footer')
</footer>

</body>
</html>
