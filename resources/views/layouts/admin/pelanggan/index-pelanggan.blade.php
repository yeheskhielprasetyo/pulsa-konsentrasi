@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="section">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title" style="color: black;">Data Pelanggan yang sudah dikonfirmasi</h2>
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
    function actionkonfirmasi(action, id){
        $.ajax({
        url:"../pelanggan-konfirmasi/"+action+"/"+id,
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
