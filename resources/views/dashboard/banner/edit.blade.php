{{-- extends master layout --}}
@extends('layouts.dashboard')

{{-- define item for master layout --}}
@section('title', 'Dashboard Admin')
@section('directory', 'Banner')
@section('action', 'Edit')


    {{-- main section for master layout --}}
@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Edit Banner</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 m-auto">
                        <form action="{{ route('banner.update', $banner->id) }}" id="formInsert" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label for="name">Name Banner</label>
                                <input type="text"  name="name" id="name" aria-describedby="nameBanner" placeholder="Name Banner" value="{{ $banner->name }}" required
                                 class="form-control @error('name')
                                      is-invalid
                                @enderror">
                                @error('name')
                                    <small id="nameBanner" class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <input type="hidden" value="{{$banner->image}}" name="image" id="image">
                                </div>
                                <label for="image">Image</label>
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal"
                                    data-target="#upload_image">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                </button>
                                <div class="row" id="show_image">
                                    @error('image')
                                        <small id="image"
                                            class="invalid-feedback form-text text-muted">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text"  name="subtitle" id="subtitle" aria-describedby="subtitleBanner" placeholder="Subtitle Banner" value="{{$banner->subtitle}}" required
                                 class="form-control @error('subtitle')
                                      is-invalid
                                @enderror">
                                @error('subtitle')
                                    <small id="subtitleBanner" class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title_first">Title First</label>
                                <input type="text"  name="title_first" id="title_first" aria-describedby="title_firstBanner" placeholder="Title first Banner" value="{{ $banner->title_first}}" required 
                                class="form-control @error('title_first')
                                      is-invalid
                                @enderror">
                                @error('title_first')
                                    <small id="title_firstBanner" class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title_second">Title Second</label>
                                <input type="text" name="title_second" id="title_second" aria-describedby="title_secondBanner" placeholder="Title Second Banner" value="{{$banner->title_second}}" required
                                 class="form-control @error('title_second')
                                      is-invalid
                                @enderror">
                                @error('title_second')
                                    <small id="title_secondBanner" class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="button" class="btn btn-outline-dark btnEdit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                {{-- Footer --}}
            </div>
        </div>
    </div>

    {{-- model list image --}}
    <!-- Button trigger modal -->
    <div class="modal fade" id="upload_image" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
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

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // modal list image
        $('#upload_image').on('hide.bs.modal', function(e) {
            var _links = $('input#image').val();
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
            $('#show_image').html(_html);
        });

        // insert conformation
        $('.btnEdit').click(function(e) {
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
