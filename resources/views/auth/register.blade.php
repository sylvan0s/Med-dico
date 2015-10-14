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

<section id="section-inscription">
    <div class="valign">

        <div class="inner">
            <div class="form-inscription">
                <h2>S'inscrire</h2>
                <!-- <script>
                    window.fbAsyncInit = function() {
                        FB.init({
                            appId      : '1721609828058577', // Set YOUR APP ID
                            status     : true, // check login status
                            cookie     : true, // enable cookies to allow the server to access the session
                            xfbml      : true  // parse XFBML
                        });

                        FB.Event.subscribe('auth.authResponseChange', function(response)
                        {
                            if (response.status === 'connected')
                            {
                                console.log('Connected to Facebook');
                            }
                            else if (response.status === 'not_authorized')
                            {
                                console.log('Failed to Connect');
                                //FAILED
                            } else
                            {
                                console.log('Logged Out');
                                //UNKNOWN ERROR
                            }
                        });

                    };

                    function Login()
                    {

                        FB.login(function(response) {
                            if (response.authResponse)
                            {
                                getUserInfo();
                            } else
                            {
                                console.log('User cancelled login or did not fully authorize.');
                            }
                        },{scope: 'email'});

                    }

                    function getUserInfo() {
                        FB.api('/me?fields=name,email,first_name,last_name,gender', function(response) {
                            console.log(response);
                            //document.getElementById("status").innerHTML;
                            document.getElementById('email').value = response.email;
                            document.getElementById('firstname').value = response.first_name;
                            document.getElementById('lastname').value = response.last_name;
                            if (response.gender == 'male') {
                                $('#M').attr('checked', 'checked');
                            }
                            if (response.gender == 'female') {
                                $('#Mme').attr('checked', 'checked');
                            }
                        });
                    }

                    function Logout()
                    {
                        FB.logout(function(){document.location.reload();});
                    }

                    // Load the SDK asynchronously
                    (function(d){
                        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
                        if (d.getElementById(id)) {return;}
                        js = d.createElement('script'); js.id = id; js.async = true;
                        js.src = "//connect.facebook.net/fr_FR/all.js";
                        ref.parentNode.insertBefore(js, ref);
                    }(document));

                </script> -->
                <!-- <a id="fb_connect" href="#" onclick="Login()"><img src="assets/img/single/fb_connect.png" class="fb-connect-img" /></a> -->
                <form action="/auth/register" method="post" id="formulaire-inscription">
                    {!! csrf_field() !!}
                    <div class="form-el">
                        <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" placeholder="Nom" required />
                    </div>
                    <div class="form-el">
                        <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" placeholder="Prénom" required />

                    </div>
                    <div class="form-el">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required />
                    </div>
                    <div class="form-el">
                        <input type="text" name="pseudo" id="pseudo" value="{{ old('pseudo') }}" placeholder="Pseudo" required />
                    </div>
                    <div class="form-el">
                        <input type="password" name="password" id="password" value="" placeholder="Mot de passe" maxlength="24" required />
                        <span class="msg-pwd">Le mot de passe doit être compris entre 8 et 24 caractères.</span>
                        <input type="password" name="password_confirmation" placeholder="confirmer le mot de passe" required>
                    </div>
                    <div class="form-el">
                        <input type="submit" name="inscription" id="inscription" value="S'inscrire" />
                    </div>
                </form>
            </div>

        </div>
</section>

<footer id="website-footer">
    @include('includes.footer')
</footer>
</body>
</html>
