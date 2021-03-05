@extends ('../sidebar')
@section('content')

              <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Anak Yatim</h1><br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <a href="/createuser" class="m-0 font-weight-bold text-primary">Tambah User</a> -->
              <a href="/createanak" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data Anak Yatim</span>
                  </a>
              <!-- <a href="/createuser" class="m-0 font-weight-bold text-primary">Tambah User</a> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Anak</th>
                      <th>Nama Ibu</th>
                      <th>Nama Bapak</th>
                      <th>No Telp Orang Tua</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Nama Anak</th>
                      <th>Nama Ibu</th>
                      <th>Nama Bapak</th>
                      <th>No Telp Orang Tua</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($anak_yatim as $data )
                    <tr>
                      <td>{{$data->nama_anak}}</td>
                      <td>{{$data->nama_ibu}}</td>
                      <td>{{$data->nama_bapak}}</td>
                      <td>{{$data->no_hp_orang_tua}}</td>
                      <td>{{$data->alamat}}</td>
                      <td align ="center"><a href="/editanak/{{$data->id_anak}}" class="btn btn-info btn-circle">
                      <i class="fas fa-user-edit"></i>
                            </a>  
                            <button class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalDelete{{$data->id_anak}}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    <div id="ModalDelete{{$data->id_anak}}" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" style="width:55%;">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h4>Apakah yakin menghapus {{$data->nama_anak}} ?</h4>
                                        <input type="hidden", name="applicant_id" id="app_id" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
                                        <!-- <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button> -->
                                        <a href="/deleteanak/{{$data->id_anak}}" class="btn btn-danger waves-effect remove-data-from-delete-form">
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