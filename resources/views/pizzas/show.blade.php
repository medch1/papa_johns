@extends('layouts.app')
@section('content')
    <div class="wrapper pizza-details">
        <h1>Order for {{$pizza->nom}} </h1>
        <p class="type">Type - {{$pizza -> type}}</p>
        <p class="sauce">Sauce - {{$pizza -> sauce}}</p>
        <p class="supp">Extra Suppléments: </p>
        @if($pizza->supp == null)
            <p>Sans suppléments</p>
        @else
            <ul>
                @foreach( $pizza->supp as $supp )
                    <li>{{$supp}}</li>
                @endforeach
            </ul>
        @endif
        <p class="type">Prix : {{$prix}} €</p>
        <form action="{{route('pizzas.destroy',$pizza->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Finaliser la commande</button>
        </form>
    </div>
    <a href="/pizzas" class="back"><- Retournez vers les commandes</a>
@endsection

