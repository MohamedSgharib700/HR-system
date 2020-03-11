@extends('admin.layout')
@section('css')
    <link href="../../assets/css/material-dashboard.css" rel="stylesheet">
@endsection
@section('content')

<div class="app-content">
    <section class="section">
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                 

                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card card-calendar">
                                <div class="card-content" class="ps-child">
                                    <div id="fullCalendar">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section("script")
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            initFullCalendar();
        });


        function initFullCalendar() {
            $calendar = $('#fullCalendar');

            today = new Date();
            y = today.getFullYear();
            m = today.getMonth();
            d = today.getDate();

            $calendar.fullCalendar({
                viewRender: function(view, element) {
                    // We make sure that we activate the perfect scrollbar when the view isn't on Month
                    if (view.name != 'month') {
                        $(element).find('.fc-scroller').perfectScrollbar();
                    }
                },
                header: {
                    left: 'title',
                    center: 'month,agendaWeek,agendaDay',
                    right: 'today'
                },
                defaultDate: today,
                selectable: true,
                selectHelper: true,
                views: {
                    month: { // name of view
                        titleFormat: 'MMMM YYYY'
                        // other view-specific options here
                    },
                    week: {
                        titleFormat: " MMMM D YYYY"
                    },
                    day: {
                        titleFormat: 'D MMM, YYYY'
                    }
                },

                // select: function(start, end) {
                //
                //     // on select we show the Sweet Alert modal with an input
                //     swal({
                //         title: 'Create an Event',
                //         html: '<div class="form-group">' +
                //         '<input class="form-control" placeholder="Event Title" id="input-field">' +
                //         '</div>',
                //         showCancelButton: true,
                //         confirmButtonClass: 'btn btn-success',
                //         cancelButtonClass: 'btn btn-danger',
                //         buttonsStyling: false
                //     }).then(function(result) {
                //
                //         var eventData;
                //         event_title = $('#input-field').val();
                //
                //         if (event_title) {
                //             eventData = {
                //                 title: event_title,
                //                 start: start,
                //                 end: end
                //             };
                //             $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
                //         }
                //
                //         $calendar.fullCalendar('unselect');
                //
                //     });
                // },
                editable: false,
                eventLimit: true, // allow "more" link when too many events
start
title

                // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
                events:  [
                        @php
                            $i=1 ;
                            $damanat_count = count($damanat) ;
                        @endphp
                        @foreach($damanat as $daman)

                        {
                            // id: 999,
                            title: '{{ $daman->daman_number . " - " . $daman->company->name}}',
                            start: '{{ $daman->finishing_date }}',
                            allDay: true,
                            className: 'event-rose'
                        }

                        @if($i++ <= $damanat_count)
                        ,
                        @endif
                        @endforeach
                ]
            });
        }
    </script> --}}

@endsection