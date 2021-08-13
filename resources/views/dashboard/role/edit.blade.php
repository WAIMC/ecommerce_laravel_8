{{-- extends master layout --}}
@extends('layouts.dashboard')

{{-- define item for master layout --}}
@section('title', 'Dashboard Admin')
@section('directory', 'Role')
@section('action', 'Create')


    {{-- main section for master layout --}}
@section('main')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Add Role</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 m-auto">
                        <form action="{{ route('role.update',$role->id) }}" id="formUpdate" method="POST">
                            @csrf @method('PUT')
                            
                            <div class="form-group">
                                <label for="name">Name Role</label>
                                <input type="text"  name="name" id="name" aria-describedby="nameRole" placeholder="Name Role" value="{{ $role->name }}" required 
                                class="form-control @error('name')
                                      is-invalid
                                @enderror">
                                @error('name')
                                    <small id="nameRole" class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                           
                            <div class="row">
                                <h3 for="" class="m-auto">Permission</h3>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input checkall" type="checkbox" id="checkall">
                                        <label for="checkall" class="custom-control-label"> <strong> Check All</strong> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-0 m-0">
                                @foreach ($routes as $route)
                                    <div class="card card-dark col-4 card_{{$route}}">
                                        <div class="card-header">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkbox-wapper {{$route}}" type="checkbox" id="checkAll{{$route}}">
                                                    <label for="checkAll{{$route}}" class="custom-control-label"> <strong> {{$route}} Managerment</strong> </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="index{{$route}}" name="routes[]" value="{{$route}}.index">
                                                    <label for="index{{$route}}" class="custom-control-label">Index {{$route}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="create{{$route}}" name="routes[]" value="{{$route}}.create">
                                                    <label for="create{{$route}}" class="custom-control-label">Create {{$route}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="store{{$route}}" name="routes[]" value="{{$route}}.store">
                                                    <label for="store{{$route}}" class="custom-control-label">Store {{$route}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="show{{$route}}" name="routes[]" value="{{$route}}.show">
                                                    <label for="show{{$route}}" class="custom-control-label">Show {{$route}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="edit{{$route}}" name="routes[]" value="{{$route}}.edit">
                                                    <label for="edit{{$route}}" class="custom-control-label">Edit {{$route}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="update{{$route}}" name="routes[]" value="{{$route}}.update">
                                                    <label for="update{{$route}}" class="custom-control-label">Update {{$route}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="destroy{{$route}}" name="routes[]" value="{{$route}}.destroy">
                                                    <label for="destroy{{$route}}" class="custom-control-label">Destroy {{$route}}</label>
                                                </div>
                                            </div>
                                            @if ($route === 'admin')
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkbox-children check_{{$route}}" type="checkbox" id="filter_chart_by_date{{$route}}" name="routes[]" value="{{$route}}.filter_chart_by_date">
                                                        <label for="filter_chart_by_date{{$route}}" class="custom-control-label">Filter Chart {{$route}}</label>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-footer text-muted">
                                            {{-- footer --}}
                                        </div>
                                    </div>
                                @endforeach
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
@stop
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        // checked form with data role
        var permission = {!! json_encode(json_decode($role->permission)) !!};
        var rou = {!! json_encode($routes) !!}
        permission.forEach(per => {    
            rou.forEach(rou => {
                if($('.check_'+rou).val()==per){
                    $('.check_'+rou).prop('checked',true);
                }
            });
        });

        // checked all
        $(".checkall").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        // checked form
        var routes = {!! json_encode($routes) !!}
        routes.forEach(element => {
            $('.'+element).change(function (e) { 
                e.preventDefault();
                $(this).parents('.card_'+element).find('.check_'+element).prop('checked', $(this).prop('checked'));
            });
        });

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
