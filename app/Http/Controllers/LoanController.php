<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        return view('loan.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->input();
            dd(Loan::create($data));
        }
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
