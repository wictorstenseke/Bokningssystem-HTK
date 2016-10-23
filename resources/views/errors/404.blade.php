<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Boka banan | Högelids Tennisklubb</title>

      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
      <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
      <link rel="manifest" href="/manifest.json">
      <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
      <meta name="theme-color" content="#ffffff">

      <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700' rel='stylesheet' type='text/css'>

      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
      </head>
    <body>
      <div class="bildbox">
        <a href="{{ action('ReservationController@index') }}">
          <img src="{{ asset('img/htk-logo.svg') }}" class="logotype">
        </a>
      </div>
      <h3>Oops!</h3>
      <p class="intro-text">Något verkar ha gå snett. Klicka på knappen nedan för att komma tillbaka startsidan.</p>
      <a href="{{ action('ReservationController@index') }}" class="button" style="margin-bottom: 30px;">Till startsidan</a>

      <div class="footer">
        <a href="https://github.com/wictorstenseke/bokningssystem-HTK" target="_blank"><i class="fa fa-github"></i></a>
        |
        <script type="text/javascript" language="javascript">
        <!--
        // Email obfuscator script 2.1 by Tim Williams, University of Arizona
        // Random encryption key feature by Andrew Moulden, Site Engineering Ltd
        // This code is freeware provided these four comment lines remain intact
        // A wizard to generate this code is at http://www.jottings.com/obfuscator/
        { coded = "T3dHA7.NAPs4ccA4@8ps3o.dAp"
          key = "l9un0wvOcYjS8Vp167aqhMHDkioBe4xTJWd2NRXyQKZ5sbPLgIm3ArCEGUtfFz"
          shift=coded.length
          link=""
          for (i=0; i<coded.length; i++) {
            if (key.indexOf(coded.charAt(i))==-1) {
              ltr = coded.charAt(i)
              link += (ltr)
            }
            else {
              ltr = (key.indexOf(coded.charAt(i))-shift+key.length) % key.length
              link += (key.charAt(ltr))
            }
          }
        document.write("<a href='mailto:"+link+"'>Wictor Stenseke</a>")
        }
        //-->
        </script><noscript>Sorry, you need Javascript on to email me.</noscript>
        |
        <script type="text/javascript" language="javascript">
        <!--
        // Email obfuscator script 2.1 by Tim Williams, University of Arizona
        // Random encryption key feature by Andrew Moulden, Site Engineering Ltd
        // This code is freeware provided these four comment lines remain intact
        // A wizard to generate this code is at http://www.jottings.com/obfuscator/
        { coded = "XAgB61tA.61ldWA@SB1dA.ZgB"
          key = "BS3RQ7YieshzrobxUyVAM4DLq5HP8aCndWctpmgXwT9Iu0K2JjNvOf1Fl6GZEk"
          shift=coded.length
          link=""
          for (i=0; i<coded.length; i++) {
            if (key.indexOf(coded.charAt(i))==-1) {
              ltr = coded.charAt(i)
              link += (ltr)
            }
            else {
              ltr = (key.indexOf(coded.charAt(i))-shift+key.length) % key.length
              link += (key.charAt(ltr))
            }
          }
        document.write("<a href='mailto:"+link+"'>Daniel Blomdahl</a>")
        }
        //-->
        </script><noscript>Sorry, you need Javascript on to email me.</noscript>

      </div>
    </body>
</html>
