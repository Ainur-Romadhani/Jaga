@extends ('../sidebar')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Data Setoran Masuk</h1>
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
    <form action="/updatesetoranOut/{{$data_setoran->id_setoran_out}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Penerima</label>
            <select class="form-control chosen-select" tabindex="-1" id="exampleFormControlSelect1" name="penerima">
                <option>Pilih</option>
                @foreach ($data_anak as $data)
                <option value="{{$data->nama_anak}}">{{$data->nama_anak}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Dana Keluar</label>
            <input type="number" name="dana_keluar" value="{{   $data_setoran->dana_keluar }}"  placeholder="Masukkan Nama" class="form-control @error('dana_keluar') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('dana_keluar')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Keperluan</label>
            <input type="text" name="keperluan" value="{{   $data_setoran->keperluan }}"  placeholder="Masukkan Nama" class="form-control @error('keperluan') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('keperlua')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Dokumentasi</label>
            <input type="file" name="dokumentasi" value="{{   $data_setoran->dokumentasi }}"  placeholder="Masukkan Nama" class="form-control @error('dokumentasi') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('dokumentasi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
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