@extends ('../sidebar')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Data Anak Yatim</h1>
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
    <form action="/postanak" method="POST">
    @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Anak</label>
            <input type="text" name="nama_anak" value="{{   old('nama_anak') }}"  placeholder="Masukkan Nama" class="form-control @error('nama_anak') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('nama_anak')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Ibu</label>
            <input type="text" name="nama_ibu" value="{{   old('nama_ibu') }}"  placeholder="Masukkan Nama" class="form-control @error('nama_ibu') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('nama_ibu')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Ayah</label>
            <input type="text" name="nama_bapak" value="{{   old('nama_bapak') }}"  placeholder="Masukkan Nama" class="form-control @error('nama_bapak') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('nama_bapak')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">No. Telephone</label>
            <input type="number" name="no_hp_orang_tua" value="{{   old('no_hp_orang_tua') }}"  placeholder="Masukkan No.Telp" class="form-control @error('no_hp_orang_tua') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('no_hp_orang_tua')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat</label>
            <input type="text" name="alamat" value="{{   old('alamat') }}"  placeholder="Masukkan Alamat" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">tambah</button>
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