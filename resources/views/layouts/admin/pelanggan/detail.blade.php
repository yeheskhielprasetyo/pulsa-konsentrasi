@extends('layouts.app')
@section('content')
<table class="table table-bordered">
    <thead>

    <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Pembeli</th>
        <th scope="col">Operator</th>
        <th scope="col">Jumlah</th>
        <th scope="col" class="text-center">Aksi</th>
        {{-- <th scope="col">Handle</th> --}}
    </tr>
    </thead>
    <tbody>
        {{-- {{$transaksi}} --}}
        @foreach ($tes as $transaksis)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$transaksis->user->name}}</td>
            <td>{{$transaksis->id_operator}}</td>
            <td class="text-center">
                    <a href="{{ route('pelanggan.show', $transaksis->id) }}"
                        class="btn btn-sm btn-primary">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- <div class="content-wrapper">
    <section class="section">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <a href="{{route('pelanggan.index')}}" class="btn btn-danger btn-sm">Kembali</a>
                <h2 class="card-title mt-4" style="color: black;">Detail Transaksi</h2>
                <!-- {{$data}} -->
                <hr>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tempat_lahir">Nama Pembeli</label>
                        <input type="text" class="form-control" id="no_spt" value="{{$data->user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Operator</label>
                        <input type="text" class="form-control" id="no_spt" value="{{$data->operator->nama_operator}}" >
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Total Harga</label>
                        <input type="text" class="form-control" id="no_spt" value="Rp. {{$data->total_harga}}" >
                    </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="tempat_lahir">Jumlah</label>
                    <input type="text" class="form-control" id="no_spt" value="{{$data->jumlah}}" >
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">No Hp</label>
                    <input type="text" class="form-control" id="no_spt" value="{{$data->no_hp}}" >
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">Jam</label>
                    <input type="text" class="form-control" id="no_spt" value="{{\Carbon\Carbon::parse($data->created_at)->translatedFormat('h : m : s')}}" >
                </div>
                </div>
            </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </section>
</div>


<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>
<script>
    $('#operator').chosen({ width: '100%' });
</script> --}}

@endsection
