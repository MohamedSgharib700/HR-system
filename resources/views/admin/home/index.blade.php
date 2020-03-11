@extends('admin.layout')

@section('content')

    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{ trans('dashboard') }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-light-color">{{ trans('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('dashboard') }}</li>
                </ol>
            </div>
            
            {{--<div class="row">
                <div class="col-lg-6 col-xl-4 col-sm-12 col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-primary mr-3">
                                <i class="fa ti ti-headphone-alt"></i>
                            </span>
                            <div>
                                <h4 class="m-0"><strong>{{ $tickets['submitted'] }}</strong></h4>
                                <h6 class="mb-0">{{ trans("submitted_tickets") }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 col-sm-12 col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-orange mr-3">
                                <i class="fa fa-clock-o"></i>
                            </span>
                            <div>
                                <h4 class="m-0"><strong>{{  $tickets['pending'] }}</strong></h4>
                                <h6 class="mb-0">{{ trans('pending') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 col-sm-12 col-md-6">
                    <div class="card p-3">
                        <div class="d-flex align-items-center">
                            <span class="stamp stamp-md bg-warning mr-3">
                                <i class="fa fa-check"></i>
                            </span>
                            <div>
                                <h4 class="m-0"><strong>{{ $tickets['resolved'] }}</strong></h4>
                                <h6 class="mb-0">{{ trans('resolved') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>--}}
                
        </section>
        
    </div>
@stop