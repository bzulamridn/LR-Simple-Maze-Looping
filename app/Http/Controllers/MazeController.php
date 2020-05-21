<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MazeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function createMaze(Request $req)
    {
        $s = $req->s;
        $next = 'first';
        $row = 'mid-1';

        for ($i = 1; $i <= $s; $i++) {
            for ($j = 0; $j < $s; $j++) {
                if ($next === "first") {
                    if ($j === 1) {
                        echo "<span style='color:white'>@</span>";
                    } else {
                        echo "@";
                    }
                }elseif($next === "mid"){
                    if ($j === 0 || $j === $s - 1) {
                        echo "@";
                    } else {
                        echo "<span style='color:white'>@</span>";
                    }
                }else{
                    if ($j === ($s-2)) {
                        echo "<span style='color:white'>@</span>";
                    } else {
                        echo "@";
                    }
                }
            }
            
            echo '<br>';
            if($next === "first" && $row === "mid-1"){
                $next = "mid";
            }elseif($next === "mid" && $row === "mid-1"){
                $next = 'last';
            }elseif($next === 'last' && $row = "mid-1"){
                $next = "mid";
                $row = "mid-2";
            }elseif($next === 'mid' && $row = "mid-2"){
                $next = "first";
                $row = "mid-1";
            }
        }
    }
}
