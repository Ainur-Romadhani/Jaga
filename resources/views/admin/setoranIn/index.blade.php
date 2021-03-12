@extends ('../sidebar')
@section('content')

              <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Setoran Masuk</h1><br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <a href="/createuser" class="m-0 font-weight-bold text-primary">Tambah User</a> -->
              <a href="/createsetoranIn" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Setoran Masuk</span>
                  </a>
              <!-- <a href="/createuser" class="m-0 font-weight-bold text-primary">Tambah User</a> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Penyetor</th>
                      <th>Jumlah Setoran</th>
                      <th>Tanggal Setoran</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Nama Penyetor</th>
                      <th>Jumlah Setoran</th>
                      <th>Tanggal Setoran</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($data_setoranIn as $data )
                    <tr>
                      <td>{{$data->nama_penyetor}}</td>
                      <td>{{$data->jumlah_setoran}}</td>
                      <td>{{$data->created_at}}</td>
                      <td align ="center"><a href="{{ route('in.edit',[$data->id_setoran])}}" class="btn btn-info btn-circle">
                      <i class="fas fa-user-edit"></i>
                            </a>  
                            <button class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalDelete{{$data->id_setoran}}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <div id="ModalDelete{{$data->id_setoran}}" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" style="width:55%;">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h4>Apakah yakin menghapus Setoran {{$data->nama_penyetor}} ?</h4>
                                        <input type="hidden", name="applicant_id" id="app_id" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
                                        <!-- <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button> -->
                                        <a href="{{ route('in.softdelete',[$data->id_setoran])}}" class="btn btn-danger waves-effect remove-data-from-delete-form">
                                            <i class="fas fa-user-trash">Delete</i>
                                        </a>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Modal -->
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
       

@endsection