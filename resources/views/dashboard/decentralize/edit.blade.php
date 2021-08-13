{{-- extends master layout --}}
@extends('layouts.dashboard')

{{-- define item for master layout --}}
@section('title', 'Dashboard Admin')
@section('directory', 'Decentralize')
@section('action', 'Edit')


    {{-- main section for master layout --}}
@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Edit Decentralize</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 m-auto">
                        <form action="{{route('decentralize.update', [$admin2->id,'id'=>$admin2->id])}}" id="formUpdate" method="POST">
                            @csrf @method('PUT')

                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text"
                                class="form-control" name="name" value="{{  $admin2->name }}" id="name" aria-describedby="" placeholder="Name">
                            </div>

                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="text"
                                    class="form-control" name="email" value="{{  $admin2->email }}" id="email" aria-describedby="" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label>Decentralize</label>
                                <select class="select2" name="role[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    @foreach ($getRole as $role)
                                    <?php $checked = in_array($role->name, $role_assignment) ? 'checked' : ''; ?>
                                        <option class="role_{{$role->id}}" value="{{$role->id}}" {{$checked}}>{{$role->name}}</option>
                                    @endforeach
                                </select>
                              </div>

                            <button type="button" class="btn btn-outline-dark btnUpdate">Update</button>
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
    {{-- load css for multiple select --}}
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ url('public/dashboard') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@stop
@section('js')

    {{-- load js for multiple select --}}
    <script src="{{ url('public/dashboard') }}/plugins/select2/js/select2.full.min.js"></script>

    {{-- load js for confirm --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // checked form with data admin_role
        var admin_id = {!! $admin2->id !!};
        var checked_form = {!! json_encode($getRoleChecked->toArray()) !!}
        var getRole = {!! json_encode($getRole->toArray()) !!};
        checked_form.forEach(element => {
            if(element['admin_id'] == admin_id){
                getRole.forEach(role => {
                    if($('.role_'+role['id']).val()==role['id']){
                        $('.role_'+role['id']).prop('checked', true);
                    }
                });
            }
        });

        // multiple select
        $('.select2').select2();

        // insert form
        $('.btnUpdate').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('form#formUpdate').submit();
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
