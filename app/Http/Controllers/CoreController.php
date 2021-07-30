<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\CoreModel;

class CoreController extends Controller
{
    public function test(Request $request){
        $nilai = $request->input('nilai');
        $text = '';

    	return view('test.view',
            [ 'nilai' => $nilai,
                'text' => $nilai ]
        );
    }

    public function proses (Request $request) {
        $nilai = $request->input('nilai');
        $x =0;
        $text = '';
        for ($i=1; $i < $nilai+1; $i++) { 
            if ($x <= 1) {
                if ($i % 3 == 0 && $i % 5 == 0) {
                    $text .= "Pasar 20 Belanja Pangan<br>";
                    $x += 1;
                } elseif ($i % 3 == 0) {
                    $text .= "Pasar 20<br>";
                } elseif ($i % 5 == 0) {
                    $text .= "Belanja Pangan<br>";
                } else {
                    $text .= "$i <br>";
                }
            } elseif ($x >= 2 && $x < 5) {
                if ($i % 3 == 0 && $i % 5 == 0) {
                    $text .= "Pasar 20 Belanja Pangan<br>";
                    $x += 1;
                } elseif ($i % 3 == 0) {
                    $text .= "Belanja Pangan<br>";
                }elseif ($i % 5 == 0) {
                    $text .= "Pasar 20<br>";
                } else {
                    $text .= "$i <br>";
                }
            } elseif ($x >= 5) {
                break;
            }
        }
        return view('test.view',
            [ 'nilai' => $nilai,
                'text' => $text ]
        );
    }
}