{{-- extends master layout --}}
@extends('layouts.dashboard')

{{-- define item for master layout --}}
@section('title', 'Dashboard Admin')
@section('directory', 'Review')
@section('action', 'Index')


    {{-- main section for master layout --}}
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card shadow">

                {{-- card hearder --}}
                <div class="card-header">

                    {{-- header Review --}}
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h4>Review Management</h4>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <button class="btn btn-outline-dark">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                <span>Review</span>
                            </button>
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
                                                name="key" id="key" aria-describedby="helpId" placeholder="Search By Name" disabled>
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
                                <th>Name Customer</th>
                                <th>Name Product</th>
                                <th>Comment</th>
                                <th>Rating Star</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_review as $rew)
                                <tr>
                                    <form action="{{route('review.update',$rew->id)}}" method="post">
                                    @csrf @method('PUT')
                                        <td scope="row">
                                            @foreach ($rew->review_user->where('id',$rew->id_customer)->get() as $name_customer)
                                                {{$name_customer->name}}
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($rew->review_product->where('id',$rew->id_product)->get() as $name_product)
                                                {{$name_product->name}}
                                            @endforeach
                                        </td>
                                        <td>{{ $rew->comment }}</td>
                                        <td>{{ $rew->rating_star }}</td>
                                        <td>{{ $rew->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <select class="form-control form-control-sm text-dark" name="status" id="status">
                                                <option class="text-info" value="0" @if ($rew->status==0) selected @endif>
                                                    <span class="">Display</span>
                                                </option>
                                                <option class="text-warning" value="1" @if ($rew->status==1) selected @endif>
                                                    <span class="">Hidden</span>
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success btnUpdate">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="{{ route('review.destroy', $rew->id) }}"
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
                            <h6>Showing 1 to 10 of {{ $data_review->count() }} entries</h6>
                        </div>
                        <div class="col-7">
                            {{ $data_review->appends(request()->all())->links() }}
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
