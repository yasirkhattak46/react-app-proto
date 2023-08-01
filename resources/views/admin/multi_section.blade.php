@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="card">
                <form id="feature_section_form" action="javascript:">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($multi_sec) ? $multi_sec->id : 0 }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h4> Home Multi Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    @php $color_content = (isset($multi_sec->color_content) && $multi_sec->color_content != null) ? (json_decode($multi_sec->color_content)) : null @endphp
                                    <div id="editor_div">
                                        <div class="d-flex editor_parent">
                                        <textarea name="color_content[]" class="summernote">
                                        {{isset($color_content[0]) ? $color_content[0] : '' }}
                                     </textarea>
                                        </div>
                                        <div class="d-flex editor_parent">
                                        <textarea name="color_content[]" class="summernote">
                                        {{isset($color_content[1]) ? $color_content[1] : '' }}
                                     </textarea>

                                        </div>
                                        <div class="d-flex editor_parent">
                                        <textarea name="color_content[]" class="summernote">
                                        {{isset($color_content[2]) ? $color_content[2] : '' }}
                                     </textarea>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label>Apps Title</label>
                                    <input type="text" name="apps_title" placeholder="Apps Title"
                                           value="{{isset($multi_sec) ? $multi_sec->apps_title : '' }}"
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
                                    @if(isset($multi_sec) && $multi_sec->apps_icon)
                                        @foreach(json_decode($multi_sec->apps_icon ,true)  as $key=> $icon)
                                            <div class="row justify-content-center align-items-center icons_count"
                                                 id="icon_parent">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Icon Text</label>
                                                        <input type="text" name="apps_icon[old][{{$key}}][text]"
                                                               placeholder="Icon Title"
                                                               class="form-control"
                                                               value="{{$icon['text']}}">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Icon</label>
                                                        <div
                                                            style="width: 150px; height:100px;background-image: url('{{isset($multi_sec) ? (asset("public/assets/images/".$icon['image'])) : '' }}')"
                                                            id="image-preview" class="image-preview">
                                                            <input type="hidden" value="{{$icon['image']}}"
                                                                   name="apps_icon[old][{{$key}}][image]"
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
                                                <input type="text" name="apps_icon[][text]"
                                                       placeholder="Icon Title"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Icon</label>
                                                <div
                                                    style="width: 150px; height:100px;background-image: url('{{isset($multi_sec) ? (asset("public/assets/images/".$multi_sec->logo)) : '' }}')"
                                                    id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">Choose Icon</label>
                                                    <input onchange="profile_image(this);" type="file"
                                                           name="apps_icon[][image]"
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
                                    <h6>FAQS Title</h6>
                                    <input type="text" name="faq_title" placeholder="Faq Title"
                                           value="{{isset($multi_sec) ? $multi_sec->faq_title : '' }}"
                                           class="form-control">
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <div><h6>FAQS</h6></div>
                                    <div>
                                        <i style="font-size: 25px; color: green; cursor: pointer;"
                                           class="fas fa-plus-square float-right" id="faq_add">

                                        </i>
                                    </div>
                                </div>
                                <div id="faq_div">
                                    @if(isset($multi_sec) && $multi_sec->faqs)
                                        @foreach(json_decode($multi_sec->faqs ,true)  as $key=> $faq)
                                            <div class="row justify-content-center align-items-center faq_count"
                                                 id="faq_parent">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>FAQ Question</label>
                                                        <input type="text" name="faqs[{{$key}}][question]"
                                                               placeholder="FAQ Question"
                                                               class="form-control"
                                                               value="{{$faq['question']}}">
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>FAQ Answer</label>
                                                        <input type="text" name="faqs[{{$key}}][answer]"
                                                               placeholder="FAQ Answer"
                                                               class="form-control"
                                                               value="{{$faq['answer']}}">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <i style="font-size: 25px; color: red; cursor: pointer;"
                                                       class="fas fa-window-close" id="remove_faq"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="row justify-content-center align-items-center faq_count"
                                         id="faq_parent">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label>FAQ Question</label>
                                                <input type="text" name="faqs[0][question]"
                                                       placeholder="FAQ Question"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label>FAQ Answer</label>
                                                <input type="text" name="faqs[0][answer]"
                                                       placeholder="FAQ Answer"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <i style="font-size: 25px; color: red; cursor: pointer;"
                                               class="fas fa-window-close" id="remove_faq"></i>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <h6>Main Content</h6>
                                    <textarea name="main_content" id="editor" class="summernote">
                                        {{isset($multi_sec) ? $multi_sec->content : '' }}
                                     </textarea>
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
                            <input type="text" name="apps_icon[][text]"
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
                                <input onchange="profile_image(this);" type="file" name="apps_icon[][image]"
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
            if (numItems <= 36) {
                $("#icons_div").append($('.append_div').html());
            } else {
                swal("Failure", "Only 36 Icons Can be Added", "error");
            }
        });


        // FAQ
        $("body").on("click", '#remove_faq', function (e) {
            $(this).parents('#faq_parent').remove();
        });
        $("body").on("click", '#faq_add', function () {
            var numItems = $('.faq_count').length;
            if (numItems <= 10) {
                $("#faq_div").append('<div class="row justify-content-center align-items-center faq_count " id="faq_parent"> <div class="col-5"> <div class="form-group"> <label>FAQ Question</label> <input type="text" name="faqs[' + numItems + '][question]" placeholder="FAQ Question" class="form-control"> </div> </div> <div class="col-5"> <div class="form-group"> <label>FAQ Answer</label> <input type="text" name="faqs[' + numItems + '][answer]" placeholder="FAQ Answer"class="form-control"></div> </div> <div class="col-2"> <i style="font-size: 25px; color: red; cursor: pointer;" class="fas fa-window-close" id="remove_faq"></i> </div> </div>');
            } else {
                swal("Failure", "Only 10 FAQ Can be Added", "error");
            }
        });


        $('#feature_section_form').submit(function (e) {
            e.preventDefault();
            let data = new FormData(this);
            let a = function () {
                setTimeout(function () {
                    // window.location.reload();
                }, 1000);
            };
            let arr = [a];
            call_ajax_with_functions('', '{{ route('postMulti_sec') }}', data, arr);
        });
    </script>

@endsection
