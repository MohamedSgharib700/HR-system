@extends('admin.layout')

@section('content')

    <?php

    use App\Constants\VacationStatus ;

    ?>
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">Vacations</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-light-color">{{ trans('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Vacations</li>
                </ol>
            </div>
            <!--page-header closed-->
            <div class="row">
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{trans('filter_by')}}</h4>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" type="get"
                                  action="{{ route("admin.user.vacations.index", ['user' => $user->id]) }}">
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
                                               value="{{ request("phone") }}" name="phone">
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

                                        <a href="{{ route('admin.user.vacations.create', ['user' => $user->id]) }}"
                                           class="btn btn-icon"><i
                                                class="fa fa-plus fa-1x" aria-hidden="true"></i></a>

                                </span>
                                <h4>Vacations list</h4>
                            </div>

                            <div class="card-body">
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                                        <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                            <div class="alert-title">{{trans('success')}}</div>
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover mb-0 text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 1px">#</th>
                                            <th>Employee name</th>
                                            <th>Machine code</th>
                                            <th>Employee phone</th>
                                            <th>Department</th>
                                            <th>Position</th>
                                            <th>Manager approve</th>
                                            <th>HR approve</th>
                                            <th style="width: 1px">actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach ($list as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->user->machine_code }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->user->department->name }}</td>
                                                <td>{{ $item->user->position->name }}</td>
                                                <td>{{ VacationStatus::getOne($item->manager_approve) }}</td>
                                                <td>{{ VacationStatus::getOne($item->hr_approve) }}</td>



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
                                                               href="{{ route('admin.user.vacations.edit', ['user'=>$item->user_id, 'vacation' => $item->id]) }}"><i
                                                                    class="fa fa-edit"></i> {{ trans('edit') }}</a>
                                                            @if($item->hr_approve == 0 )
                                                                <a class="dropdown-item has-icon"
                                                                   href="{{ route('admin.user.vacations.show', ['user'=>$item->user_id, 'vacation' => $item->id]) }}"><i
                                                                        class="fa fa-edit"></i> View request</a>
                                                            @endif
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
            </div>
        </section>

    @foreach ($list as $item)
        <!-- Message Modal -->
            <div class="modal fade" id="delete_model_{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3">{{trans('delete')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form
                            action="{{ route('admin.user.vacations.destroy', ['user'=>$item->user_id, 'vacation' => $item->id]) }}"
                            method="Post">
                            @method('DELETE')
                            @csrf
                            <div class="modal-body">

                                {{trans('delete_confirmation_message')}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success"
                                        data-dismiss="modal">{{trans('close')}}</button>
                                <button type="submit" class="btn btn-primary">{{trans('delete')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Message Modal closed -->
        @endforeach

    </div>
@stop
