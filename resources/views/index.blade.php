<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="_token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700' rel='stylesheet' type='text/css'>
  <title>Boka banan | Högelids Tennisklubb</title>

  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/timedropper.css" type="text/css">
  <link rel="stylesheet" href="css/datedropper.css" type="text/css">

  <script src="https://use.fontawesome.com/5cafce8111.js"></script>
</head>
<style>
  .error{
    border-color: red;
  }
</style>
<body>
  <div class="bildbox">
    <img src="img/htk-logo.svg" alt="" class="logotype">
  </div>

  <p class="intro-text">Välkommen till Högelids Tennisklubb! Här kan du som är medlem boka speltid på vår grusbana och se andra medlemmars bokade tider.</p>

  <a href="#" class="cta-button">Boka speltid</a>

  <!-- Modal -->
  <div class="reservation-modal">
    <i class="close-btn fa fa-times"></i>
    <p>Fyll i uppgifterna nedan för att boka speltid.
      En bokning avser två timmar speltid.
      Avboka speltiden vid förhinder. Detta görs på startsidan genom att trycka på soptunnan.
    </p>

    @if ( $errors->any() )
    <div style="background: red; width: 100%; margin: 15px 0;">
      @foreach ($errors->all() as $error)
      {{$error}}<br>
      @endforeach
    </div>
    @endif

    <form action="{{ route('reservation.store') }}" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input
        type="text"
        id="date"
        name="start_date"
        class="{{ $errors->has('start_date') ? 'error' : '' }}"
        placeholder="När vill du spela?"
      >
      <br>
      <input
        type="text"
        id="start"
        name="start_time"
        class="{{ $errors->has('start_time') ? 'error' : '' }}"
        value="{{ defaultStartTime() }}"
        placeholder="Vilken tid vill du spela?"
      >
      <br>
      <input
        type="text"
        id="stop"
        name="stop_time"
        class="{{ $errors->has('stop_time') ? 'error' : '' }}"
        value="{{ defaultStopTime() }}"
        placeholder="Vilken tid tänkte du sluta spela?"
      >
      <br>
      <input
        type="text"
        name="name"
        class="{{ $errors->has('name') ? 'error' : '' }}"
        placeholder="Skriv ditt namn"
      >
      <br>
      <input type="submit" value="Bekräfta bokning" class="submit-button">
    </form>
  </div>

  @if($futureResesrvations->count())
    <div class="bokade-tider">
      <h4>Bokade tider 2016</h4>
      <div class="hr"></div>
      @foreach($futureResesrvations as $reservation)
        <div class="bokad-tid">
          <p>
            {{ $reservation->start->formatLocalized('%e %b %H:%M') }}
            -
            {{ $reservation->stop->format('H:i') }}
            <strong>{{ $reservation->name }}</strong>
            <a href="{{ route('reservation.softDelete', ['id' => $reservation->id]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </p>
        </div>
        <div class="hr2"></div>
      @endforeach
    </div>
  @else
    <div class="bokade-tider">
      <h4>Bokade tider 2016</h4>
      <h5>Det finns inga bokade tider</h5>
    </div>
  @endif
  @if($oldResesrvations->count())
    <div class="bokade-tider">
      <h4>Historik: </h4>
      <div class="hr"></div>
      @foreach($oldResesrvations as $reservation)
        <div class="bokad-tid">
          <p>
            {{ $reservation->start->diffForHumans() }}
            {{ $reservation->start->format('H:i') }}
            -
            {{ $reservation->stop->format('H:i') }}
            <strong>{{ $reservation->name }}</strong>
            <a href="{{ route('reservation.softDelete', ['id' => $reservation->id]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
          </p>
        </div>
        <div class="hr2"></div>
      @endforeach
    </div>
  @else
    <div class="bokade-tider">
      <h4>Historik</h4>
      <h5>Det finns inga bokade tider i historiken</h5>
    </div>
  @endif

  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/functions.js"></script>
  <script src="js/datedropper.js"></script>
  <script src="js/timedropper.js"></script>
  <script>
    $( "#date" ).dateDropper({lang: 'sv', format: 'Y-m-d'});
    $( "#start" ).timeDropper({lang: 'sv', format: 'H:m', minutesInterval: 5});
    $( "#stop" ).timeDropper({lang: 'sv', format: 'H:m', minutesInterval: 5});
  </script>
</body>
</html>
