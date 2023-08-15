@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="card">
                <div class="card-body">
                <form id="download_form" action="javascript:">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($home_video) ? $home_video->id : 0 }}">
                    <div class="row">

                        <div class="col-8">
                            <label>Description</label>
                            <textarea rows="8" type="text" name="description" placeholder="Video Link"
                                      class="form-control"> {{isset($home_video) ? $home_video->description : '' }}</textarea>
                        </div>
                        <div class="col-4">
                                    <div class="form-group float-right">
                                        <div
                                            style="background-image: url('{{isset($home_video) ? (asset("public/assets/images/".$home_video->image)) : '' }}')"
                                            id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose Thumbnail</label>
                                            <input onchange="profile_image(this);" type="file" name="image" id="image-upload"/>
                                        </div>
                                    </div>
                            </div>

                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label>Video ID</label>
                                <input type="text" name="video_id" placeholder="Video ID"
                                       value="{{isset($home_video) ? $home_video->video_id : '' }}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                                <div class="form-group float-lg-right">
                                    <div
                                        style="background-image: url('{{isset($home_video) ? (asset("public/assets/images/".$home_video->thumbnail)) : '' }}')"
                                        id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose Thumbnail</label>
                                        <input onchange="profile_image(this);" type="file" name="thumbnail" id="image-upload"/>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Main Content</label>
                            <textarea name="content" class="summernote">
                                        {{isset($home_video) ? $home_video->content : '' }}
                         </textarea>
                        </div>

                    </div>
                        <div class="col-12 py-3 text-center">
                            <input type="submit" href="#" class="w-25 btn btn-primary">
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
