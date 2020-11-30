<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/produtos/{quant}', function($quant){
    
    $nome = ['Adoçante', 'Achocolatado', 'Açucar', 'Amendoim', 'Arroz', 'Batata', 'Bolacha', 'Bolo', 'Bombom', 'Cachorro-quente', 'Camarão', 'Carne', 'Cebola', 'Cereal', 'Chocolate', 'Cocada', 'Ervilhas', 'Farinha', 'Feijão', 'Fermento', 'Frango', 'Fruta', 'Fubá', 'Gelatina', 'Iogurte', 'Ketchup', 'Leite', 'Lentilha', 'Maionese', 'Maisena', 'Margarina', 'Milho', 'Mostarda', 'Noz', 'Ovo', 'Paçoca', 'Panetone', 'Pão', 'Peixe', 'Peru', 'Pipoca', 'Queijo', 'Sal', 'Sorvete', 'Tomate', 'Vinagre'];
    for($i = 0; $i < $quant; $i++){
        echo $nome[rand(1, 45)]  .' de ' .$nome[rand(1, 45)] .'<br>';
    }

})->where('quant', '[0-9]*')->name('ex.2');

Route::get('/serie/{inicio}/{fim}/{intervalo}', function($inicio, $fim, $intervalo){

    $serie = [];
    $soma = 0;
    $count = 0;
    for($i = $inicio; $i <= $fim; $i += $intervalo){
        $serie[] = $i;
        $soma += $i;
        $count += 1;
    }

    echo 'A série gerada é: ';
    for($j = 0; $j < count($serie); $j++){
        echo $serie[$j] .' ';
    }

    echo '<br>A soma da série é: ' .$soma .'<br>';
    echo 'A média da série é: '. $soma/$count .'<br>';
    echo 'A quantidade de números gerados foi: ' .$count;

})->where('inicio', '[0-9]*')->where('fim', '[0-9]*')->where('intervalo', '[0-9]*')->name('ex.3');

Route::get('/avaliacao/{valores}', function($valores){

    $gabarito = ['A', 'B', 'C', 'D', 'E', 'E', 'D', 'C', 'B', 'A'];

    $respostas = explode('_', $valores);

    if(sizeof($respostas) < 10){
        echo '<p style="color: red;"> Você não informou todas as respostas!</p>';
    }else{

        $correcao = [];
        foreach($respostas as $key => $resposta){
            if(!strcasecmp($resposta, $gabarito[$key])){
                $correcao[] = 1;
            }else{
                $correcao[] = 0;
            }
        }

        foreach($correcao as $key => $correto){
            if($correto == 1){
                echo '<p style="color: green;"> Você acertou a questão ' .($key + 1) .'.</p>';
            }else{
                echo '<p style="color: red;"> Você errou a questão ' .($key + 1) .'! A resposta correta era: Letra ' .$gabarito[$key] .'.</p>';
            }
        }
    }

})->where('respostas', '[A-Ea-e_]*')->name('ex.4');
