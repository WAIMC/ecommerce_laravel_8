{{-- extends master layout --}}
@extends('layouts.dashboard')

{{-- define item for master layout --}}
@section('title', 'Dashboard Admin')
@section('directory', 'Update Link')
@section('action', 'Edit')


    {{-- main section for master layout --}}
@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Update Link</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 m-auto">
                        <form action="{{ route('settingLink.update', $settingLink->id) }}" id="formUpdate" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label for="config_key">Name Link</label>
                                <input type="text" class="form-control @error('config_key')
                                              is-invalid
                                  @enderror" value="{{ $settingLink->config_key }}" name="config_key" id="config_key"
                                    aria-describedby="config_key" placeholder="Name Link" required>
                                @error('config_key')
                                    <small id="config_key" class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="config_value">Name Link</label>
                                <input type="text" class="form-control @error('config_value')
                                              is-invalid
                                  @enderror" value="{{ $settingLink->config_value }}" name="config_value" id="config_value"
                                    aria-describedby="config_value" placeholder="Name Link" required>
                                @error('config_value')
                                    <small id="config_value" class="form-text text-muted">{{ $message }}</small>
                                @enderror
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
    </script>
@stop
