@extends('admin.layout.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Posts</h4>
                            <a href="{{route('add_post')}}" class="btn btn-success">Add Post</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Post Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($blogs as $key => $blog)
                                        <tr>
                                            <td>
                                                {{$key+1}}
                                            </td>
                                            <td>
                                                <img alt="image" src="{{asset('public/assets/images/'.$blog->image)}}"
                                                     width="35">
                                            </td>
                                            <td>{{$blog->title ? $blog->title : 'No Title'}}</td>
                                            <td class="align-middle">
                                                {{$blog->slug ? $blog->slug : 'No slug'}}
                                            </td>

                                            <td>{{$blog->created_at ? $blog->created_at : ''}}</td>
                                            <td>
                                                <div
                                                    class="badge {{$blog->status == 1 ? 'badge-success' : 'badge-danger'}} badge-shadow">{{$blog->status == 1 ? 'Published' : 'Draft'}}</div>
                                            </td>
                                            <td><i class="text-danger" onclick="delete_post({{$blog->id}})"
                                                   style="cursor: pointer" data-feather="trash-2"></i>
                                                <a href="{{route('edit_post',$blog->id)}}"> <i class="text-warning"
                                                                                               data-feather="edit"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        No Blogs Found
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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


        function delete_post(id) {
            swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        let data = new FormData();
                        data.append('_token','{{csrf_token()}}')
                        data.append('id',id)
                        let a = function () {
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
                        };
                        let arr = [a];
                        call_ajax_with_functions('', '{{ route('delete_post') }}', data, arr);

                    }
                });
        }
    </script>

@endsection
