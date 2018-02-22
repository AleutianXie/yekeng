<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        return view('loan.index');
    }

    public function create()
    {
        return view('loan.create');
    }

    public function detail()
    {
        return view('loan.detail');
    }

    public function repay()
    {
        return view('loan.repay');
    }
}
