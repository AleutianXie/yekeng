@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">借款详情</div>

        <div class="card-body">
          <div class="form-group">
            <label for="date">日期</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar" aria-hidden="true"></i></span>
              </div>
              <input type="date" class="form-control" id="date" name="date" value="" aria-describedby="inputGroupPrepend" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="name">姓名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $loan->name }}" readonly>
          </div>
          <div class="form-group">
            <label for="id_no">身份证</label>
            <input type="text" class="form-control" id="id_no" name="id_no" value="{{ $loan->id_no }}" readonly>
          </div>
          <div class="form-group">
              <label for="spouse">配偶</label>
              <input type="text" class="form-control" id="spouse" name="spouse" value="{{ $loan->spouse }}" readonly>
          </div>
          <div class="form-group">
              <label for="spouse_id_no">配偶身份证</label>
              <input type="text" class="form-control" id="spouse_id_no" name="spouse_id_no" value="{{ $loan->spouse_id_no }}" readonly>
          </div>
          <div class="form-group">
              <label for="cautioner">担保人</label>
              <input type="text" class="form-control" id="cautioner" name="cautioner" value="{{ $loan->cautioner }}" readonly>
          </div>
          <div class="form-group">
            <label for="amount">借款金额</label>
            <div class="input-group">
              <input type="text" class="form-control" id="amount" name="amount" value="{{ number_format($loan->amount) }}元" aria-describedby="inputGroupPrepend" readonly>
            </div>
          </div>

          <div class="form-group">
            <label for="agreement">借款合同</label>
            <img src="{{ Storage::url($loan->agreement) }}" class="img-fluid rounded mx-auto d-block" alt="借款合同">
          </div>

          <div class="form-group">
            <label for="receipt">票据</label>
            <img src="{{ Storage::url($loan->receipt) }}" class="img-fluid rounded mx-auto d-block" alt="票据">
          </div>

          <div class="form-group">
            <label for="comment">备注</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" readonly>{{ $loan->comment }}</textarea>
          </div>

          <div class="form-group">
            <a class="btn btn-info" href="{{ route('loan.interest', $loan->id) }}">还款记录</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function () {
    $('#date').val('{{ $loan->date }}');
  });
</script>
@endsection
