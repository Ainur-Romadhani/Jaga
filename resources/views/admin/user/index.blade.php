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
                      <td align ="center"><a href="/datauser/{{$data->id}}" class="btn btn-info btn-circle">
                      <i class="fas fa-user-edit"></i>
                            </a>  
                          <button class="btn btn-danger btn-circle">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
       

@endsection