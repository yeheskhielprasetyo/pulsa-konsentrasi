@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="section">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Transaksi Pulsa</h2>
                <hr>
                <p>Silahkan ke History Pulsa untuk melihat menu pembayaran lewat Rekening</p>
            </div>
            <form method="POST" action="{{route('transaksi-pulsa.store')}}">
            @csrf
            <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_pegawai ">Operator</label>
                        <select class="form-control" id="operator" name="operator" required  style="color: #8d827f">
                        <option value="">- Pilih Operator -</option>
                        @foreach ($operator as $operators)
                        <option value="{{$operators->id}}">{{$operators->nama_operator}} &nbsp; || &nbsp;  Rp {{$operators->harga->harga}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Jumlah</label>
                        <input type="text" class="form-control" id="no_spt" name="jumlah" required placeholder="Masukkan Jumlah">
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="tempat_lahir">No Hp</label>
                    <input type="text" class="form-control" id="no_spt" name="no_hp" required placeholder="Masukkan No Handphone">
                </div>
                </div>
            </div>
            <div class="text-right mb-3">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            <a href="" class="btn btn-danger">Kembali</a>
            </div>
            </div>
            </form>
            <div class="card-footer">
            </div>
        </div>
    </section>
</div>


<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
<script>
    $('#operator').chosen({ width: '100%' });
</script>

@endsection
