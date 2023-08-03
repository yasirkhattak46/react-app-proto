@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="card">
                <form id="download_form" action="javascript:">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($home_video) ? $home_video->id : 0 }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h4>Download Page</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" placeholder="Title"
                                           value="{{isset($home_video) ? $home_video->title : '' }}"
                                           class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="summernote">
                                        {{isset($home_video) ? $home_video->description : '' }}
                         </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-7 ml-3">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" placeholder="Title"
                                       value="{{isset($home_video) ? $home_video->video_id : '' }}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-body">
                            <div class="form-group">
                                <div
                                    style="background-image: url('{{isset($home_video) ? (asset("public/assets/images/".$home_video->thumbnail)) : '' }}')"
                                    id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose Banner</label>
                                    <input onchange="profile_image(this);" type="file" name="thumbnail" id="image-upload"/>
                                </div>
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

    </div>
@endsection
@section('footer_script')
    <script>
        function profile_image(e) {
            $(e).parents('.image-preview').css("background-image", "")
            $(e).parents('.image-preview').css("background-image", "url(" + URL.createObjectURL(event.target.files[0]) + ")")
        }

        $('#download_form').submit(function (e) {
            e.preventDefault();
            let data = new FormData(this);
            let a = function () {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            };
            let arr = [a];
            call_ajax_with_functions('', '{{ route('home_video_submit') }}', data, arr);
        });
    </script>

@endsection
