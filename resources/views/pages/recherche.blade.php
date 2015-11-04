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

<section id="section-recherche">
    <div class="inner">
        <form action="recherche" method="post" id="formulaire-recherche">
            {!! csrf_field() !!}
            <div class="form-el">
                <h4>Recherche par mot</h4>
                <input type="text" name="search" /><!--
              --><button type="submit" class="cta-search"><i class="fa fa-search"></i></button>
            </div>
            <div class="form-el">
                <h4>Recherche par lettre</h4>
                <ul>
                    <li><input type="submit" name='submit' value="A"></li>
                    <li><input type="submit" name='submit' value="B"></li>
                    <li><input type="submit" name='submit' value="C"></li>
                    <li><input type="submit" name='submit' value="D"></li>
                    <li><input type="submit" name='submit' value="E"></li>
                    <li><input type="submit" name='submit' value="F"></li>
                    <li><input type="submit" name='submit' value="G"></li>
                    <li><input type="submit" name='submit' value="H"></li>
                    <li><input type="submit" name='submit' value="I"></li>
                    <li><input type="submit" name='submit' value="J"></li>
                    <li><input type="submit" name='submit' value="K"></li>
                    <li><input type="submit" name='submit' value="L"></li>
                    <li><input type="submit" name='submit' value="M"></li>
                    <li><input type="submit" name='submit' value="N"></li>
                    <li><input type="submit" name='submit' value="O"></li>
                    <li><input type="submit" name='submit' value="P"></li>
                    <li><input type="submit" name='submit' value="Q"></li>
                    <li><input type="submit" name='submit' value="R"></li>
                    <li><input type="submit" name='submit' value="S"></li>
                    <li><input type="submit" name='submit' value="T"></li>
                    <li><input type="submit" name='submit' value="U"></li>
                    <li><input type="submit" name='submit' value="V"></li>
                    <li><input type="submit" name='submit' value="W"></li>
                    <li><input type="submit" name='submit' value="X"></li>
                    <li><input type="submit" name='submit' value="Y"></li>
                    <li><input type="submit" name='submit' value="Z"></li>
                </ul>
            </div>

            <a href="#"><i class="fa fa-chevron-right"></i> <span>Recherche avancée</span></a>
        </form>

        <div id="recherche-en-cours">
            <p><img src="assets/img/single/ring.svg" alt="Loader"> <span>Recherche en cours...</span></p>
        </div>
    </div>
</section>

<section>
    <div class="inner">

       <!-- <div class="result">
            <a href="#">Médicament XXX</a><br />
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus eligendi magnam exercitationem.</p>
        </div>
        <div class="result">
            <a href="#">Médicament XXX</a><br />
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus eligendi magnam exercitationem.</p>
        </div>
        <div class="result">
            <a href="#">Médicament XXX</a><br />
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus eligendi magnam exercitationem.</p>
        </div>
        <div class="result">
            <a href="#">Médicament XXX</a><br />
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus eligendi magnam exercitationem.</p>
        </div> -->
        @if (isset($results))
            @if ($word != "")
                <h5>{{$count}} résultats pour la recherche "{{$word}}" :</h5>
            @endif
                @if ($begin != "")
                    <h5>{{$count}} résultats pour la recherche commençant par la lettre "{{$begin}}" :</h5>
                @endif
            @foreach ($results as $result)
                <li> <a href='medicaments/fiche/{{ $result->id }}'>{{$result->name}}</a></li>
            @endforeach
        @endif
    </div>
</section>

<footer id="website-footer">
    @include('includes.footer')
</footer>

</body>
</html>
