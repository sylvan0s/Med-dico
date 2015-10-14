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

<section id="section-connexion">
    <div class="valign">
        <div class="inner">
            <div class="form-connexion">
                <h2>Se connecter</h2>
                <form action="/auth/login" method="post" id="formulaire-connexion">
                    {!! csrf_field() !!}
                    <div class="form-el">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                    <div class="form-el">
                        <input type="password" name="password" id="password" placeholder="Mot de passe" required />
                    </div>
                    <div>
                        <input type="checkbox" name="remember"> Remember Me
                    </div>
                    <div class="form-el">
                        <input type="submit" name="connexion" id="connexion" value="Se connecter" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer id="website-footer">
    @include('includes.footer')
</footer>


</body>
</html>
