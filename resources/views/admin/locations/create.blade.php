@extends('admin.layout')

@section('content')

    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{ trans('locations') }}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"
                                                   class="text-light-color">{{ trans('home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.locations.index') }}"
                                                   class="text-light-color">{{ trans('locations') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('new') }}</li>
                </ol>
            </div>
            <!--page-header closed-->

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ trans('new_location') }}</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.locations.store') }}" method="post">
                                    @csrf


                                        <div class="form-group col-md-4">
                                            <label for="name">{{ trans('name') }}</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{ old("name")}}">
                                        </div>

                                    <div class="form-group col-md-4" id="parent">

                                            <label for="parent_id">{{trans('parent')}}</label>
                                            <select name="parent_id" class="form-control select2 w-100"
                                                    id="parent_id">
                                                <option value="">{{ trans('select_parent') }}</option>
                                                @foreach($parents as $parent)
                                                    <option
                                                        value="{{ $parent->id }}" {{ old("parent_id") == $parent->id ? "selected":null }}>{{ $parent->name }}</option>

                                                @endforeach
                                            </select>

                                    </div>


                                    <div class="form-group col-md-3">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="active" value="1" checked
                                                   class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">{{ trans('active') }}</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button type="submit" href="#" class="btn  btn-outline-primary m-b-5  m-t-5"><i
                                                class="fa fa-save"></i> {{ trans('save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
