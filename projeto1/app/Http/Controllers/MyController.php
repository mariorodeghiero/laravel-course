<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function getName() {
        return "<H1>My first controller</H1>";
    }

    public function getAge() {
        return "<H1>My Age:</H1>";
    }

    public function multiply($n1, $n2) {
        return $n1 * $n2;
    }

    public function getNameById($id) {
        $v = ["Mario", "Eder", "Jorge", "Lucas"];
        if ($id >=0 && $id < count($v)) {
            return $v[$id];
        }
        return "Não encontrado!!";
    }
}
