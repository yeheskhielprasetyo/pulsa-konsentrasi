@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="section">
                <div class="grey-bg container-fluid">
                    <section id="minimal-statistics">
                    <div class="row">
                        <div class="col-12 mt-3 mb-1">
                        <h4 class="text-uppercase">Dashboard Admin</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{$operator}}</h3>
                                    <span>Operator</span>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-speech warning font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{$harga}}</h3>
                                    <span>Harga</span>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-speech warning font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{{$pelanggan}}</h3>
                                        <span>Pelanggan</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </section>
                </div>
    </section>
    </div>
@endsection
