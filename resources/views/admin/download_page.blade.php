@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="card">
                <form id="download_form" action="javascript:">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($download) ? $download->id : 0 }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h4>Download Page</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" placeholder="Title"
                                           value="{{isset($download) ? $download->title : '' }}"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="summernote">
                                        {{isset($download) ? $download->description : '' }}
                         </textarea>
                                </div>
                                <div style="display: flex; justify-content: space-between;">
                                    <div><h6>Button Link & Text</h6></div>
                                    <div>
                                        <i style="font-size: 25px; color: green; cursor: pointer;"
                                           class="fas fa-plus-square float-right" id="icon_add">

                                        </i>
                                    </div>
                                </div>
                                <div id="download_div">
                                    @if(isset($download))
                                        @foreach(json_decode($download->downloads ,true)  as $key=> $dwnlod)
                                            <div class="row justify-content-center align-items-center download_count"
                                                 id="download_parent">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Button Text</label>
                                                        <input type="text" name="downloads[{{$key}}][text]"
                                                               placeholder="Download Text"
                                                               class="form-control"
                                                               value="{{$dwnlod['text']}}">
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Button Link</label>
                                                        <input type="url" name="downloads[{{$key}}][link]"
                                                               placeholder="Download Link"
                                                               class="form-control"
                                                               value="{{$dwnlod['link']}}">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <i style="font-size: 25px; color: red; cursor: pointer;"
                                                       class="fas fa-window-close" id="remove_download"></i>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row justify-content-center align-items-center download_count"
                                             id="download_parent">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label>Button Text</label>
                                                    <input type="text" name="downloads[0][text]"
                                                           placeholder="Button Text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label>Button Link</label>
                                                    <input type="text" name="downloads[0][link]"
                                                           placeholder="Button Link"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <i style="font-size: 25px; color: red; cursor: pointer;"
                                                   class="fas fa-window-close" id="remove_download"></i>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label>Main Content</label>
                                    <textarea name="main_content" class="summernote">
                                        {{isset($download) ? $download->main_content : '' }}
                         </textarea>
                                </div>
                            </div>
                            <div class="col-12 py-3 text-center">
                                <input type="submit" href="#" class="w-25 btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div>
@endsection
@section('footer_script')
    <script>
        $("body").on("click", '#remove_download', function (e) {
            $(this).parents('#download_parent').remove();
        });

        $("body").on("click", '#icon_add', function () {
            var numItems = $('.download_count').length;
            if (numItems <= 10) {
                $("#download_div").append('<div class="row justify-content-center align-items-center download_count " id="download_parent"> <div class="col-5"> <div class="form-group"> <label>Download Text</label> <input type="text" name="downloads[' + numItems + '][text]" placeholder="Download Text" class="form-control"> </div> </div> <div class="col-5"> <div class="form-group"> <label>Download Link</label> <input type="text" name="downloads[' + numItems + '][link]" placeholder="Download Link" class="form-control"></div> </div> <div class="col-2"> <i style="font-size: 25px; color: red; cursor: pointer;" class="fas fa-window-close" id="remove_download"></i> </div> </div>');
            } else {
                swal("Failure", "Only 10 FAQ Can be Added", "error");
            }
        });

        $('#download_form').submit(function (e) {
            e.preventDefault();
            let data = new FormData(this);
            let a = function () {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            };
            let arr = [a];
            call_ajax_with_functions('', '{{ route('post_download') }}', data, arr);
        });
    </script>

@endsection
