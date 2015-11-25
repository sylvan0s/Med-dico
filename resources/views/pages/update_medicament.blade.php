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

        <section id="section-ajout-medicament">

            <div class="inner">
                <h2>Modifier un médicament</h2>
                @foreach ($medicament as $medoc)
                <form action='/medicaments/update/{{ $medoc->id }}' method="post" id="formulaire-ajout-medicament">
                    {!! csrf_field() !!}
                    <div class="line1">
                        <div class="form-el">
                            <input type="text" name="name" id="nom_medicament" placeholder="Nom du médicament" value='{{ $medoc->name }}' required />
                        </div><!--

                      --><div class="form-el choix-ordonnance">
                            <p>Avec ordonnance ?</p>
                            @if ($medoc->ordonnance == false )
                                <input type="radio" name="ordonnance" id="oui_ordonnance" value="y" />
                                <label for="oui_ordonnance">Oui</label>
                                <input type="radio" name="ordonnance" id="non_ordonnance" value="n" checked />
                                <label for="non_ordonnance">Non</label>
                            @else
                                <input type="radio" name="ordonnance" id="oui_ordonnance" value="y" checked />
                                <label for="oui_ordonnance">Oui</label>
                                <input type="radio" name="ordonnance" id="non_ordonnance" value="n" />
                                <label for="non_ordonnance">Non</label>
                            @endif
                        </div>
                    </div>

                    <div class="line2">
                        <div class="form-el">
                            <textarea name="description" id="description_medicament" placeholder="Description du medicament" rows="8" cols="40" required>{{ $medoc->description }}</textarea>
                        </div>
                    </div>


                    <div class="form-el">
                        <button type="submit" class="cta-add-medicament">Mise à jour</button>
                    </div>

                </form>
                @endforeach
            </div>

        </section>

        <footer id="website-footer">
            @include('includes.footer')
        </footer>

    </body>
</html>
