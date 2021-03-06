@extends('adminlte::page')

@section('title', 'Bidang')

@section('content_header')
    <h1>List Bidang</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{route('bidang.add')}}" class="btn btn-success "><i class="fa fa-fw fa-plus"></i>Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if (Session::has("success"))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  {{ Session::get("success") }}
                </div>
              @endif
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="30">ID</th>
                  <th>Bidang</th>
                  <th width="100">Action</th>
                </tr>
                </thead>
                <tbody>
                  
                  @foreach ($bidang as $row)
                    <tr>
                      <td>{{ $row->id_bidang }}</td>
                      <td>{{ $row->nama }}</td>
                      <td>
                        <a href="{{ route('bidang.edit',['id'=>$row->id_bidang]) }}" class="btn  btn-warning">Edit</a>
                        <a href="{{ route('bidang.delete',['id'=>$row->id_bidang]) }}" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                  @endforeach
             
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Bidang</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@stop
