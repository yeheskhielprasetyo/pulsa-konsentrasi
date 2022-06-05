@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="section">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">History Transaksi</h2>
                <hr>
                <p style="color: grey;">Disini kami menggunakan Rekening BNI dengan nomor tujuan : <b>1234567890</b>, &nbsp; Atas Nama : <b>Yeheskhiel Prasetyo Rakordana</b></p>
                <p style="color: grey;">Silahkan Upload Bukti Pembayaran dan Hubungi Nomor dibawah ini jika mengalami kendala.</p>
                <p style="color: grey;"><b>089234567733</b>.</p>
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
    function actiontransaksi(action,id){
        $.ajax({
        url:"transaksi-pulsa/"+action+"/"+id,
        method:"GET",
            success:function(data){
                $('#result').html(data.html);
            },
            error:function() {
            alert("gagal");
            }
        });
    }
</script>
@endsection
