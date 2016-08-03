<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="_token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700' rel='stylesheet' type='text/css'>
  <title>Boka banan | Högelids Tennisklubb</title>

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  <script src="https://use.fontawesome.com/5cafce8111.js"></script>
</head>
<body>
  <div class="bildbox">
    <a href="{{ action('ReservationController@index') }}">
      <img src="{{ asset('img/htk-logo.svg') }}" alt="" class="logotype">
    </a>
  </div>

  <p class="intro-text">Välkommen till Högelids Tennisklubb! Här kan du som är medlem boka speltid på vår grusbana och se andra medlemmars bokade tider.</p>

  <div class="bokade-tider">
    <h4>Bokning mottagen!</h4>
    <h1><i class="fa fa-thumbs-up"></i></h1>
    <div class="info-reservation">
      <p>Bokad av: <span class="bold-text">{{ $createdReservation->name }}</span></p>
      <div class="hr2"></div>
      <p>Bokad från: <span class="bold-text">{{ $createdReservation->start->formatLocalized('%e %b %H:%M') }}</span></p>
      <p>Bokad till: <span class="bold-text">{{ $createdReservation->stop->formatLocalized('%e %b %H:%M') }}</span></p>
      <div class="hr2"></div>
      <p class="italic">Bokades: {{ $createdReservation->created_at->diffForHumans() }}</p>
    </div>
    <a href="{{ action('ReservationController@index') }}" class="cta-button">Klar</a>
  </div>
</body>
</html>
