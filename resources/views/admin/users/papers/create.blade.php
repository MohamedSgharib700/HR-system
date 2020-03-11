@extends('admin.layout')

@section('content')
    <div class="app-content">
        <section class="section">
            <!--page-header open-->
            <div class="page-header">
                <h4 class="page-title">papers</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"
                                                   class="text-light-color">{{trans('home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.user.papers.index', ['user' => $user->id]) }}"
                                                   class="text-light-color">papers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('new')}}</li>
                </ol>
            </div>
            <!--page-header closed-->
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4> new paper</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.errors')
                                <form action="{{ route('admin.user.papers.store',['user'=>$user->id]) }}"
                                      enctype="multipart/form-data" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$user->id}}">


{{--                                    <div class="form-group col-md-12">--}}
{{--                                        <div class="row">--}}

{{--                                            <div class="form-group col-md-6">--}}
{{--                                                <label for="image">identifier</label>--}}
{{--                                                <input type="text" name="identifier[]" value="National ID card front" readonly required />--}}
{{--                                                <div class="input-group">--}}
{{--                                                    <div class="col-xl-6 col-lg-12 col-md-12 userprofile">--}}
{{--                                                        <div class="userpic mb-2">--}}
{{--                                                            <img src='{{ url("/") }}/assets/img/avatar/avatar-3.jpeg'--}}
{{--                                                                 class="userpicimg" id="upload_img_National_ID_card1">--}}
{{--                                                            <input type="file" name="image[]"--}}
{{--                                                                   onchange='readURL(this, "upload_img_National_ID_card1");'>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="text-center">--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="form-group col-md-6">--}}
{{--                                                <label for="image">identifier</label>--}}
{{--                                                <input type="text" name="identifier[]" value="National ID card Back" readonly required />--}}
{{--                                                <div class="input-group">--}}
{{--                                                    <div class="col-xl-6 col-lg-12 col-md-12 userprofile">--}}
{{--                                                        <div class="userpic mb-2">--}}
{{--                                                            <img src='{{ url("/") }}/assets/img/avatar/avatar-3.jpeg'--}}
{{--                                                                 class="userpicimg" id="upload_img_National_ID_card2">--}}
{{--                                                            <input type="file" name="image[]"--}}
{{--                                                                   onchange='readURL(this, "upload_img_National_ID_card2");'>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="text-center">--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="form-group col-md-12 ">
                                        <div class="form-group col-md-12">
                                            <button type="button" class="btn btn-primary btn-block add_field_button">Add
                                                Paper
                                            </button>
                                        </div>

                                        <div class="all row input_fields_wrap"></div>
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
@endsection


@section('scripts')


    <script type="text/javascript">
        $(document).ready(function () {
            //   alert('1');
            var max_fields = 20; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            var id = 1; //initlal text box count
            $(add_button).click(function (e) { //on add input button click

                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    id++; //text box increment
                    var html = '  <div class="form-group col-md-6 ">';
                    html += '<label for="image"><a href="#" class="remove_field">Remove</a></label>';
                    html += ' <label for="identifier">identifier</label>';
                    html += ' <input type="text" name="identifier[]" required />';

                    html += '<div class="form-group col-md-8">'
                    html += ' <div class="form-group col-md-8">';

                    html += '<div class="input-group">';
                    html += '<div class="col-xl-6 col-lg-12 col-md-12 userprofile">';
                    html += '<div class="userpic mb-2">';
                    html += '  <img src=\'{{ url("/") }}/assets/img/avatar/avatar-3.jpeg\' class="userpicimg" id="upload_img' + id + '">';
                    html += ' <input type="file" name="image[]" class="image_gallery " onchange=\'readURL(this, "upload_img' + id + '")\'>';

                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';

                    html += '</div>';
                    $(wrapper).append(html); //add input box

                }
            });
            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text

                e.preventDefault();

                $(this).parent().parent('div').remove();
                x--;
            })

        });

        function deleteimage(image_id) {
            var answer = confirm("Are you sure you want to delete from this post?");
            if (answer) {

                $(".imagelocation" + image_id).hide();
                $.ajax({
                    type: "Get",
                    url: "<?php echo url('admin/delete_gallery_ajax'); ?>",
                    data: {id: image_id},
                    dataType: 'json', // Define data type will be JSON
                    success: function (response) {

                        if (response > 0) {
                            $(".imagelocation" + image_id).remove(".imagelocation" + image_id);

                        }

                    },
                    error: function (err) {
                        console.log(err.error);
                    }
                });
            }
        }

        //


    </script>


@stop
