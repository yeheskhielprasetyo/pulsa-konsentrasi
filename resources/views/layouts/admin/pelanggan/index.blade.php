@extends('layouts.app')
@section('content')
    <table class="table table-bordered">
        <thead>

        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Pembeli</th>
            {{-- <th scope="col">Operator</th>
            <th scope="col">Jumlah</th> --}}
            <th scope="col" class="text-center">Aksi</th>
            {{-- <th scope="col">Handle</th> --}}
        </tr>
        </thead>
        <tbody>
            {{-- {{$transaksis}} --}}
            @foreach ($transaksi as $transaksis)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$transaksis->user->name}}</td>
                {{-- <td>{{$transaksis->id_user}}</td> --}}
                <td class="text-center">
                        <a href="{{ route('detailpelanggan.detail', $transaksis->id_user) }}"
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
                <h2 class="card-title" style="color: black;">Data Transaksi User</h2>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="bg-white p-4" style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! $dataTable->scripts() !!}
</div>


<div id="result"></div>
<script>
    function actionpelanggan(action, id){
        $.ajax({
        url:"pelanggan/"+action+"/"+id,
        method:"GET",
            success:function(data){
                $('#result').html(data.html);
            },
            error:function() {
            alert("gagal");
            }
        });
    }
</script> --}}
@endsection
