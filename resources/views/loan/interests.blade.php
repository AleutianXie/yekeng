@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="row">
      <div class="card">
        <div class="card-header">还款记录页
          <a class="btn-sm btn-success pull-right" href="{{ route('loan.repay', $loan->id) }}"><i class="fa fa-plus" aria-hidden="true"></i> 新建</a>
        </div>

        <div class="card-body">
          @if ($loan->interests)
          <div class="table-responsive-sm d-md-block d-none">
            <table class="table table-striped table-sm table-hover">
              <thead>
                <tr>
                  <th scope="col">编号</th>
                  <th scope="col">月份</th>
                  <th scope="col">金额</th>
                  <th scope="col">票据</th>
                  <th scope="col">备注</th>
                  <th scope="col">备注</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($loan->interests as $interest)
                  <tr>
                    <td scope="row">{{ $interest->id }}</td>
                    <td>{{ $interest->month }}</td>
                    <td>{{ $interest->amount }}元</td>
                    <td><img src="{{ Storage::url($interest->receipt) }}" class="img-thumbnail rounded float-left"></td>
                    <td>{{ $interest->comment }}</td>
                    <td><a class="btn btn-danger" data-iid="{{ $interest->id }}" data-toggle="modal" data-target="#modal-delete">删除</a></td>
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
                  <th scope="col" class="text-center">还款</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($loan->interests as $interest)
                <tr>
                  <td scope="row" class="align-middle">{{ $interest->id }}</td>
                  <td>
                    <p>月份: {{ $interest->month }}</p>
                    <p>金额: {{ $interest->amount }}元</p>
                    <p>票据: <img src="{{ Storage::url($interest->receipt) }}" class="img-thumbnail rounded mx-auto d-block"></p>
                    <p>操作: <a class="btn btn-danger" data-iid="{{ $interest->id }}" data-toggle="modal" data-target="#modal-delete">删除</a></p>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @else
            尚无还款记录
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
                确认删除该还款信息？
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
    $('#modal-delete').on('shown.bs.modal', function (e) {
      $('.modal-footer form').attr('action', '/loan/{{ $loan->id }}/repay/'+e.relatedTarget.dataset.iid+'/delete');
    });
  });
</script>
@endsection
