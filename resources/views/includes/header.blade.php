<div class="inner">
    <div id="logo">&nbsp;</div><!--

          --><nav>
        <ul>
            <li><a href="/home">Home</a></li><!--
              --><li><a href="recherche.html">Rechercher un médicament</a></li><!--
              --><li><a href="#">Mon compte</a></li><!--
                @if (Auth::check())
                    --><li><a href="/auth/logout">Se déconnecter</a></li><!--
                @else
                    --><li><a href="/auth/register">S'inscrire</a></li><!--
                    --><li><a href="/auth/login">Se connecter</a></li><!--
                @endif
              --><li><a href="contact">Contact</a></li>
        </ul>
    </nav>
</div>