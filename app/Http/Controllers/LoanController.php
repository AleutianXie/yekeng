<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input();
        $model  = new Loan();
        $model  = $model->query();
        $this->getModel($model, $filter);
        $loans  = $model->paginate()->appends($filter);
        return view('loan.index', compact('loans'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->input();
            Loan::create($data);
            return redirect(route('loan'))->with('succeed', '增加成功!');
        }
        return view('loan.create');
    }

    public function detail(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        return view('loan.detail', compact('loan'));
    }

    public function repay(Request $request, $loan_id)
    {
        $loan = Loan::findOrFail($loan_id);
        if ($request->isMethod('POST')) {
            dd($loan->repay($request->input()));
        }
        return view('loan.repay', compact('loan'));
    }

    public function delete(Request $request, $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        return redirect(route('loan'))->with('succeed', '删除成功!');
    }

    private function getModel(&$model, $filter)
    {
        $model->latest();
    }
}
