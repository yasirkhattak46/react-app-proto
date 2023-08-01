@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="card">
                <form id="setting_form" action="javascript:">
                    @csrf
                    @if(isset($post))
                        <input type="hidden" name="id" value="{{isset($post) ? $post->id : 0 }}">
                    @endif
                    <div class="row">
                        <div class="col-8">
                            <div class="card-header">
                                <h4>Add Post</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input id="title_to_slug" placeholder="Title here" value="{{isset($post) ? $post->title : '' }}"
                                           name="title" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>slug</label>
                                    <input id="post_Slug" placeholder="Title here" value="{{isset($post) ? $post->slug : '' }}"
                                           name="slug" type="text" readonly class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Keywords</label>
                                    <input placeholder="Title here"
                                           value=" {{isset($post) ? $post->keywords : '' }}" name="keywords"
                                           type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea placeholder="Description here" name="description"
                                              class="form-control">{{isset($post) ? $post->description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-5 p-5">
                            <div class="form-group">
                                <div
                                    style="background-image: url('{{isset($post) ? (asset("public/assets/images/".$post->image)) : '' }}')"
                                    id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose Logo</label>
                                    <input onchange="profile_image();" type="file" name="image" id="image-upload"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option {{isset($post) && $post->status == 1 ? 'selected' : '' }} value="1">Publish</option>
                                    <option {{isset($post) && $post->status == 0 ? 'selected' : '' }} value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 p-5">
 <textarea name="main_content" class="summernote">
                                        {{isset($post) ? $post->main_content : '' }}
                                     </textarea></div>
                        <div class="col-12 py-3 text-center">
                            <input type="submit" href="#" class="w-25 btn btn-primary" value="POST">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('footer_script')
    <script>
        function profile_image() {
            $('#image-preview').css("background-image", "url(" + URL.createObjectURL(event.target.files[0]) + ")")
        }

        $('#title_to_slug').keyup(function () {
            let title = $(this).val();
           let slug = title.replace(/[^a-zA-Z0-9\s]/g,"").toLowerCase().replace(/\s/g,'-');
            $("#post_Slug").val(slug);
        })

        $('#setting_form').submit(function (e) {
            e.preventDefault();
            let data = new FormData(this);
            let a = function () {
                setTimeout(function () {
                    window.location.href = '{{route('blogs')}}';
                }, 1000);
            };
            let arr = [a];
            call_ajax_with_functions('', '{{ route('blog_post') }}', data, arr);
        });
    </script>

@endsection
