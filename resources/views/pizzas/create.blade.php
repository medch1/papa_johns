@extends('layouts.app')
@section('content')
    <div class="wrapper create-pizza">
        <h1>Créez votre Pizza</h1>
        <form action="/pizzas" method="POST">
            @csrf
            <label for="nom">Votre nom</label>
            <input type="text" id="nom" name="nom">
            <label for="type">Choisissez le type de votre Pizza :</label>
            <select name="type" id="type">
                <option value="neptune">Neptune (10 €)</option>
                <option value="margherita">Margherita  (8 €)</option>
                <option value="pepperoni">Pepperoni(20 €)</option>
                <option value="fromages">4 Fromages(25 €) </option>
            </select>
            <label for="sauce">Choisissez la sauce :</label>
            <select name="sauce" id="sauce">
                <option value="sauce tomate">Sauce tomate (5 €)</option>
                <option value="creme fraiche">Crème fraîche (8 €)</option>
                <option value="sauce bbq">Sauce BBQ (6 €)</option>
            </select>
            <fieldset>
                <label>Ajouter des suppléments</label>
                <input type="checkbox" name="supp[]" value="oignons">Oignons (2 €)<br />
                <input type="checkbox" name="supp[]" value="olives noires">Olives noires (2 €)<br />
                <input type="checkbox" name="supp[]" value="champignons">Champignons (2 €)<br />
                <input type="checkbox" name="supp[]" value="poivrons verts">Poivrons verts (2 €)<br />

            </fieldset>
            <input type="submit" value="Confirmer la commande ">
        </form>

    </div>
@endsection

