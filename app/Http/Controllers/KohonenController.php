<?php

namespace App\Http\Controllers;

use App\Kohonen;
use Illuminate\Http\Request;
use Illuminate\Routing\ViewController;
use Illuminate\Support\Facades\DB;

class KohonenController extends Controller
{
    public $matrizGlobal = [];

    public function index(){
        $patrones = Kohonen::all()->toArray();
        $entradas = 20;
        return view('welcome', compact('patrones'), compact('entradas'));
    }

    public function crearRed(){
        $patrones = Kohonen::all()->count();
        $entradas = 39;
        $neuronas = 19;
        for($i = 0; $i <= $entradas; $i++){
            for($j = 0; $j <= $neuronas; $j++){

                $pesosIniciales = rand(-1, 9)/100;

                if($pesosIniciales <= 1 || $pesosIniciales >= -1){
                    $matriz[$j][$i] = $pesosIniciales;
                }else{
                    $matriz[$j][$i] = 0.5;
                }

            }
        }
        //$columna = $this->entrenarRed($matriz);

        $coeficienteVecindad = $this->distanciasColaterales($neuronas);
        return view('pesos', compact('patrones', 'entradas', 'neuronas'), compact('matriz'));
    }

    public function distanciasColaterales($neuronas){

        for($i = 0; $i < $neuronas; $i++){
            $random = rand(-1, 9)/100;
            if($random > 0 && $random <= 1){
                $distanciasCol[$i] = $random;
            }
            $distanciasCol[] = 0.5;
        }
        $sum = array_sum($distanciasCol);

        return $sum/$neuronas;
    }

    public function entrenarRed($pesos){
        $iteraciones = 10;
        $entradas = 20;
        $neuronas = 40;
        $sumatoria = 0;

        $patrones = DB::table('digitos')->where('digito', 'like', '%NUMERO%')->get();

        //Accediendo a patrones por columna BD
        for($i = 0; $i < $entradas; $i++){
            $columna = 'X'.($i+1);

            for($j = 0; $j <= 49; $j++){
                $patron[$j][$i] = $patrones[$j]->$columna;
            }
        }

        for ($r=1; $r < $iteraciones; $r++) {

            $rataAprendizaje = 1/$r;

            for ($p=0; $p < 50; $p++) {
                $sumatoria = 0;
                for ($i=0; $i < 40; $i++) {
                    for ($k=0; $k < 20; $k++) {
                        $sumatoria += pow($patron[$p][$k]-$pesos[$k][$i], 2);
                    // dd($sumatoria, $patron[$p][$k], $pesos[$k][$i]);
                    }
                    $distanciasEuclidianas[$p][] = sqrt($sumatoria);
                    $this->actualizarPesos($distanciasEuclidianas[$p][0], $rataAprendizaje, $pesos);
                }
            }
        }


    }

    public function actualizarPesos($distanciaMenor, $rata, $matriz){
        $matrizVieja = $matriz;
        for ($i=0; $i < 40; $i++) {
           for ($j=0; $j < 20; $j++) {
            if($j==0){
                $nuevoPatron = $matriz[$j][$i]+$rata*$distanciaMenor;
                $matriz[$j][$i] = $nuevoPatron;
            }

           }
        }
        //return redirect('entrenamiento', compact('matriz', 'matrizVieja'));
        dd($matriz, $matrizVieja);

    }

    public function cargarPesos(){
        $patrones = Kohonen::all()->count();
        $entradas = 39;
        $neuronas = 19;
        for($i = 0; $i <= $entradas; $i++){
            for($j = 0; $j <= $neuronas; $j++){

                $pesosIniciales = rand(-1, 9)/100;

                if($pesosIniciales <= 1 || $pesosIniciales >= -1){
                    $matriz[$j][$i] = $pesosIniciales;
                }else{
                    $matriz[$j][$i] = 0.5;
                }

            }
        }
        $columna = $this->entrenarRed($matriz);

        $coeficienteVecindad = $this->distanciasColaterales($neuronas);
        return view('pesos', compact('patrones', 'entradas', 'neuronas'), compact('matriz'));
    }
}
