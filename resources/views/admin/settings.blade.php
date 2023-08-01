@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="card">
                <form id="setting_form" action="javascript:">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($setting) ? $setting->id : 0 }}">
                    <div class="row">
                        <div class="col-8">
                            <div class="card-header">
                                <h4>Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input placeholder="Title here" value=" {{isset($setting) ? $setting->meta_title : '' }}" name="meta_title" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea placeholder="Description here" name="meta_description"
                                              class="form-control">{{isset($setting) ? $setting->meta_description : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords</label>
                                    <input type="text" name="meta_keywords" placeholder="mobile, app, best"  value="{{isset($setting) ? $setting->meta_description : '' }}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Header Scripts</label>
                                    <textarea placeholder="Header Scripts" rows="5" name="header_script"
                                              class="w-100 focus-ring-danger p-2">{{isset($setting) ? $setting->meta_description : '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Footer Scripts</label>
                                    <textarea placeholder="Footer Scripts" name="footer_script" rows="5"
                                              class="w-100 focus-ring-danger p-2">{{isset($setting) ? $setting->meta_description : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-5 p-5" >
                            <div class="form-group">
                                <div style="background-image: url('{{isset($setting) ? (asset("public/assets/images/".$setting->logo)) : '' }}')" id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose Logo</label>
                                    <input  onchange="profile_image();" type="file" name="logo" id="image-upload"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Primary Color</label>
                                <input placeholder="Title here" value="{{isset($setting) ? $setting->primary_color : '' }}" type="color" name="primary_color" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Secondary Color</label>
                                <input placeholder="Title here" {{isset($setting) ? $setting->secondary_color : '' }} type="color" name="secondary_color"
                                       class="form-control">
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
        function profile_image() {
            $('#image-preview').css("background-image", "url(" + URL.createObjectURL(event.target.files[0]) + ")")
        }

        $('#setting_form').submit(function (e) {
            e.preventDefault();
            let data = new FormData(this);
            let a = function () {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            };
            let arr = [a];
            call_ajax_with_functions('', '{{ route('postSetting') }}', data, arr);
        });
    </script>

@endsection
