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
                <h2>Ajouter un médicament</h2>
                <form action="/medicaments/new" method="post" id="formulaire-ajout-medicament">
                    {!! csrf_field() !!}
                    <div class="line1">
                        <div class="form-el">
                            <input type="text" name="name" id="nom_medicament" placeholder="Nom du médicament" required />
                        </div><!--

                      --><div class="form-el choix-ordonnance">
                            <p>Avec ordonnance ?</p>
                            <input type="radio" name="ordonnance" id="oui_ordonnance" value="y" />
                            <label for="oui_ordonnance">Oui</label>
                            <input type="radio" name="ordonnance" id="non_ordonnance" value="n" checked />
                            <label for="non_ordonnance">Non</label>
                        </div>
                    </div>

                    <div class="line2">
                        <div class="form-el">
                            <textarea name="description" id="description_medicament" placeholder="Description du medicament" rows="8" cols="40" required></textarea>
                        </div>
                    </div>

                    <div class="line3">
                        <h4>Mots-clés :</h4>
                        <div class="form-el">
                            <div class="cell">
                                <input type="checkbox" name="keyword1" id="keyword1" value="keyword1" />
                                <label for="keyword1">Keyword 1</label>
                            </div><!--
                        --><div class="cell">
                                <input type="checkbox" name="keyword2" id="keyword2" value="keyword2" />
                                <label for="keyword2">Keyword 2</label>
                            </div><!--
                        --><div class="cell">
                                <input type="checkbox" name="keyword3" id="keyword3" value="keyword3" />
                                <label for="keyword3">Keyword 3</label>
                            </div><!--
                        --><div class="cell">
                                <input type="checkbox" name="keyword4" id="keyword4" value="keyword4" />
                                <label for="keyword4">Keyword 4</label>
                            </div><!--
                        --><div class="cell">
                                <input type="checkbox" name="keyword5" id="keyword5" value="keyword5" />
                                <label for="keyword5">Keyword 5</label>
                            </div><!--
                        --><div class="cell">
                                <input type="checkbox" name="keyword6" id="keyword6" value="keyword6" />
                                <label for="keyword6">Keyword 6</label>
                            </div>
                        </div>

                        <div class="form-el">
                            <div class="cell">
                                <input type="checkbox" name="keyword7" id="keyword7" value="keyword7" />
                                <label for="keyword7">Keyword 7</label>
                            </div><!--
                        --><div class="cell">
                                <input type="checkbox" name="keyword8" id="keyword8" value="keyword8" />
                                <label for="keyword8">Keyword 8</label>
                            </div><!--
                        --><div class="cell">
                                <input type="checkbox" name="keyword9" id="keyword9" value="keyword9" />
                                <label for="keyword9">Keyword 9</label>
                            </div><!--
                        --><div class="cell">
                                <input type="checkbox" name="keyword10" id="keyword10" value="keyword10" />
                                <label for="keyword10">Keyword 10</label>
                            </div><!--
                        --><div class="cell">
                                <input type="checkbox" name="keyword11" id="keyword11" value="keyword11" />
                                <label for="keyword11">Keyword 11</label>
                            </div><!--
                        --><div class="cell">
                                <input type="checkbox" name="keyword12" id="keyword12" value="keyword12" />
                                <label for="keyword12">Keyword 12</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-el">
                        <button type="submit" class="cta-add-medicament">Ajouter</button>
                    </div>
                </form>
            </div>

        </section>

        <footer id="website-footer">
            @include('includes.footer')
        </footer>

    </body>
</html>
