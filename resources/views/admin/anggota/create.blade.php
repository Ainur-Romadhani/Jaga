@extends ('../sidebar')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Anggota</h1>
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
    <form action="{{ route('anggota.store')}}" method="POST">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Anggota</label>
            <input type="text" name="nama_anggota" value="{{   old('nama_anggota') }}"  placeholder="Masukkan Nama" class="form-control @error('nama_anggota') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('nama_anggota')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" name="email" value="{{   old('email') }}"  placeholder="Masukkan Nama" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">No. Telephone</label>
            <input type="number" name="no_hp" value="{{   old('no_hp') }}"  placeholder="Masukkan No.Telp" class="form-control @error('no_hp') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('no_hp')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat Anggota</label>
            <input type="text" name="alamat" value="{{   old('alamat') }}"  placeholder="Masukkan Alamat" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
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