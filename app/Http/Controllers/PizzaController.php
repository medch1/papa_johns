<?php

namespace App\Http\Controllers;

use App\Events\CommandNotification;
use Illuminate\Http\Request;
Use App\Models\Pizza ;
class PizzaController extends Controller
{
    public function calcul ($id){
        $pizza=Pizza::findOrFail($id);
        $sauce = $pizza->sauce;
        $type = $pizza->type;
        $supp = $pizza->supp;

        $prix = 0 ;
        switch($type){
            case('neptune'):
                $prix = $prix + 10 ;
                break;
            case('margherita'):
                $prix = $prix + 8 ;
                break;
            case('pepperoni'):
                $prix = $prix + 20 ;
                break;
            case('fromages'):
                $prix = $prix + 25 ;
                break;
        }
        switch($sauce){
            case('sauce tomate'):
                $prix = $prix + 5 ;
                break;
            case('creme fraiche'):
                $prix = $prix + 8 ;
                break;
            case('sauce bbq'):
                $prix = $prix + 6 ;
                break;

        }
        if($supp!= null){
            $prix = $prix + 2 *count($supp);
        }


        return $prix ;

    }

    public function index() {
        /*$pizzas=Pizza::all();*/
        /*$pizzas= Pizza::orderBy('name','desc')->get();*/
        /*$pizzas=Pizza::where('type','neptune') -> get();*/
        $pizzas=Pizza::latest()->get();

        return view('pizzas.index',[
            'pizzas'=>$pizzas,
            'nom'=>request('nom'),
         //   'age'=>request('age')
        ]);
    }

    public function show($id){
        $pizza=Pizza::findOrFail($id);
        $prix = $this->calcul($id);

        return view('pizzas.show',['pizza'=>$pizza,'prix'=>$prix]);
    }

    public function create(){
        return view('pizzas.create');
    }

    public function store(){

        $pizza=new Pizza();
        $pizza->nom=\request('nom');
        $pizza->type=\request('type');
        $pizza->sauce=\request('sauce');
        $pizza->supp=\request('supp');
        //$pizza->calcul($pizza->sauce,$pizza->type,$pizza->supp,);
        $pizza->prix=0;
        $pizza->save();
        $pizza->prix = $this->calcul($pizza->id);
        $pizza->save();
        broadcast(new CommandNotification($pizza));

        return redirect('/')->with(['mssg' =>'Merci pour commander avec PAPA JOHNS le prix total = ','prix' => $pizza->prix ,'euro'=>'€']);
    }
    public function destroy ($id){
        $pizza=Pizza::findOrFail($id);
        $pizza->delete();
        return redirect('/pizzas');

    }



}
