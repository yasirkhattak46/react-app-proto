@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="card">
                <form id="pages_form" action="javascript:">
                    @csrf
                    <input type="hidden" name="id" value="{{isset($pages) ? $pages->id : 0 }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h4>Pages</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>About US</label>
                                    <textarea name="about_us" class="summernote">
                                        {{isset($pages) ? $pages->about_us : '' }}
                         </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Privacy Policy</label>
                                    <textarea name="privacy_policy" class="summernote">
                                        {{isset($pages) ? $pages->privacy_policy : '' }}
                         </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Contact Us</label>
                                    <textarea name="contact" class="summernote">
                                        {{isset($pages) ? $pages->contact : '' }}
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
        $('#pages_form').submit(function (e) {
            e.preventDefault();
            let data = new FormData(this);
            let a = function () {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            };
            let arr = [a];
            call_ajax_with_functions('', '{{ route('pages_submit') }}', data, arr);
        });
    </script>

@endsection
