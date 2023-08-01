@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="card">
                <form id="hero_section_form" action="javascript:">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($hero_sec) ? $hero_sec->id : 0 }}">
                    <div class="row">
                        <div class="col-8">
                            <div class="card-header">
                                <h4> Home Hero Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="title" type="text" placeholder="Title here"
                                           value="{{isset($hero_sec) ? $hero_sec->title : '' }}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Sub Title</label>
                                    <input type="text" name="sub_title" placeholder="Sub Title  Here"
                                           value="{{isset($hero_sec) ? $hero_sec->sub_title : '' }}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Button Text</label>
                                    <input type="text" name="btn_text" placeholder="Button Text Here"
                                           value="{{isset($hero_sec) ? $hero_sec->btn_text : '' }}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Button Link</label>
                                    <input type="text" name="btn_link" placeholder="Button Link"
                                           value="{{isset($hero_sec) ? $hero_sec->btn_link : '' }}"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Icons Title</label>
                                    <input type="text" name="icon_title" placeholder="Button Text Here"
                                           value="{{isset($hero_sec) ? $hero_sec->icon_title : '' }}"
                                           class="form-control">
                                </div>

                                <div style="display: flex; justify-content: space-between;">
                                    <div><h6>Icon Images With Text</h6></div>
                                    <div>
                                        <i style="font-size: 25px; color: green; cursor: pointer;"
                                           class="fas fa-plus-square float-right" id="icon_add">

                                        </i>
                                    </div>
                                </div>
                                <div id="icons_div">
                                    @if(isset($hero_sec) && $hero_sec->icons)
                                        @foreach(json_decode($hero_sec->icons ,true)  as $key=> $icon)
                                            <div class="row justify-content-center align-items-center icons_count"
                                                 id="icon_parent">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Icon Text</label>
                                                        <input type="text" name="icons[old][{{$key}}][text]"
                                                               placeholder="Icon Title"
                                                               class="form-control"
                                                               value="{{$icon['text']}}">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Icon</label>
                                                        <div
                                                            style="width: 150px; height:100px;background-image: url('{{isset($hero_sec) ? (asset("public/assets/images/".$icon['image'])) : '' }}')"
                                                            id="image-preview" class="image-preview">
                                                            <input type="hidden" value="{{$icon['image']}}"
                                                                   name="icons[old][{{$key}}][image]"
                                                                   id="image-upload"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <i style="font-size: 25px; color: red; cursor: pointer;"
                                                       class="fas fa-window-close" id="remove_icon"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row justify-content-center align-items-center icons_count"
                                         id="icon_parent">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Icon Text</label>
                                                <input type="text" name="icons[][text]"
                                                       placeholder="Icon Title"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Icon</label>
                                                <div
                                                    style="width: 150px; height:100px;background-image: url('{{isset($hero_sec) ? (asset("public/assets/images/".$hero_sec->logo)) : '' }}')"
                                                    id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Choose Icon</label>
                                                    <input onchange="profile_image(this);" type="file"
                                                           name="icons[][image]"
                                                           id="image-upload"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <i style="font-size: 25px; color: red; cursor: pointer;"
                                               class="fas fa-window-close" id="remove_icon"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" placeholder="Description"
                                              class="form-control"> {{isset($hero_sec) ? $hero_sec->description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-5 p-5">
                            <div class="form-group">
                                <div
                                    style="background-image: url('{{isset($hero_sec) ? (asset("public/assets/images/".$hero_sec->banner)) : '' }}')"
                                    id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose Banner</label>
                                    <input onchange="profile_image(this);" type="file" name="banner" id="image-upload"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 py-3 text-center">
                            <input type="submit" href="#" class="w-25 btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        {{--        just to append--}}
        <div class="d-none">
            <div class="append_div">
                <div class="row justify-content-center align-items-center icons_count " id="icon_parent">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Icon Text</label>
                            <input type="text" name="icons[][text]"
                                   placeholder="Icon Title"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label>Icon</label>
                            <div
                                style="width: 150px; height:100px;"
                                id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose Icon</label>
                                <input onchange="profile_image(this);" type="file" name="icons[][image]"
                                       id="image-upload"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <i style="font-size: 25px; color: red; cursor: pointer;"
                           class="fas fa-window-close" id="remove_icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script>
        function profile_image(e) {
            $(e).parents('.image-preview').css("background-image", "")
            $(e).parents('.image-preview').css("background-image", "url(" + URL.createObjectURL(event.target.files[0]) + ")")
        }

        $("body").on("click", '#remove_icon', function (e) {
            $(this).parents('#icon_parent').remove();
        });
        $("body").on("click", '#icon_add', function () {
            var numItems = $('.icons_count').length;
            if (numItems <= 5) {
                $("#icons_div").append($('.append_div').html());
            } else {
                swal("Failure", "Only 5 Icons Can be Added", "error");
            }
        });


        $('#hero_section_form').submit(function (e) {
            e.preventDefault();
            let data = new FormData(this);
            let a = function () {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            };
            let arr = [a];
            call_ajax_with_functions('', '{{ route('postHero_section') }}', data, arr);
        });
    </script>

@endsection
