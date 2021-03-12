@extends ('../sidebar')
@section('content')

              <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data User</h1><br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <a href="/createuser" class="m-0 font-weight-bold text-primary">Tambah User</a> -->
              <a href="/createuser" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data User</span>
                  </a>
              <!-- <a href="/createuser" class="m-0 font-weight-bold text-primary">Tambah User</a> -->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Nama</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      @foreach($datauser as $data )
                    <tr>
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{$data->role}}</td>
                      <td align ="center"><a href="{{ route('user.edit',[$data->id])}}" class="btn btn-info btn-circle">
                      <i class="fas fa-user-edit"></i>
                            </a>  
                            <button class="btn btn-danger btn-circle" data-toggle="modal" data-target="#ModalDelete{{$data->id}}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <div id="ModalDelete{{$data->id}}" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" style="width:55%;">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h4>Apakah yakin menghapus {{$data->name}} ?</h4>
                                        <input type="hidden", name="applicant_id" id="app_id" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
                                        <!-- <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button> -->
                                        <a href="{{ route('user.softdelete',[$data->id])}}" class="btn btn-danger waves-effect remove-data-from-delete-form">
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