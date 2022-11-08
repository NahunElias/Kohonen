<?php

namespace App\Http\Controllers;

use App\Kohonen;
use Illuminate\Http\Request;

class KohonenController extends Controller
{

    public function crearRed(){
        $patrones = Kohonen::all()->count();
        $entradas = 20;
        $neuronas = 40;
        $matriz[][] = [0][0];


            $dimMatriz = $entradas*$neuronas;
            for($i = 0; $i <= $entradas; $i++){
                for($j = 0; $j <= $neuronas; $j++){
                    $pesosIniciales = rand(-1, 1);
                    $matriz[$i][$j] = [$pesosIniciales];
                }
            }

        dd($matriz);

        return $patrones;
    }
}
