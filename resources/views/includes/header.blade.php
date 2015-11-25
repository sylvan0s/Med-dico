<div class="inner">
    <div id="logo">&nbsp;</div><!--

          --><nav>
        <ul>
            <li><a href="/home">Home</a></li><!--
              --><li><a href="/recherche">Rechercher un médicament</a></li><!--
                @if (Auth::check())
                    --><li><a href="/auth/logout">Se déconnecter</a></li><!--
                    --><li><a href="/admin">Mes medicaments</a></li><!--
                @else
                    --><li><a href="/auth/register">S'inscrire</a></li><!--
                    --><li><a href="/auth/login">Se connecter</a></li><!--
                @endif
              --><li><a href="/contact">Contact</a></li>
        </ul>
    </nav>
</div>