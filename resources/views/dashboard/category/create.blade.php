{{-- extends master layout --}}
@extends('layouts.dashboard')

{{-- define item for master layout --}}
@section('title', 'Dashboard Admin')
@section('directory', 'Category')
@section('action', 'Create')


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
                        <form action="{{ route('category.store') }}" id="formInsert" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name Category</label>
                                <input type="text" class="form-control @error('name')
                                      is-invalid
                              @enderror" name="name" id="name" aria-describedby="nameCategory" placeholder="Name Category" value="{{ old('name')}}" required>
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
                            <button type="button" class="btn btn-outline-dark btnInsert">Add</button>
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
                        'Your file has been inserted.',
                        'success'
                    );
                }
            });
        });
    </script>
@stop
