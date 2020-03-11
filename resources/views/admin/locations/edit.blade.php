@extends('admin.layout')
@section('content')
    <?php
    use \App\Constants\ClassTypes;
    ?>
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">locations</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"
                                                   class="text-light-color">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.locations.index') }}" class="text-light-color">locations</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update locations #{{ $item->id }}</li>
                </ol>
            </div>
            <!--page-header closed-->

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>New location</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.locations.update', ['location' => $item]) }}"
                                      method="post">
                                    @method("PUT")
                                    @csrf

                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ !(old('name'))? $item->name : old('name' )}}"
                                               id="name">
                                    </div>


                                    <div class="form-group col-md-3">
                                        <div class="form-group overflow-hidden">
                                            <label for="class">{{trans('parent')}}</label>
                                            <select name="parent_id" class="form-control select2 w-100">
                                                <option value="">{{ trans('parent') }}</option>
                                                @foreach($parents as $parent)
                                                    <option
                                                        value="{{ $parent->id }}" {{ ($item->parent_id == $parent->id) ? "selected":null }}> {{ $parent->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="active" value="1"
                                                   {{ $item->active ? 'checked' : '' }} class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Active</span>
                                        </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button type="submit" href="#" class="btn  btn-outline-primary m-b-5  m-t-5"><i
                                                class="fa fa-save"></i> Save
                                        </button>
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
