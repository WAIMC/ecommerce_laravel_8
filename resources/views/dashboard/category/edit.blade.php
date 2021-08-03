{{-- extends master layout --}}
@extends('layouts.dashboard')

{{-- define item for master layout --}}
@section('title', 'Dashboard Admin')
@section('directory', 'Category')
@section('action', 'Edit')


    {{-- main section for master layout --}}
@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Add Category</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 m-auto">
                        <form action="{{ route('category.update', $category->id) }}" id="formUpdate" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label for="name">Name Category</label>
                                <input type="text" class="form-control @error('name')
                                              is-invalid
                                  @enderror" value="{{ $category->name }}" name="name" id="name"
                                    aria-describedby="nameCategory" placeholder="Name Category" required>
                                @error('name')
                                    <small id="nameCategory" class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Select Parent Category</label>
                                <select class="form-control" name="parent_id" id="parent_id">
                                    <option value="0">Choose directory parent category</option>
                                    {!! $show_option !!}
                                </select>
                            </div>
                            <button type="button" class="btn btn-outline-dark btnEdit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                {{-- Footer --}}
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
                    $('form#formUpdate').submit();
                    Swal.fire(
                        'Edited!',
                        'Your file has been edited.',
                        'success'
                    );
                }
            });
        });

        // seleted option 
        var _xyz = {!! json_encode($data_selected->toArray()) !!}
        _xyz.forEach(element => {
            if ($("#seleted_" + element['id'] + "").val() == {{ $category->id }}) {
                $("#seleted_" + element['id'] + "").attr('selected', 'selected');
            }
        });
    </script>
@stop
