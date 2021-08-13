{{-- extends master layout --}}
@extends('layouts.dashboard')

{{-- define item for master layout --}}
@section('title', 'Dashboard Admin')
@section('directory', 'Link')
@section('action', 'Create')


    {{-- main section for master layout --}}
@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Add Link</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 m-auto">
                        <form action="{{ route('settingLink.store') }}" id="formInsert" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="config_key">Name Link</label>
                                <input type="text" class="form-control @error('config_key')
                                        is-invalid
                                @enderror" name="config_key" id="config_key" aria-describedby="nameLink" placeholder="Name Link" value="{{ old('config_key')}}" required>
                                @error('config_key')
                                    <small id="nameLink" class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="config_value">Link</label>
                                <input type="text" class="form-control @error('config_value')
                                        is-invalid
                                @enderror" name="config_value" id="config_value" aria-describedby="Link" placeholder="Link" value="{{ old('config_value')}}" required>
                                @error('config_value')
                                    <small id="Link" class="form-text text-muted">{{ $message }}</small>
                                @enderror
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
