@extends('admin.layout')

@section('content')
    <?php
    use \App\Constants\GenderTypes;
    use \App\Constants\UserTypes;
    use \App\Constants\MilitaryStatus;
    use \App\Constants\MaritalStatus;
    ?>
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{trans('users')}}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"
                                                   class="text-light-color">{{trans('home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}"
                                                   class="text-light-color">{{trans('users')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('new')}}</li>
                </ol>
            </div>
            <!--page-header closed-->

            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{trans('new_user')}}</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.users.store') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-8">
                                            <label for="image">{{trans('image')}}</label>
                                            <div class="input-group">
                                                <div class="col-xl-6 col-lg-12 col-md-12 userprofile">
                                                    <div class="userpic mb-2">
                                                        <img src="{{ url('/') }}/assets/img/avatar/avatar-3.jpeg" alt=""
                                                             class="userpicimg" id="upload_img">
                                                        <input type="file" name="image"
                                                               onchange="readURL(this, 'upload_img');">
                                                    </div>

                                                    <div class="text-center">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <label for="name">{{trans('name')}}</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                   value="{{ old('name') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="machine_code">Machine code</label>
                                            <input type="text" class="form-control" name="machine_code"
                                                   id="machine_code"
                                                   value="{{ old('machine_code') }}">
                                        </div>


                                        <div class="form-group col-md-4">

                                            <label for="email">{{trans('email')}}</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                   value="{{ old('email') }}">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-4">
                                            <label for="mobile_number">Mobile number</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-mobile_number"></i>
                                                </div>
                                                <input type="text" class="form-control" name="mobile_number"
                                                       id="mobile_number"
                                                       value="{{ old('mobile_number') }}"
                                                       data-inputmask='"mask": "99999999999"'
                                                       data-mask>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="landline_number">Landline number</label>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-landline_number"></i>
                                                </div>
                                                <input type="text" class="form-control" name="landline_number"
                                                       id="landline_number"
                                                       value="{{ old('landline_number') }}"
                                                       data-inputmask='"mask": "9999999999"'
                                                       data-mask>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="birthdate">Birth date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker"
                                                       name="birthdate" id="birthdate" value="{{ old('birthdate') }}"
                                                       readonly>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-4">
                                            <label for="national_id_number">National id Number</label>
                                            <input type="text" class="form-control" name="national_id_number"
                                                   id="national_id_number"
                                                   value="{{ old('national_id_number') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="password">{{trans('password')}}</label>
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label
                                                for="password_confirmation">Password confirmation</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                   id="password_confirmation">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <label for="educational_qualification">Educational qualification</label>
                                            <input type="text" class="form-control" name="educational_qualification"
                                                   id="educational_qualification"
                                                   value="{{ old('educational_qualification') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="special_graduation">Special graduation</label>
                                            <input type="text" class="form-control" name="special_graduation"
                                                   id="special_graduation"
                                                   value="{{ old('special_graduation') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="university">University</label>
                                            <input type="text" class="form-control" name="university"
                                                   id="university"
                                                   value="{{ old('university') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group overflow-hidden">
                                                <label for="types">user type</label>
                                                <select name="type" class="form-control select2 w-100" id="types">
                                                    @foreach(UserTypes::getList() as $key => $value)
                                                        <option
                                                            value="{{ $key }}" {{ old("type") == $key? "selected":null }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="form-group overflow-hidden">
                                                <label for="types">Military Status</label>
                                                <select name="military_status" class="form-control select2 w-100"
                                                        id="types">
                                                    <option value="">Military Status</option>
                                                    @foreach(MilitaryStatus::getList() as $key => $value)
                                                        <option
                                                            value="{{ $key }}" {{ old("military_status") == $key? "selected":null }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="form-group overflow-hidden">
                                                <label for="types">Marital Status</label>
                                                <select name="marital_status" class="form-control select2 w-100"
                                                        id="types">
                                                    <option value="">Marital Status</option>
                                                    @foreach(MaritalStatus::getList() as $key => $value)
                                                        <option
                                                            value="{{ $key }}" {{ old("marital_status") == $key? "selected":null }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-4">
                                            <div class="form-group overflow-hidden">
                                                <label for="location_id">City</label>
                                                <select name="location_id" class="form-control select2 w-100"
                                                        id="location_id">
                                                    <option value="">Select City</option>
                                                    @foreach($locations as $location)
                                                        <option
                                                            value="{{ $location->id }}" {{ old("location_id") == $location->id ? "selected":null }}>{{ $location->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="form-group overflow-hidden">
                                                <label for="branch_id">Department</label>
                                                <select name="department_id" class="form-control select2 w-100"
                                                        id="department_id">
                                                    <option value="">Select Department</option>
                                                    @foreach($departments as $department)
                                                        <option
                                                            value="{{ $department->id }}" {{ old("department_id") == $department->id ? "selected":null }}>{{ $department->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="form-group overflow-hidden">
                                                <label for="position_id">Position</label>
                                                <select name="position_id" class="form-control select2 w-100"
                                                        id="position_id">
                                                    <option value="">Select Positions</option>
                                                    @foreach($positions as $position)
                                                        <option
                                                            value="{{ $position->id }}" {{ old("position_id") == $position->id ? "selected":null }}>{{ $position->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-4">
                                            <label for="insurance_number">Insurance number</label>
                                            <input type="text" class="form-control" name="insurance_number"
                                                   id="insurance_number"
                                                   value="{{ old('insurance_number') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="medical_number">Medical number</label>
                                            <input type="text" class="form-control" name="medical_number"
                                                   id="medical_number"
                                                   value="{{ old('medical_number') }}">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="form-group custom-switches-stacked">
                                                <label class="form-label">
                                                    <label class="form-label">{{trans('gender')}}</label>
                                                    <label class="custom-switch">
                                                        <input type="radio" name="gender" value="{{GenderTypes::MALE}}"
                                                               class="custom-switch-input" checked="">
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">{{trans('male')}}</span>
                                                    </label>
                                                    <label class="custom-switch">
                                                        <input type="radio" name="gender"
                                                               value="{{GenderTypes::FEMALE}}"
                                                               class="custom-switch-input">
                                                        <span class="custom-switch-indicator"></span>
                                                        <span
                                                            class="custom-switch-description">{{trans('female')}}</span>
                                                    </label>
                                                </label>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-6">
                                            <label for="graduation_year">Graduation Year</label>
                                            <input type="text" class="form-control" name="graduation_year"
                                                   id="graduation_year"
                                                   value="{{ old('graduation_year') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="graduation_grade">Graduation grade</label>
                                            <input type="text" class="form-control" name="graduation_grade"
                                                   id="graduation_grade"
                                                   value="{{ old('graduation_grade') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-6">
                                            <label for="hiring_date">Hiring date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker-deafult"
                                                       name="hiring_date" id="hiring_date"
                                                       value="{{ old('hiring_date') }}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="hiring_date_form_one">Hiring date form one</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker-deafult"
                                                       name="hiring_date_form_one" id="hiring_date_form_one"
                                                       value="{{ old('hiring_date_form_one') }}"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-6">
                                            <label for="contract_start_date">Contract start date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker-deafult"
                                                       name="contract_start_date" id="contract_start_date"
                                                       value="{{ old('contract_start_date') }}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="contract_end_date">Contract end date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker-deafult"
                                                       name="contract_end_date" id="contract_end_date"
                                                       value="{{ old('contract_end_date') }}"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-6">
                                            <label for="termination_date">Termination Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker-deafult"
                                                       name="termination_date" id="termination_date"
                                                       value="{{ old('termination_date') }}"
                                                       readonly>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="termination_reason">termination reason</label>
                                            <input type="text" class="form-control" name="termination_reason"
                                                   id="termination_reason"
                                                   value="{{ old('termination_reason') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 row">
                                        <div class="form-group col-md-6">
                                            <label for="annual_vacation_balance">Annual vacation balance</label>
                                            <input type="text" class="form-control" name="annual_vacation_balance"
                                                   id="annual_vacation_balance"
                                                   value="{{ old('annual_vacation_balance') }}">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label for="net_salary">Net salary</label>
                                            <input type="text" class="form-control" name="net_salary"
                                                   id="net_salary"
                                                   value="{{ old('net_salary') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 row">

                                        <div class="form-group col-md-4">
                                            <label class="custom-switch">
                                                <input type="checkbox" name="active" value="1" checked
                                                       class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">{{trans('active')}}</span>
                                            </label>
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
