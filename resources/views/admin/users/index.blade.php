@extends('admin.layout')

@section('content')

    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">{{trans('users')}}</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-light-color">{{trans('home')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('users')}}</li>
                </ol>
            </div>
            <!--page-header closed-->
            <!--row open-->
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{trans('filter_by')}}</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" type="get" action="{{ route("admin.users.index") }}">
                                <div class="form-group row">

                                    <div class="col-md-3">
                                        <input type="text" placeholder="name" class="form-control"
                                               value="{{ request("name") }}" name="name">
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" placeholder="machine code" class="form-control"
                                               value="{{ request("machine_code") }}" name="machine_code">
                                    </div>

                                    <div class="col-md-3">
                                        <input type="text" placeholder="mobile number" class="form-control"
                                               value="{{ request("mobile_number") }}" name="mobile_number">
                                    </div>

                                </div>


                                <button type="submit" class="btn btn-primary mt-1 mb-0">{{ trans("search") }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--row closed-->
            <div class="section-body">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <span class="table-add float-right">

                                    <a href="{{ route('admin.users.create') }}" class="btn btn-icon">
                                        <i class="fa fa-plus fa-1x" aria-hidden="true"></i>
                                    </a>

                            </span>
                                <h4>
                                    {{trans('users_list')}}
                                </h4>


                            </div>

                            <div class="card-body">
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                                        <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                            <div class="alert-title">Success</div>
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 1px">#</th>
                                            <th>name</th>
                                            <th>machine code</th>
                                            <th>mobile number</th>
                                            <th>medical number</th>

                                            <th>email</th>
                                            <th>image</th>
                                            <th style="width: 1px">status</th>
                                            <th style="width: 1px">actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($list as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->machine_code }}</td>
                                                <td>{{ $user->mobile_number }}</td>
                                                <td>{{ $user->medical_number }}</td>

                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if($user->image)
                                                        <img style="width: 70px; height: 70px;"
                                                             src="{{ url( $user->image) }} ">

                                                    @endif
                                                </td>

                                                <td>
                                                    <label class="custom-switch">
                                                        <input type="checkbox" name="active" id="active"
                                                               data-model="{{get_class($user)}}"
                                                               data-id="{{ $user->id }}"
                                                               value="{{ $user->active }}"
                                                               {{ $user->active ? 'checked' : '' }} class="custom-switch-input">
                                                        <span class="custom-switch-indicator publish"></span>
                                                    </label>
                                                </td>


                                                <td>
                                                    <div class="btn-group dropdown">
                                                        <button type="button"
                                                                class="btn btn-sm btn-info m-b-5 m-t-5 dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <i class="fa-cog fa"></i>
                                                        </button>


                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item has-icon"
                                                               href="{{ route('admin.users.edit', ['user' => $user->id]) }}">
                                                                <i class="fa fa-edit"></i>{{trans("edit")}}
                                                            </a>

                                                            <a class="dropdown-item has-icon"
                                                               href="{{ route('admin.user.papers.index', ['user' => $user->id]) }}">
                                                                <i class="fa fa-map-marker"></i> Papers
                                                            </a>

                                                            <a class="dropdown-item has-icon"
                                                               href="{{ route('admin.user.vacations.index', ['user' => $user->id]) }}">
                                                                <i class="fa fa-map-marker"></i> Vacations
                                                            </a>

                                                            <button type="button" class="dropdown-item has-icon"
                                                                    data-toggle="modal"
                                                                    data-target="#delete_model_{{ $user->id }}">
                                                                <i class="fa fa-trash"></i> {{trans("remove")}}
                                                            </button>

                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-center">
                                    {{ $list->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

        </section>
    @foreach ($list as $user)
        <!-- Message Modal -->
            <div class="modal fade" id="delete_model_{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">{{trans("delete")}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="Post">
                            @method('DELETE')
                            @csrf
                            <div class="modal-body">

                                {{trans("delete_confirmation_message")}}

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success"
                                        data-dismiss="modal">{{trans("close")}}</button>
                                <button type="submit" class="btn btn-primary">{{trans("delete")}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Message Modal closed -->
        @endforeach
    </div>
@stop
