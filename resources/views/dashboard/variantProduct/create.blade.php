@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('directory', 'Variant Product')
@section('action', 'Create')
@section('main')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Add Variant Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('variantProduct.store') }}" method="POST" enctype="multipart/form-data" id="formInsert">
                    @csrf
                    <div class="row">
                        <div class="col-9">

                            <div class="form-group">
                                <label for="color">Color Name Variant Product</label>
                                <input type="text" name="color" id="color" aria-describedby="color" placeholder="Color Name Product" value="{{ old('color') }}" 
                                class="form-control @error('color')
                                                        is-invalid
                                                    @enderror">
                                @error('color')
                                    <small id="color" class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="color_code">Color Code Name Variant Product</label>
                                <input type="color" name="color_code" id="color_code" aria-describedby="color_code"
                                class="form-control @error('color_code')
                                                        is-invalid
                                                    @enderror">
                                @error('color_code')
                                    <small id="color_code" class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <input type="hidden" name="gallery" value="{{ old('gallery')}}" id="gallery" 
                                    class="@error('gallery')
                                                is-invalid
                                            @enderror">
                                            
                                    @error('gallery')
                                        <small id="gallery"
                                            class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                    @enderror
                                </div>
                                <label for="">Image List</label>
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#upload_gallery">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                </button>
                                <div class="row" id="show_gallery">
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary btnInsert">Add</button>

                        </div>
                        <div class="col-3">
                            
                            <div class="form-group">
                                <label for="id_product">Product</label>
                                <select class="form-control" name="id_product" id="id_product">
                                    @foreach ($product as $prod)
                                        <option value="{{ $prod->id }}">{{ $prod->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" aria-describedby="quantity" value="{{ old('quantity') }}" placeholder="quantity" 
                                class="form-control @error('quantity')
                                                        is-invalid
                                                    @enderror">
                                @error('quantity')
                                    <small id="quantity" class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number"  name="price" id="price" aria-describedby="price" value="{{ old('price') }}"   placeholder="Price"
                                class="form-control @error('price')
                                                        is-invalid
                                                    @enderror">
                                @error('price')
                                    <small id="price" class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input type="number"  name="discount" id="discount" aria-describedby="discount"  value="{{ old('discount') }}" placeholder="Discount"
                                 class="form-control  @error('discount')
                                          is-invalid
                                    @enderror">
                                @error('discount')
                                    <small id="discount"
                                        class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-inline">
                                <div class="custom-control custom-radio mr-2">
                                    <input class="custom-control-input" type="radio" id="Special" name="status" value="0">
                                    <label for="Special" class="custom-control-label">Special</label>
                                </div>
                                <div class="custom-control custom-radio mr-2">
                                    <input class="custom-control-input" type="radio" id="Normal" name="status" value="1"
                                        checked>
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


    {{-- model list image --}}
    <!-- Button trigger modal -->
    <div class="modal fade" id="upload_gallery" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">List Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ url('public/fileManager/dialog.php?field_id=gallery') }}"
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

        // modal list image
        $('#upload_gallery').on('hide.bs.modal', function(e) {
            var _links = $('input#gallery').val();
            var _html = '';
            // var _args = $.parseJSON(_links);
            // check input data json string to parseJSON
            if (/^[\],:{}\s]*$/.test(_links.replace(/\\["\\\/bfnrtu]/g, '@').replace(
                    /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(
                    /(?:^|:|,)(?:\s*\[)+/g, ''))) {
                var _args = $.parseJSON(_links);
                for (let img = 0; img < _args.length; img++) {
                    let _url = "{{ url('public/uploads/product') }}" + "/" + _args[img];
                    _html += "<div class='col-sm-4'>";
                    _html += "<img src='" + _url + "' alt='' width='100%' >";
                    _html += "</div>";
                };
            } else {
                let _url = "{{ url('public/uploads/product') }}" + "/" + _links;
                _html += "<div class='col-sm-4'>";
                _html += "<img src='" + _url + "' alt='' width='100%' >";
                _html += "</div>";
            }
            $('#show_gallery').html(_html);
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
