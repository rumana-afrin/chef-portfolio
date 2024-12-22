@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="example">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-dot">
                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
                </ol>
            </nav>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-1 mb-md-0" data-bs-toggle="modal"
                        data-bs-target="#varyingModal" data-bs-whatever="@getbootstrap">Add Education</button>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:30px;">#</th>
                                    <th>Institution</th>
                                    <th>Location</th>
                                    <th>Degree</th>
                                    <th class="responsive-description">Passing Year</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($educations as $education)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $education->institution }}</td>
                                        <td>{{ $education->location }}</td>
                                        <td>{{ $education->degree }}</td>
                                        <td class="responsive-description">{{ $education->year_completed }}</td>

                                        <td>

                                            <a href="#" class="edit" data-item="{{ $education }}" data-updateurl="{{ route('education-update', $education->id) }}">
                                                <i class="action-icon" data-feather="edit"></i>
                                            </a>

                                            <a href="#" class="deleteItem" data-formid="delete_form_{{ $education->id }}" title="delete">
                                                <i class="action-icon" data-feather="trash-2"></i>
                                            </a>
                                            <form action="{{ route('education-delete', $education->id) }}" method="post"
                                                id="delete_form_{{ $education->id }}">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                        </td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- -------------------------add modal----------------------- --}}

    <div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">ADD Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('store-education')}}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                      

                        <div class="row mb-3">
                            <label for="institution" class="col-sm-3 col-form-label">Institution</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="institution" name="institution" placeholder="institution"
                                    value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="location" class="col-sm-3 col-form-label">Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="location" name="location" placeholder="location"
                                    value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="degree" class="col-sm-3 col-form-label">Degree</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="degree" name="degree" placeholder="degree"
                                    value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="year_completed" class="col-sm-3 col-form-label">Passing Year</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" min="1900" max="2100" id="year_completed" name="year_completed" placeholder="passing year"
                                    value="">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mt-4">Save</button>
                        <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    {{-- -----------------------------edit modal----------------------- --}}

    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="varyingModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">ADD IMAGE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_action" action="" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                      
                        <div class="row mb-3">
                            <label for="institution" class="col-sm-3 col-form-label">Institution</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="institution" name="institution" placeholder="institution"
                                    value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="location" class="col-sm-3 col-form-label">Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="location" name="location" placeholder="location"
                                    value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="degree" class="col-sm-3 col-form-label">Degree</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="degree" name="degree" placeholder="degree"
                                    value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="year_completed" class="col-sm-3 col-form-label">Passing Year</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" min="1900" max="2100" id="year_completed" name="year_completed" placeholder="passing year"
                                    value="">
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                        <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        
        .action-icon {
            height: 19px !important;
            width: 19px !important;
        }

        .table {
            /* table-layout: fixed; */
            width: 100%;
            height: auto;
        }

        .table td,
        .table th {
            white-space: normal;
            /* text-wrap: break-word; */
            padding: 8px;
        }
        /* Default: Hide the "Description" column */
        /* .responsive-description {
            display: none;
        } */

        /* Show the "Description" column when screen width is at least 786px */
        /* @media (min-width: 786px) {
            .responsive-description {
                display: table-cell;
            }
        } */

    </style>
@endpush
@push('script')
    <script>
        $(function() {
            'use strict'
            $('.edit').on('click', function(e) {
                e.preventDefault();


                const modal = $('#edit_modal');
                modal.find('input[name=institution]').val($(this).data('item').institution)
                modal.find('input[name=location]').val($(this).data('item').location)
                modal.find('input[name=degree]').val($(this).data('item').degree)
                modal.find('input[name=year_completed]').val($(this).data('item').year_completed)


                let route = $(this).data('updateurl');
                $('#form_action').attr("action", route)
                modal.modal('show')
            })
        })
    </script>
@endpush
