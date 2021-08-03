@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('directory', 'Product')
@section('action', 'Edit')
@section('main')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Add Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="formEdit">
                    @csrf @method('PUT')
                    <div class="row">
                        <div class="col-9">

                            <div class="form-group">
                                <label for="name">Name Product</label>
                                <input type="text" name="name" id="name" aria-describedby="name" placeholder="Name Product"
                                    value="{{ $product->name }}" class="form-control @error('name')
                                          is-invalid
                                    @enderror">
                                @error('name')
                                    <small id="name" class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" aria-describedby="description" class="form-control 
                                    @error('description')
                                          is-invalid
                                    @enderror">{{ $product->description }}</textarea>
                                @error('description')
                                    <small id="description"
                                        class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="button" class="btn btn-primary btnEdit">Edit</button>

                        </div>
                        <div class="col-3">

                            <div class="form-group">
                                <label for="id_category">Category</label>
                                <select class="form-control" name="id_category" id="id_category">
                                    @foreach ($category as $cat)
                                        @if ($cat->id==$product->id_category)
                                            <option value="{{$cat->id}}" selected='selected'>{{$cat->name}}</option>
                                        @else
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="row">
                                    <div class="col-9 m-0 p-0">
                                        <div class="form-group">
                                            <input type="text" name="image" value="{{$product->image}}" id="image" aria-describedby="image" placeholder="Input Image"
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

                            
                            <div class="mt-2"><label for="">Status</label></div>
                            <div class="form-inline">
                                <div class="custom-control custom-radio mr-2">
                                    <input class="custom-control-input" type="radio" id="Special" name="status" value="0"
                                    @if ($product->status==0)
                                        checked='checked'
                                    @endif>
                                    <label for="Special" class="custom-control-label">Special</label>
                                </div>
                                <div class="custom-control custom-radio mr-2">
                                    <input class="custom-control-input" type="radio" id="Normal" name="status" value="1"
                                    @if ($product->status==1)
                                        checked='checked'
                                    @endif>
                                    <label for="Normal" class="custom-control-label">Normal</label>
                                </div>
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
        })

        // modal image
        $('#upload_image').on('hide.bs.modal', function(e) {
            var _link = $('input#image').val();
            var _image = "{{ url('public/uploads/product') }}" + "/" + _link;
            $('#show_image').attr('src', _image);
        });


        // edit conformation
        $('.btnEdit').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Edit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('form#formEdit').submit();
                    Swal.fire(
                        'Editing!',
                        'Your file has been editing.',
                        'success'
                    );
                }
            });
        });
    </script>

@stop
