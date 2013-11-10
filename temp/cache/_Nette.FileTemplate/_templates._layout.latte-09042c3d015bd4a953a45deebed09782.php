<?php //netteCache[01]000397a:2:{s:4:"time";s:21:"0.49763100 1384102002";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:75:"/home/vagrant/src/personal/besir.cz/app/FrontModule/templates/@layout.latte";i:2;i:1384101328;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"b7f6732 released on 2013-01-01";}}}?><?php

// source file: /home/vagrant/src/personal/besir.cz/app/FrontModule/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, '3ux913du2f')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbb22ade627d_title')) { function _lbb22ade627d_title($_l, $_args) { extract($_args)
;echo Nette\Templating\Helpers::escapeHtml($projectName, ENT_NOQUOTES) ;
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb318527c202_head')) { function _lb318527c202_head($_l, $_args) { extract($_args)
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lbc6ee4c4024_scripts')) { function _lbc6ee4c4024_scripts($_l, $_args) { extract($_args)
?>        <script src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.js"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/netteForms.js"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/nette.ajax.js"></script>
        <script src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/main.js"></script>

        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.queryloader2.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.appear.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.slabtext.min.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.fittext.js"></script>

        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.sticky.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/selectnav.min.js"></script>

        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/SmoothScroll.js"></script>   
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/isotope.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/bootstrap-modal.js"></script>
        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/shortcodes.js"></script>

        <script type="text/javascript" src="<?php echo htmlSpecialChars($basePath) ?>/Front/js/scripts.js"></script>

        <script src="https://api.twitter.com/1/statuses/user_timeline/envato.json?callback=twitterCall&amp;count=4"></script>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html lang="cs">
<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Chcete moderní svěží a hlavně funkční webové stránky? Tak jste na správné adrese!" />
  <meta name="keywords" content="webové aplikace, webové stránky, nette, CasperJS, css , html 5, jquery, ajax, analýza, optimalizace" />
  <meta name="author" content="Petr Besir Horáček" />
<?php if (isset($robots)): ?>  <meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>

  <title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->striptags(ob_get_clean())  ?></title>

  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/reset.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/skeleton.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/style.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/social.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/flexslider.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/prettyPhoto.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/shortcodes.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/media.css" />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/font-awesome.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/font-bebasneue.css" type="text/css" />

  <link rel="shortcut icon" href="<?php echo htmlSpecialChars($basePath) ?>/Front/favicon.ico" />

  <link rel="stylesheet" id="layout_color" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/light.css" type="text/css" />
  <link rel="stylesheet" id="primary_color_scheme" href="<?php echo htmlSpecialChars($basePath) ?>/Front/css/colors/red.css" type="text/css" />

    <?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

</head>

<body class="onepage">
  <div id="load"></div>

    <div class="page-wrap">
        <div id="home" class="home-parallax">
      <div class="home-text-wrapper">
          <div class="home-logo-text">
            <a href="#home">Petr Horáček</a>
          </div>
           <div id="home-slider" class="flexslider">
              <ul class="slides styled-list">
                <li class="home-slide"><p class="home-slide-content">php<span class="highlight">programátor</span></p></li>
                <li class="home-slide"><p class="home-slide-content">casperjs<span class="highlight">tester</span></p></li>
                <li class="home-slide"><p class="home-slide-content"><span class="highlight">RedBull</span>maniak</p></li>
              </ul>
           </div>
        </div>
     </div>

        <nav class="light">
            <div class="container clearfix">
          <div class="four columns">
                            <div class="logo large">
               <a href="#home"><img src="/Front/images/logo.png" title="Petr Besir Horáček" alt="Logo" /></a>
              </div>
                        </div>

          <div class="twelve columns">
                            <ul class="main-menu large" id="nav">
                  <li><a href="#home">Home</a></li>
                  <li><a href="#about">O mně</a></li>
                                                                                                            <li><a href="#contact">Kontakt</a></li>
              </ul>
                        </div>
      </div>
    </nav>
            <div id="about" class="page">

      <div class="container">
        <div class="row">
          <div class="sixteen columns">
                        <div class="title">
              <h1>O mně</h1>
              <div class="subtitle">
                <p>Velmi rád Vám pomohu při <span class="highlight">návrhu</span> a <span class="highlight">realizaci</span>, nebo <span class="highlight">optimalizaci</span> Vašeho projektu.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="fullwidth grey">
        <div class="container">
          <div class="fancy-header2">
            <h2>Co dostanete?</h2>
            <h2 class="highlight">Výkoné a moderní webové stránky, které vypadají fantasticky!</h2>
          </div>

          <div class="row">
            <div class="one-third column">
              <div class="service-features">
                <div class="img-container">
                  <img src="<?php echo htmlSpecialChars($basePath) ?>/Front/images/icons/icons/paperplane.png" alt="Inovace" />
                </div>  
                <h3>Inovace</h3>
                <p>Mé projekty jsou založeny na moderním, rychlém a bezpečném frameworku Nette.</p>
              </div>
            </div>

            <div class="one-third column">
              <div class="service-features">
                <div class="img-container">
                  <img src="<?php echo htmlSpecialChars($basePath) ?>/Front/images/icons/icons/lab.png" alt="Experimenty" />
                </div>
                <h3>Experimenty</h3>
                <p>....</p>
              </div>
            </div>

            <div class="one-third column">
              <div class="service-features">
                <div class="img-container">
                  <img src="<?php echo htmlSpecialChars($basePath) ?>/Front/images/icons/icons/like.png" alt="Testování" />
                </div>
                <h3>Testování</h3>
                <p>Potřebujete aplikaci bez výpadků? Není nic lepšího, než použít funkční testy např. v CasperJS.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
           <div class="sixteen columns">
             <h2>V číslech...</h2>
           </div>

           <div class="four columns">
             <div class="milestone-counter" data-perc="458">
               <span class="milestone-count highlight"></span>
               <h3 class="milestone-details">Vypitých RedBullů</h3>
             </div>
           </div>

           <div class="four columns">
             <div class="milestone-counter" data-perc="27">
               <span class="milestone-count highlight"></span>
               <h3 class="milestone-details">Klientů</h3>
             </div>
           </div>

           <div class="four columns">
             <div class="milestone-counter" data-perc="53">
               <span class="milestone-count highlight"></span>
               <h3 class="milestone-details">Hotových projektů</h3>
             </div>
           </div>

           <div class="four columns">
             <div class="milestone-counter" data-perc="0">
               <span class="milestone-count highlight"></span>
               <h3 class="milestone-details">článků</h3>
             </div>
           </div>
         </div>
      </div>
    </div>
        	
    <div id="parallax1" class="parallax">
      <div class="bg1 parallax-bg"></div>
      <div class="overlay"></div>
      <div class="container clearfix">
        <div class="parallax-content">
          <p class="quote"><span class="icon-quote-left"></span>Design není jen to, jak daná věc vypadá, ale taky, jak funguje.<span class="icon-quote-right"></span></p>
          <div class="quote-author highlight">-- Steve Jobs --</div>
        </div>
      </div>
    </div>

    <div id="team" class="page">
      <div class="container clearfix">
        <div class="sixteen columns">
          <h3>Několik mých klientů se kterými jsem spolupracoval</h3>
          <div class="client-logos">
            <a href="#" title="Ulož.to" class="clients"><img src="<?php echo htmlSpecialChars($basePath) ?>/Front/images/clients/ulozto.png" alt="Uloz.to" /></a>
            <a href="#" title="Social Bakers" class="clients"><img src="<?php echo htmlSpecialChars($basePath) ?>/Front/images/clients/socialbakers.png" alt="Social Bakers" /></a>
            <a href="#" title="Effectix.com s.r.o." class="clients"><img src="<?php echo htmlSpecialChars($basePath) ?>/Front/images/clients/effectix.png" alt="Effectix.com s.r.o." /></a>
          </div><!-- END CLIENTS LIST --> 
          <p></p>
        </div><!-- END SIXTEEN COLUMNS --> 
      </div>                
    </div>
    <!-- END TEAM SECTION --> 

    <!-- START CONTACT SECTION -->
    <div id="contact" class="page">
      <div class="container">	
        <div class="row">	
          <div class="sixteen columns">
            <!-- START TITLE -->
            <div class="title">
            <h2>Kontaktujte mně</h2>
              <div class="subtitle">
              <p>Opravdu rád bych s vámi spolupracoval na vašem projektu. Napište mi email a ozvu se vám hned jak jen to bude možné.</p>
              </div><!-- END SUBTITLE -->
            </div><!-- END TITLE -->
          </div><!-- END SIXTEEN COLUMNS -->
        </div><!-- END ROW -->
      </div><!-- END CONTAINER --> 

            <div class="copyright">
        <div class="container clearfix">
          <div class="sixteen columns">
            <div class="social-icons">
              <div class="social-icon social-email">
                <a href="mailto:sirbesir@gmail.com" target="_blank" data-original-title="Email">Email</a>
              </div>
              <div class="social-icon social-behance">
                <a href="http://www.behance.net/besir" target="_blank" data-original-title="Behance">Behance</a>
              </div>
              <div class="social-icon social-linkedin">
                <a href="http://cz.linkedin.com/pub/petr-hor%C3%A1%C4%8Dek/3a/b64/50a/" target="_blank" data-original-title="Facebook">Linkedin</a>
              </div>
              <div class="social-icon social-facebook">
                <a href="https://www.facebook.com/webdesign.horacek" target="_blank" data-original-title="Facebook">Facebook</a>
              </div>
              <div class="social-icon social-twitter">
                <a href="https://twitter.com/sirBesir" target="_blank" data-original-title="Flickr">Twitter</a>
              </div>
              <div class="social-icon social-pinterest">
                <a href="http://pinterest.com/besir/" target="_blank" data-original-title="Forrst">Pinterest</a>
              </div>
            </div>
            <p>&copy; 2013 Všechna práva vyhrazena.</p>
          </div> 
        </div>
      </div>
    </div>
  </div>
        <script> document.body.className+=' js' </script>
<?php $iterations = 0; foreach ($flashes as $flash): ?>        <div class="flash <?php echo htmlSpecialChars($flash->type) ?>
"><?php echo Nette\Templating\Helpers::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; endforeach ?>

<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>

<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
</body>
</html>