@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('directory', 'Blog')
@section('action', 'Create')
@section('main')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Add Blog</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" id="formInsert">
                    @csrf
                    <div class="row">
                        <div class="col-9">

                            <div class="form-group">
                                <label for="short_description">Short Description</label>
                                <textarea name="short_description" id="short_description" aria-describedby="short_description" class="form-control 
                                    @error('short_description')
                                          is-invalid
                                    @enderror">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                    <small id="short_description"
                                        class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" aria-describedby="description" class="form-control 
                                    @error('description')
                                          is-invalid
                                    @enderror">{{ old('description') }}</textarea>
                                @error('description')
                                    <small id="description"
                                        class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="button" class="btn btn-primary btnInsert">Add</button>

                        </div>
                        <div class="col-3">
                            
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" aria-describedby="title" placeholder="Title"
                                    value="{{ old('title') }}" class="form-control @error('title')
                                          is-invalid
                                    @enderror">
                                @error('title')
                                    <small id="title" class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mt-2">
                                <label for="image">Image</label>
                                <div class="row">
                                    <div class="col-9 m-0 p-0">
                                        <div class="form-group">
                                            <input type="text" value="" name="image" id="image" aria-describedby="image" placeholder="Input Image"
                                             class="form-control @error('image')
                                                      is-invalid
                                                @enderror">
                                            @error('image')
                                                <small id="image"
                                                    class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-3 m-0 p-0">
                                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                            data-target="#upload_image">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="">
                                    <img src="" id="show_image" width="100%" alt="">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" name="author" value="{{Auth::guard('adminAuth')->user()->name}}" id="author" aria-describedby="author" placeholder="Author"
                                    value="{{ old('author') }}" class="form-control @error('author')
                                          is-invalid
                                    @enderror">
                                @error('author')
                                    <small id="author" class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                {{-- Footer --}}
            </div>
        </div>
    </div>


    {{-- model image --}}
    <!-- Button trigger modal -->
    <div class="modal fade" id="upload_image" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ url('public/fileManager/dialog.php?field_id=image') }}"
                        style="width:100%;height:500px;overflow-y:auto;border:none;"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.min.css">
@stop
@section('js')
    {{-- swap form --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Summernote -->
    <script src="{{ url('public/dashboard') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        //  summernote
        $(function() {
            // Summernote
            $('#description').summernote({
                height: 250,
                placeholder: 'Input Description'
            });
        });

        $(function() {
            // Summernote
            $('#short_description').summernote({
                height: 250,
                placeholder: 'Input Description'
            });
        })

        // modal image
        $('#upload_image').on('hide.bs.modal', function(e) {
            var _link = $('input#image').val();
            var _image = "{{ url('public/uploads/blog') }}" + "/" + _link;
            $('#show_image').attr('src', _image);
        });

        // insert conformation
        $('.btnInsert').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, insert it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('form#formInsert').submit();
                    Swal.fire(
                        'Inserted!',
                        'Your file has been inserting.',
                        'success'
                    );
                }
            });
        });
    </script>

@stop
