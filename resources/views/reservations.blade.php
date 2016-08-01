<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="_token" content="{{ csrf_token() }}" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700' rel='stylesheet' type='text/css'>
      <title>Boka banan | Högelids Tennisklubb</title>

      <link rel="stylesheet" href="css/main.css">
      <script src="https://use.fontawesome.com/5cafce8111.js"></script>
    </head>
    <body>
      <div class="bildbox">
        <img src="img/htk-logo.svg" alt="" class="logotype">
      </div>

      <p class="intro-text">Välkommen till Högelids Tennisklubb! Här kan du som är medlem boka speltid på vår grusbana och se andra medlemmars bokade tider.</p>

      <a href="#" class="button">Boka speltid</a>

      @if($futureResesrvations->count())
      <div class="bokade-tider">
        <h4>Bokade tider 2016</h4>
        <div class="hr"></div>
        @foreach($futureResesrvations as $reservation)
          <div class="bokad-tid">
            <p>
              {{ $reservation->start->format('Y-m-d H:i') }}
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
              {{ $reservation->start->format('Y-m-d H:i') }}
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
      <!-- Modal -->

      <div class="modal">
        <i class="close-btn fa fa-times"></i>
        <p>Fyll i uppgifterna nedan för att boka speltid.
           En bokning avser två timmar speltid.
           Avboka speltiden vid förhinder. Detta görs på startsidan genom att trycka på soptunnan.
         </p>

           <form action="">
            <input type="text" name="date" placeholder="När vill du spela?" required>
            <p class="input-beskrivning">Tillexempel: 31 juli 12:00</p>
            <br>
            <input type="text" name="name" placeholder="Skriv ditt namn">
            <input type="submit" value="Boka speltid" class="modal-button">
           </form>

      </div>

      <script src="js/jquery-2.2.4.min.js"></script>
      <script src="js/functions.js"></script>
    </body>
</html>
