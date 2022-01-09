@extends('layouts.app')
@section('java-script')
    <script>
        function playaudio(){

            document.getElementById("audio").play();
        }


      //   Enable pusher logging - don't include this in production
         Pusher.logToConsole = true;

         var pusher = new Pusher('3c40cc4db6d75a66b652', {
             cluster: 'eu'
         });

         var channel = pusher.subscribe('pizza-notif');

         channel.bind('CommandNotification', function(data) {
              document.getElementById('real-time').innerHTML+="<div class='pizza-item'><img src='/img/pizza.png' alt='pizza icon'> <h4><a href='/pizzas/"+data.command.id+"'>"+data.command.nom+"</a></h4> </div>";
              if (data!=null){
                  playaudio();

              }

             console.log('data',data);
         });

    </script>
@endsection
@section('content')
    <audio muted="muted" src="https://audio-previews.elements.envatousercontent.com/files/148785970/preview.mp3?response-content-disposition=attachment%3B+filename%3D%22RZFWLXE-bell-hop-bell.mp3%22" id="audio" style="display: none"></audio>
    <h1>Les commandes</h1>
<div class="wrapper pizza-index" id="real-time">

    @foreach    ($pizzas as $pizza)
        <div class="pizza-item">
            <img src="/img/pizza.png" alt="pizza icon">
         <h4><a href="/pizzas/{{$pizza->id}}">{{$pizza->nom}}</a></h4>
        </div>
    @endforeach

</div>






@endsection

