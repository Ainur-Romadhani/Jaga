@extends ('../sidebar')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
  <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->


<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-10 col-lg-10">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      
      <!-- Card Body -->
      <div class="card-body">
    <form action="{{ route('user.update',[$data->id])}}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" name="name" value="{{$data->name}}"  placeholder="Masukkan Nama" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" value="{{$data->email}}"  placeholder="Masukkan Email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Role</label>
            <select name="role" class="form-control">
                <option value="admin" {{ $data->role == "admin"? "selected":"" }}>Admin</option>
                <option value="sekretaris"{{ $data->role == "sekretaris"? "selected":"" }}>Sekretaris</option>
            </select>
        </div>
        <!-- <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> -->
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/user" class="btn btn-danger">Kembali</a>
    </form>
        <!-- <div class="chart-area">
          <canvas id="myAreaChart"></canvas>
        </div> -->
      </div>
    </div>
  </div>

</div>

<!-- Content Row -->
<div class="row">
  <div class="col-lg-6 mb-4">
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection