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
                        data-bs-target="#varyingModal" data-bs-whatever="@getbootstrap">Add Job Experience</button>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:30px;">#</th>
                                    <th>Company Name</th>
                                    <th>Designation</th>
                                    <th>Role</th>
                                    <th class="responsive-description">Start Date</th>
                                    <th class="responsive-description">End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_experiences as $job_experience)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $job_experience->company_name }}</td>
                                        <td>{{ $job_experience->designation }}</td>
                                        <td>{!! $job_experience->role_description !!}</td>
                                        <td class="responsive-description">{{ $job_experience->start_date }}</td>
                                        <td class="responsive-description">{{ $job_experience->end_date }}</td>

                                        <td>

                                            <a href="#" class="edit" data-item="{{ $job_experience }}"
                                                data-updateurl="{{ route('update-experiance', $job_experience->id) }}">
                                                <i class="action-icon" data-feather="edit"></i>
                                            </a>

                                            <a href="#" class="deleteItem" data-formid="delete_form_{{ $job_experience->id }}" title="delete">
                                                <i class="action-icon" data-feather="trash-2"></i>
                                            </a>
                                            <form action="{{ route('job_experience-delete', $job_experience->id) }}" method="post"
                                                id="delete_form_{{ $job_experience->id }}">
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
                    <h5 class="modal-title" id="varyingModalLabel">Add Job Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-experiance') }}" class="forms-sample" method="post"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label for="company_name" class="col-sm-3 col-form-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                    placeholder="Company Name" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="designation" class="col-sm-3 col-form-label">Designation</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="designation" name="designation"
                                    placeholder="designation" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-sm-12 col-form-label">Role</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="role_description" id="tinymceExample" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_date" class="col-sm-3 col-form-label">Start Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" min="1900" max="2100" id="start_date"
                                    name="start_date" placeholder="Start Date" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="end_date" class="col-sm-3 col-form-label">End Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" min="1900" max="2100" id="end_date"
                                    name="end_date" placeholder="End Date" value="">
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
                    <h5 class="modal-title" id="varyingModalLabel">Update Job Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_action" action="" class="forms-sample" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row mb-3">
                            <label for="company_name" class="col-sm-3 col-form-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                    placeholder="Company Name" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="designation" class="col-sm-3 col-form-label">Designation</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="designation" name="designation"
                                    placeholder="designation" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-sm-12 col-form-label">Role</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="role_description" id="tinymceExample" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="start_date" class="col-sm-3 col-form-label">Start Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" min="1900" max="2100"
                                    id="start_date" name="start_date" placeholder="Start Date" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="end_date" class="col-sm-3 col-form-label">End Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" min="1900" max="2100" id="end_date"
                                    name="end_date" placeholder="End Date" value="">
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
            text-wrap: break-word;
            padding: 8px;
        }

        /* Default: Hide the "Description" column  */
        .responsive-description {
            display: none;
        }

        /* Show the "Description" column when screen width is at least 786px */
        @media (min-width: 786px) {
            .responsive-description {
                display: table-cell;
            }
        }
    </style>
@endpush
@push('script')
    <script>
        $(function() {
            'use strict';
            $('.edit').on('click', function(e) {
                e.preventDefault();

                const modal = $('#edit_modal');
                const item = $(this).data('item');

                // Set input values
                modal.find('input[name=company_name]').val(item.company_name);
                modal.find('input[name=designation]').val(item.designation);
                modal.find('input[name=start_date]').val(item.start_date);
                modal.find('input[name=end_date]').val(item.end_date);

                modal.find('textarea[name=role_description]').val('');
                modal.find('#tinymceExample_ifr').contents().find('body').html(item.role_description);
//The tinymceExample_ifr is the ID of the iframe that TinyMCE creates for rendering the rich text editor
                // Update form action URL
                let route = $(this).data('updateurl');
                $('#form_action').attr("action", route);

                // Show modal
                modal.modal('show');
            });
        });
    </script>
@endpush
