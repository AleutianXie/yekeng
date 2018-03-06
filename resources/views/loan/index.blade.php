@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="row">
      <div class="card">
        <div class="card-header">借款记录页</div>

        <div class="card-body">
          @if ($loans)
          <div class="table-responsive-sm d-md-block d-none">
            <table class="table table-striped table-sm table-hover">
              <thead>
                <tr>
                  <th scope="col">编号</th>
                  <th scope="col">日期</th>
                  <th scope="col">姓名</th>
                  <th scope="col">配偶</th>
                  <th scope="col">担保</th>
                  <th scope="col">金额</th>
                  <th scope="col">操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($loans as $loan)
                  <tr>
                    <td scope="row">{{ $loan->id }}</td>
                    <td>{{ $loan->date }}</td>
                    <td>{{ $loan->name }}({{ $loan->id_no }})</td>
                    <td>{{ $loan->spouse }}({{ $loan->spouse_id_no }})</td>
                    <td>{{ $loan->cautioner }}</td>
                    <td>{{ $loan->amount }}元</td>
                    <td><a class="btn btn-primary" href="{{ route('loan.repay', $loan->id) }}">增加利息</a>&nbsp;&nbsp;<a class="btn btn-danger" data-lid="{{ $loan->id }}" data-toggle="modal" data-target="#modal-delete">删除</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="d-md-none table-responsive">
            <table class="table table-striped table-sm table-hover">
              <thead>
                <tr>
                  <th scope="col" class="text-center">编号</th>
                  <th scope="col" class="text-center">借款</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($loans as $loan)
                <tr>
                  <td scope="row" class="align-middle">{{ $loan->id }}</td>
                  <td>
                    <p>日期: {{ $loan->date }}</p>
                    <p>借款人: {{ $loan->name }}({{ $loan->id_no }})</p>
                    <p>配偶: {{ $loan->spouse }}({{ $loan->spouse_id_no }})</p>
                    <p>担保人: {{ $loan->cautioner }}</p>
                    <p>金额: {{ $loan->amount }}元</p>
                    <p>操作: <a class="btn btn-primary" href="{{ route('loan.repay', $loan->id) }}">增加利息</a>&nbsp;&nbsp;<a class="btn btn-danger" data-lid="{{ $loan->id }}" data-toggle="modal" data-target="#modal-delete">删除</a></p>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          {{ $loans->links() }}
          @else
            尚无借款记录
          @endif
        </div>
      </div>
    </div>
  </div>
  {{-- 确认删除 --}}
  <div class="modal fade" id="modal-delete" tabIndex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">确认删除</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="关闭">
              <i class="fa fa-times" aria-hidden="true"></i> 
              </button>
            </div>
            <div class="modal-body">
              <p class="lead">
                <i class="fa fa-question-circle fa-lg"></i>
                确认删除该借款信息？
              </p>
            </div>
            <div class="modal-footer">
              <form method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" value="">
                <button type="button" class="btn btn-default" data-dismiss="modal">否</button>
                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-times-circle"></i> 是
                </button>
              </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#modal-delete').on('shown.bs.modal', function ($e) {
      $('.modal-footer form').attr('action', '/loan/'+$e.relatedTarget.dataset.lid+'/delete');
    });
    $('table tbody tr').on('click', 'td:not(:last)', function(e) {
      var id = $(this).parent('tr').children('td:first').text();
      $(location).attr('href', '/loan/'+id);
    });

    $('table tbody tr td').on('click', 'p:not(:last)', function(e) {
      var id = $(this).parent('tr').children('td:first').text();
      $(location).attr('href', '/loan/'+id);
    });
  });
</script>
@endsection
