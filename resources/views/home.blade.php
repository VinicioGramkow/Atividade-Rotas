<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

    </head>
    <body>

    <a href="{{route('ex.2', ['quant' => 99])}}">Exercicio 2</a><br>
    <a href="{{route('ex.3', ['inicio' => 1, 'fim' => 15, 'intervalo' =>3 ])}}">Exercicio 3</a><br>
    <a href="{{route('ex.4', ['valores' => 'A_B_C_D_E_E_D_C_B_A'])}}">Exercicio 4</a>
    </body>
</html>
