<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ trans('dashboard') }}</title>

    <!--favicon -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>

    <!--app.css css-->
    <link rel="stylesheet" href="{{asset('assets/css/admin.app.css')}}">

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('assets/css/admin.app.rtl.css')}}">
    @endif

  @yield('css')
</head>

<body class="app ">

<!--Header Style -->
<div class="wave -three"></div>

<!--loader -->
<div id="spinner"></div>

<!--app open-->
<div id="app" class="page">
    <div class="main-wrapper">

        <!--nav open-->
        <nav class="navbar navbar-expand-lg main-navbar">
            <a class="header-brand" href="{{ route('admin.home.index') }}">
                <img src="{{ url('assets/img/Icons/logo.png') }}" class="header-brand-img" alt="Splite-Admin  logo">
            </a>
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-2">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link toggle"><i class="fa fa-reorder"></i></a>
                    </li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link d-md-none navsearch"><i
                                class="fa fa-search"></i></a></li>
                </ul>
                {{--<div class="search-element mr-3">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <span class="Search-icon"><i class="fa fa-search"></i></span>
                </div>--}}
            </form>
            <ul class="navbar-nav nav bar-right">


                <li class="dropdown dropdown-list-toggle d-none d-lg-block">
                    <a href="#" class="nav-link nav-link-lg full-screen-link">
                        <i class="fa fa-expand " id="fullscreen-button"></i>
                    </a>
                </li>

                <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link  nav-link-lg ">
                        @if(auth()->user()->type == 2) <span class="badge badge-secondary nav-link-badge">{{count(\App\Models\Notification::all()->where('read_at' , null))}}</span>  @else<span class="badge badge-secondary nav-link-badge">{{count(auth()->user()->unreadnotifications)}}</span>@endif<i class="fa fa-bell-o"></i></a>
                    <div class="dropdown-menu dropdown-list dropdown-menu-right">
                        <div class="dropdown-header">Notifications
                            <div class="float-right">
                                <a href="#" class="text-white">View All</a>
                            </div>
                        </div>
                        <div class="dropdown-list-content">
                         @if(auth()->user()->type == 2)
                           @foreach(\App\Models\Notification::all()->where('read_at' , null) as $notification)
                            <a href="{{route('admin.user.vacations.edit' , ['user'=>$notification->notifiable_id ,'vacation'=>38])}}" class="dropdown-item">
                                <i class="fa fa-comment text-primary"></i>
                                <div class="dropdown-item-desc">
                                    <b>{{$notification->type}}</b> <div class="float-right"></div>
                                </div>
                            </a>
                            @endforeach
                         @else
                                @foreach(auth()->user()->unreadnotifications as $notification)
                                    @if ($notification->date['data']['user']['type'] == 1)
                                    <a href="#" class="dropdown-item">
                                        <i class="fa fa-comment text-primary"></i>
                                        <div class="dropdown-item-desc">
                                            <b>{{$notification->data['user']['name']}}</b> <div class="float-right"></div>
                                        </div>
                                    </a>
                                    @endif
                                @endforeach

                         @endif

                        </div>
                    </div>
                </li>

                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg d-flex">
                                <span class="mr-3 mt-2 d-none d-lg-block ">
                                    <span class="text-white">{{trans('hello')}},<span
                                            class="ml-1">{{auth()->user()->name}}</span></span>
                                </span>
                        <span>
                                    <img src="{{ asset( auth()->user()->image) }}" alt="{{auth()->user()->name}}"
                                         class="rounded-circle w-32 mr-2">
                                </span>
                    </a>
                    <div class="dropdown-menu ">
                        {{--
                        <a class="dropdown-item" href="profile.html"><i class="mdi mdi-account-outline mr-2"></i><span>My profile</span></a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-settings mr-2"></i><span>Settings</span></a>
                        <a class="dropdown-item" href="#"><i class=" mdi mdi-message-outline mr-2"></i> <span>Mails</span></a>
                        <a class="dropdown-item" href="#"><i class=" mdi mdi-account-multiple-outline mr-2"></i> <span>Friends</span></a>
                        <a class="dropdown-item" href="#"><i class="fe fe-calendar mr-2"></i> <span>Activity</span></a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-compass-outline mr-2"></i> <span>Support</span></a>
                        --}}
                        <a class="dropdown-item" href="{{ route('admin.auth.logout') }}"><i
                                class="mdi  mdi-logout-variant mr-2"></i> <span>{{trans('logout')}}</span></a>
                    </div>
                </li>
            </ul>
        </nav>
        <!--nav closed-->

        <!--aside open-->

    @yield('sidebar', View::make('admin.sidebar'))
    <!--aside closed-->

    @yield('content')

    <!--Footer-->
        <footer class="main-footer">
            <div class="text-center">
                Copyright &copy;Lodex 2016. Design By<a href="http://www.lodex-solutions.com"> Lodex</a>
            </div>
        </footer>
        <!--/Footer-->

        <!-- Popupchat open-->
        <div class="popup-box chat-popup" id="qnimate">
            <div class="popup-head">
                <div class="popup-head-left pull-left"><img src="{{ url('assets/img/avatar/avatar-3.jpeg') }}"
                                                            alt="iamgurdeeposahan" class="mr-2"> Alica Nestle
                </div>
                <div class="popup-head-right pull-right">
                    <div class="btn-group">
                        <button class="chat-header-button" data-toggle="dropdown" type="button" aria-expanded="false">
                            <i class="glyphicon glyphicon-cog"></i></button>
                        <ul role="menu" class="dropdown-menu dropdown-menu-right">
                            <li><a href="#">Media</a></li>
                            <li><a href="#">Block</a></li>
                            <li><a href="#">Clear Chat</a></li>
                            <li><a href="#">Email Chat</a></li>
                        </ul>
                    </div>
                    <button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i
                            class="glyphicon glyphicon-off"></i></button>
                </div>
            </div>
            <div class="popup-messages">
                <div class="direct-chat-messages">
                    <div class="chat-box-single-line">
                        <abbr class="timestamp">December 15th, 2018</abbr>
                    </div>
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name float-left">Alica Nestle</span>
                            <span class="direct-chat-timestamp float-right">7:40 Am</span>
                        </div>
                        <img class="direct-chat-img" src="{{ url('assets/img/avatar/avatar-3.jpeg') }}"
                             alt="message user image">
                        <div class="direct-chat-text">
                            Hello. How are you today?
                        </div>
                    </div>
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name float-right">Roberts</span>
                            <span class="direct-chat-timestamp float-left">8:05 Am</span>
                        </div>
                        <img class="direct-chat-img" src="{{ url('assets/img/avatar/avatar-2.jpeg') }}"
                             alt="message user image">
                        <div class="direct-chat-text">
                            I'm fine. Thanks for asking!
                        </div>
                    </div>
                    <div class="chat-box-single-line  mb-3">
                        <abbr class="timestamp">December 14th, 2018</abbr>
                    </div>
                    <div class="direct-chat-msg doted-border">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name float-left">Alica Nestle</span>
                            <span class="direct-chat-timestamp float-right">6:20 Am</span>
                        </div>
                        <img alt="iamgurdeeposahan" src="{{ url('assets/img/avatar/avatar-3.jpeg') }}"
                             class="direct-chat-img"><!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                            Hey bro, how’s everything going ?
                        </div>
                        <div class="direct-chat-msg right">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name float-right">Roberts</span>
                                <span class="direct-chat-timestamp float-left">7:05 Am</span>
                            </div>
                            <img class="direct-chat-img" src="{{ url('assets/img/avatar/avatar-2.jpeg') }}"
                                 alt="message user image">
                            <div class="direct-chat-text">
                                Nothing Much!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popup-messages-footer">
                <textarea id="status_message" placeholder="Type a message..." rows="10" cols="40"
                          name="message"></textarea>
                <div class="btn-footer">
                    <button class="bg_none"><i class="glyphicon glyphicon-film"></i></button>
                    <button class="bg_none"><i class="glyphicon glyphicon-camera"></i></button>
                    <button class="bg_none"><i class="glyphicon glyphicon-paperclip"></i></button>
                    <button class="bg_none pull-right"><i class="glyphicon glyphicon-thumbs-up"></i></button>
                </div>
            </div>
        </div>
        <!-- Popupchat closed -->

    </div>
</div>
<!--app closed-->

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<!--Jquery.min js-->
<script src="{{asset('assets/js/admin.app.js')}}"></script>


<script>
    $(document).ready(function () {
        $("input[id='active']").click(function () {
            var url = '{{ route("api.model.active") }}';

            var defaultRadioValue = $(this).val();
            $(this).val(0);
            if (defaultRadioValue == 0) {
                $(this).val(1);
            }

            var dataModel = $(this).attr('data-model');
            var dataId = $(this).attr('data-id');

            $.ajax({
                url: url,
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    'active': $(this).val(),
                    'modelName': dataModel,
                    'modelId': dataId
                },

                success: function (data) {
                    var alertMessage = '{{trans('disabled_successfully')}}';

                    if (data.active == 1) {
                        alertMessage = '{{trans('active_successfully')}}';
                    }
                    toastr.success(alertMessage, '{{trans("success")}}', {
                        positionClass: "toast-bottom-right",
                        closeButton: true
                    })
                },
                error: function () {
                }
            });
        });

    });

    $('#parent').on('change', function () {
        var parent = this.value;
        $.ajax({
            url: '{{ route("api.locations") }}',
            type: 'get',
            data: {_token: '{{ csrf_token() }}', 'parent': parent},

            success: function (data) {
                var html = '<option value ="">{{ trans("select_city") }}</option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html +=
                        '<option value ="' + data[i].id + '" >' + data[i].name + '</option>';
                }
                $('#location_id').html(html);
            },
            error: function () {
            }
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function() {
        demo.initFullCalendar();
    });
</script>

@yield('scripts')
</body>
</html>
