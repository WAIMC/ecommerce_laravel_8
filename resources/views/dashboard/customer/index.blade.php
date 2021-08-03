{{-- extends master layout --}}
@extends('layouts.dashboard')

{{-- define item for master layout --}}
@section('title', 'Dashboard Admin')
@section('directory', 'Order')
@section('action', 'Index')


    {{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                {{-- card hearder --}}
                <div class="card-header">

                    {{-- header Order --}}
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Order Management</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="{{ route('order.create') }}" class="btn btn-outline-dark">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <span>Add order</span>
                            </a>
                        </div>
                    </div>

                    {{-- select by choose --}}
                    <div class="row mt-4 justify-content-between">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group col-sm-6">
                                <form id="show_paginate">
                                <select class="form-control form-control-sm" name="show" id="show">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                </select>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                            <form>
                                <div class="row">
                                    <div class="col-8 m-0 p-0">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-sm border-right-0 rounded-0"
                                                name="key" id="key" aria-describedby="helpId" placeholder="Search By Name">
                                        </div>
                                    </div>
                                    <div class="col-4 m-0 p-0">
                                        <button type="submit" class="btn btn-sm btn-primary border-left-0 rounded-0">
                                            <i class="fa fa-sm fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- card body --}}
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover text-center">
                        <thead class="">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Create Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_customer as $cus)
                                <tr>
                                    <form action="{{route('customer_management.update',$cus->id)}}" method="post">
                                    @csrf @method('PUT')
                                        <td scope="row">
                                            <input type="hidden" name="name" value="{{$cus->name}}">
                                            {{ $cus->name }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="email" value="{{$cus->email}}">
                                            {{ $cus->email }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="phone" value="{{$cus->phone}}">
                                            {{ $cus->phone }}
                                        </td>
                                        <td>
                                            <input type="hidden" name="address" value="{{$cus->address}}">
                                            {{ $cus->address }}
                                        </td>
                                        <td>{{ $cus->created_at->format('d-m-Y') }}</td>
                                        <td>

                                            <button type="submit" class="btn btn-success btnUpdate">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="{{ route('customer_management.destroy', $cus->id) }}"
                                                class="btn btn-danger btnDelete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                        <div class="col-5">
                            <h6>Showing 1 to 10 of {{ $data_customer->count() }} entries</h6>
                        </div>
                        <div class="col-7">
                            {{ $data_customer->appends(request()->all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- form action --}}
    <form action="" method="post" id="formAction">
        @csrf @method('DELETE')
    </form>
     
@stop

{{-- customize load css and js for master layout --}}
@section('css')
    {{-- css here --}}
@stop
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.btnDelete').click(function(e) {
            e.preventDefault();
            var _href = $(this).attr('href');
            $('form#formAction').attr('action', _href);


            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                if (result.isConfirmed) {
                    // var myPromise = () => {
                    //     return new Promise((resolve, reject) => {
                    //         $('form#formAction').submit();
                    //         resolve();
                    //     });
                    // };

                    // myPromise()
                    //     .then(() => {
                    @if (Session::has('result'))
                        // var rel = @json(Session::get('result'));
                        // Swal.fire(
                        // rel[0],
                        // rel[1],
                        // rel[2]
                        // );
                    // @else
                    
                        // @endif

                    //     });
                    $('form#formAction').submit();
                    Swal.fire(
                        'Deleting',
                        'Your item has been deleting',
                        'info'
                    );
                };

            });
        });

        // show number column order
        $('#show').change(function (e) { 
            e.preventDefault();
            var _select = $('select#show').val();
            $('form#show_paginate').submit();
        });
    </script>
@stop
