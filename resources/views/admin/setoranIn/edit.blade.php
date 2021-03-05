@extends ('../sidebar')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Data Setoran Masuk</h1>
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
    <form action="/updatesetoranIn/{{$data_setoran->id_setoran}}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Penyetor</label>
            <select class="form-control chosen-select" tabindex="-1" id="exampleFormControlSelect1" name="nama_penyetor">
                <option>Pilih</option>
                @foreach ($data_anggota as $data)
                <option value="{{$data->nama_anggota}}">{{$data->nama_anggota}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah Setoran</label>
            <input type="text" name="jumlah_setoran" value="{{   $data_setoran->jumlah_setoran }}"  placeholder="Masukkan Nama" class="form-control @error('jumlah_setoran') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('jumlah_setoran')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
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