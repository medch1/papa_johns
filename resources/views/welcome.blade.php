@extends('layouts.layout')
@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Tableau de bord</a>
            @else
                <a href="{{ route('login') }}">Connexion</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">S'inscrire</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <img src="/img/logo.png" alt="Papa John's logo">
        <div class="title m-b-md">
            Manger devient un plaisir
        </div>
        <p class="mssg" > {{session('mssg')}}  {{session('prix')}} {{session('euro')}}</p>
        <a href="{{route('pizzas.create')}}">Commander une Pizza</a>
    </div>
</div>
@endsection
