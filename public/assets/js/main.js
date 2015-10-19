$(function() {

    var singlePage = {

        init: function() {
            var self = this;

            self.initTriggers();
            self.initSlick();
            self.initRespond();
            self.initFixIE();
            self.initFormValidate();
        },

        initTriggers: function() {
            var self = this;

            // Animation du scroll au clic sur une ancre
            $('#header-landing nav a, .anchor').on('click', function(e){
                e.preventDefault();
                $('html,body').animate({scrollTop: $($(this).attr("href")).offset().top}, 1000);
            });

            // Action au resize de la page
            self.initResize();
            $(window).on('resize', function() {
              self.initResize();
            });

            // Action sur le menu (mobile et tablette)
            $('.header-controls').on('click', function(e){
              e.preventDefault();
              if ( $(this).hasClass('menu') ) {
                $('.menu').css('display', 'none');
                $('.close').css('display', 'block');
              }
              if ( $(this).hasClass('close') ) {
                $('.close').css('display', 'none');
                $('.menu').css('display', 'block');
              }
              $('nav').slideToggle(1000);
            });

            // Action pour la partie screenshot
            $('.screen-chevron').on('click', function(e){
              e.preventDefault();
              ( $(this).hasClass('chevron-left') ) ? $('.slick-prev').click() : '';
              ( $(this).hasClass('chevron-right') ) ? $('.slick-next').click() : '';
            });

            // PARTIE RECHERCHE
            // --> Gérer en ajax au submit
            $('#recherche-en-cours, #section-resultats').hide();
            $('#section-recherche .cta-search, #section-recherche li a').on('click', function(e){
              e.preventDefault();
              $('#recherche-en-cours').show();
              setTimeout(function() {
                $('#section-resultats').show();
                $('#recherche-en-cours').hide();
              }, 3000);
            });
        },

        initSlick: function() {
            $('#slider').slick({
                dots: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 4500,
                mobileFirst: true,
                responsive: [
                  {
                    breakpoint: 1024,
                    settings: {
                      dots: false,
                      arrows: true
                    }
                  }
                ]
            });
        },

        initRespond: function() {
            Response.create({
               prop: "width",
               prefix: "src",
               "breakpoints": [0, 320, 375, 480, 768, 1024, 1280]
            });
        },

        initResize: function() {
          var width = $(window).width();
          var height = $(window).height();
          var headerHeight = $('#website-header').height();
          var footerHeight = $('#website-footer').height();
          var rechercheHeight = $('#section-recherche').height();

          /* GENERAL */
          // Cache le menu par défaut et affiche l'icone tant que le device est mobile/tablette
          ( width < 1024 ) ? $('nav').hide() : $('nav').show();
          ( width < 1024 ) ? $('.menu').show() : $('.menu').hide();


          /* INDEX */
          // Fais en sorte que la première partie soit toujours à 100% de la hauteur de l'écran
          ( width > 1024 ) ? $('#section-bienvenue').css('height', '100%') : $('#section-bienvenue').css('height', 'auto');

          // Calcule la hauteur de la vidéo en fonction de sa largeur
          var videoWidth = $('.container-video iframe').width();
          var ratio = 2.166666666666667; // 325 / 150 sur iPhone 6
          var videoHeight = videoWidth / ratio;
          $('.container-video iframe').css('height', videoHeight);


          /* INDEX */
          ( width > 1024 ) ? $('#section-last-medicaments .inner').css('min-height', height - headerHeight - footerHeight - 120) : ''; // 120 car padding du inner principal
          /* INSCRIPTION */
          ( width > 1024 ) ? $('#section-inscription .inner').css('min-height', height - headerHeight - footerHeight) : '';
          /* RECHERCHE */
          ( width > 1024 ) ? $('#section-resultats .inner').css('min-height', height - headerHeight - footerHeight - rechercheHeight + 45) : ''; // 45 car height de #recherche-en-cours
        },

        initFixIE: function() {
          // Si le navigateur ne prend pas en charge le placeholder
          if ( document.createElement('input').placeholder == undefined ) {

            // Champ avec un attribut HTML5 placeholder
            $('[placeholder]')
            // Au focus on clean si sa valeur Ã©quivaut Ã  celle du placeholder
            .focus(function() {
              if ( $(this).val() == $(this).attr('placeholder') ) {
                $(this).val(''); }
            })
            // Au blur on remet le placeholder si le champ est laissÃ© vide
            .blur(function() {
              if ( $(this).val() == '' ) {
                $(this).val( $(this).attr('placeholder') ); }
            })
            // On dÃ©clenche un blur afin d'initialiser le champ
            .blur()
            // Au submit on clean pour Ã©viter d'envoyer la valeur du placeholder
            .parents('form').submit(function() {
              $(this).find('[placeholder]').each(function() {
                if ( $(this).val() == $(this).attr('placeholder') ) {
                  $(this).val(''); }
                });
            });
          }
        },

        initFormValidate: function() {

          $('form').each(function(){
            $(this).validate({
              errorPlacement: function (error, element) {
                return false;
              },
              rules: {
                name: {
                  required: true,
                  minlength: 3,
                  lettersonly: true
                },
                email: {
                  required: true,
                  email: true
                },
                message: {
                  required: true
                },
                lastname: {
                  required: true,
                  minlength: 3,
                  lettersonly: true
                },
                firstname: {
                  required: true,
                  minlength: 3,
                  lettersonly: true
                },
                pseudo: {
                  required: true,
                  minlength: 3
                },
                password: {
                  required: true,
                  minlength: 8,
                  maxlength: 24
                },
                medicament: {
                  required: true,
                  minlength: 3
                },
                nom_medicament: {
                  required: true,
                  minlength: 3
                },
                ordonnance: {
                  required: true
                },
                description_medicament: {
                  required: true,
                  minlength: 3
                },
                sujet: {
                  required: true,
                  minlength: 3
                }
              }
            });
          });

        }
    };

    window.singlePage = singlePage;
    singlePage.init();

});
