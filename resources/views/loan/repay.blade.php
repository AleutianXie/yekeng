@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新建/增加还款</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="needs-validation" novalidate method="post">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="name">姓名</label>
                        <input type="text" class="form-control" id="name" value="{{ $loan->name }}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="id_no">身份证</label>
                        <input type="text" class="form-control" id="id_no" value="{{ $loan->id_no }}" readonly>
                      </div>
                      <div class="form-group">
                          <label for="spouse">配偶</label>
                          <input type="text" class="form-control" id="spouse" value="{{ $loan->spouse }}" readonly>
                      </div>
                      <div class="form-group">
                          <label for="spouse_id_no">配偶身份证</label>
                          <input type="text" class="form-control" id="spouse_id_no" value="{{ $loan->spouse_id_no }}" readonly>
                      </div>
                      <div class="form-group">
                          <label for="cautioner">担保人</label>
                          <input type="text" class="form-control" id="cautioner" value="{{ $loan->cautioner }}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="amount">借款金额</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="loan_amount" value="{{ $loan->amount }}" aria-describedby="inputGroupPrepend" readonly>
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-yen" aria-hidden="true"></i></span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="amount">还款金额/利息</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" aria-describedby="inputGroupPrepend" required>
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-yen" aria-hidden="true"></i></span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="date">月份</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                          </div>
                          <input type="month" class="form-control" id="month" name="month" value="" placeholder="还款/利息月份" aria-describedby="inputGroupPrepend" required>
                          <div class="invalid-feedback">
                            Please choose a username.
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="receipt">票据</label>
                        <input type="file" class="form-control" id="receipt" name="receipt" required>
                        <div class="invalid-feedback">
                          Please choose a username.
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="comment">备注</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                      </div>

                      <button class="btn btn-primary" type="submit">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
