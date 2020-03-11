@extends('admin.layout')

@section('content')
    <?php
    use \App\Constants\VacationType;
    ?>
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{trans('vacations')}}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"
                                                   class="text-light-color">{{trans('home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.vacations.index', ['user' => $user->id]) }}"
                                                   class="text-light-color">{{trans('vacations')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('new')}}</li>
                </ol>
            </div>
            <!--page-header closed-->

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{trans('new_vacation')}}</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.user.vacations.store',['user'=>$user->id]) }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf

                                    @if(Session::has('message'))
                                        <td> <p class="preloader-wrapper big active {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p></td>
                                    @endif

                                    <div class="form-group col-md-12 row">

                                        <input type="hidden" name="user_id" value="{{$user->id}}">

                                        <div class="form-group col-md-4">
                                            <label for="hiring_date">Start date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker-deafult"
                                                       name="start_date" id="start_date"
                                                       value="{{ old('start_date') }}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="hiring_date_form_one">End date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker-deafult"
                                                       name="end_date" id="end_date"
                                                       value="{{ old('end_date') }}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="hiring_date_form_one">Return date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker-deafult"
                                                       name="return_date" id="return_date"
                                                       value="{{ old('return_date') }}"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-4">
                                            <label for="machine_code">Duration</label>
                                            <input type="text" class="form-control" name="duration"
                                                   value="{{ old('duration') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="name">Employee Name</label>
                                            <input type="text" class="form-control"
                                                   value="{{$user->name}}" readonly>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="national_id_number">Employee Number</label>
                                            <input type="text" class="form-control"
                                                   value="{{$user->machine_code}}" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-4">
                                            <label for="mobile_number">Mobile number</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-mobile_number"></i>
                                                </div>
                                                <input type="text" class="form-control" name="phone"
                                                       id="phone"
                                                       value="{{$user->mobile_number}}"
                                                       data-inputmask='"mask": "99999999999"'
                                                       data-mask >
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="national_id_number">Department</label>
                                            <input type="hidden" name="department_id" value="{{$user->department_id}}" >
                                            <input type="text" class="form-control" value="{{$user->department->name}}" readonly>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="national_id_number">Position</label>
                                            <input type="hidden" name="position_id" value="{{$user->position_id}}" >
                                            <input type="text" class="form-control" value="{{$user->position->name}}" readonly>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-4">
                                            <div class="form-group overflow-hidden">
                                                <label for="branch_id">Vacation Type</label>
                                                <select name="vacation_type" class="form-control select2 w-100"
                                                        id="vacation_type">
                                                    @foreach(VacationType::getList() as $key => $value)
                                                        <option
                                                            value="{{ $key }}" {{ old("vacation_type") == $key? "selected":null }}>{{ $value }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="national_id_number">Address during Vacation</label>
                                            <input type="text" class="form-control" name="address_during_vacation"
                                                   value="{{ old('address_during_vacation') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="national_id_number">Notes</label>
                                            <textarea type="text" class="form-control" name="notes"></textarea>
                                        </div>


                                    </div>



                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-3">
                                            <button type="submit" href="#"
                                                    class="btn  btn-outline-primary m-b-5  m-t-5">
                                                <i class="fa fa-save"></i> {{trans('save')}}
                                            </button>
                                        </div>
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

@section('scripts')



@stop
