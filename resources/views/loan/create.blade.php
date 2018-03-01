@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新增借款</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


<form class="needs-validation" novalidate>
  <div class="form-group">
    <label for="date">日期</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
      <input type="date" class="form-control" id="date" value="" placeholder="借款日期" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="name">姓名</label>
    <input type="text" class="form-control" id="name" placeholder="借款人姓名" value="{{ old('name') }}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a name.
    </div>
  </div>
  <div class="form-group">
    <label for="id_no">身份证</label>
    <input type="text" class="form-control" id="id_no" placeholder="借款人身份证号码" value="{{ old('id_no') }}" required>
    <div class="valid-feedback">
      Looks good!
    </div>
    <div class="invalid-feedback">
      Please choose a name.
    </div>
  </div>
  <div class="form-group">
      <label for="spouse">配偶</label>
      <input type="text" class="form-control" id="spouse" placeholder="借款人配偶姓名" value="{{ old('spouse') }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    <div class="invalid-feedback">
      Please choose a name.
    </div>
  </div>
  <div class="form-group">
      <label for="spouse_id_no">配偶身份证</label>
      <input type="text" class="form-control" id="spouse_id_no" placeholder="借款人配偶身份证号码" value="{{ old('spouse_id_no') }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    <div class="invalid-feedback">
      Please choose a name.
    </div>
  </div>
  <div class="form-group">
      <label for="cautioner">配偶</label>
      <input type="text" class="form-control" id="cautioner" placeholder="担保人" value="{{ old('cautioner') }}" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    <div class="invalid-feedback">
      <span aria-hidden="true">&times;</span><i class="fa fa-check"></i>Please choose a name.
    </div>
  </div>
  <div class="form-group">
    <label for="amount">借款金额</label>
    <div class="input-group">
      <input type="text" class="form-control" id="amount" placeholder="借款金额" aria-describedby="inputGroupPrepend" required>
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-yen" aria-hidden="true"></i></span>
      </div>
      <div class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>

  <div class="form-group">
    <label for="agreement">借款合同</label>
    <input type="file" class="form-control" id="agreement" required>
    <div class="invalid-feedback">
      Please choose a username.
    </div>
  </div>

  <div class="form-group">
    <label for="receipt">票据</label>
    <input type="file" class="form-control" id="receipt" required>
    <div class="invalid-feedback">
      Please choose a username.
    </div>
  </div>

  <div class="form-group">
    <label for="comment">备注</label>
    <textarea class="form-control" id="comment" rows="3"></textarea>
  </div>

  <button class="btn btn-primary" type="submit">提交</button>
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

$(document).ready(function(){
  $('#date').val('{{ old('date') ? old('date') : \Carbon\Carbon::create()->toDateString() }}');
});
</script>
@endsection
