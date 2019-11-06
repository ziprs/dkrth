@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>Daftar Permintaan Barang</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama Aset</th>
                  <th>Jumlah </th>
                  <th>Kegiatan</th>
                  <td>Nama Pengambil</td>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Trident</td>
                  <td>Win 95+</td>
                 
                  <td><a  href="{{route('useredit')}}" class="btn  btn-warning">Lihat</a>
                    <button type="button" class="btn  btn-danger">Delete</button></td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.0
                  </td>
                  <td>Trident</td>
                  <td>Win 95+</td>
                  
                  <td><a  href="{{route('useredit')}}" class="btn  btn-warning">Lihat</a>
                    <button type="button" class="btn  btn-danger">Delete</button></td>
                </tr>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 5.5
                  </td>
                  <td>Trident</td>
                  <td>Win 95+</td>
                 
                  <td><a  href="{{route('useredit')}}" class="btn  btn-warning">Lihat</a>
                    <button type="button" class="btn  btn-danger">Delete</button></td>
                </tr>

             
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                 
                  <th>CSS grade</th>
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