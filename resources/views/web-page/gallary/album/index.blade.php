@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="example">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-dot">
                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }} Page</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-1 mb-md-0" data-bs-toggle="modal"
                        data-bs-target="#add_modal" data-bs-whatever="@getbootstrap">Add Album</button>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($albums as $album)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $album->album_name }}</td>
                                        <td>
                                            {{-- <a href="#" class=""><i class="action-icon" data-feather="eye"></i></a> --}}
                                            <a href="#" class="edit" data-item="{{ $album }}"
                                                data-updateurl="{{ route('album-update', $album->id) }}"><i
                                                    class="action-icon" data-feather="edit"></i></a>

                                            <a href="#" class="deleteItem"
                                                data-formid="delete_row_form_{{ $album->id }}" title="Delete"><i
                                                    class="action-icon" data-feather="trash-2"></i></a>

                                            <form action="{{ route('album.delete', [$album->id]) }}" method="post"
                                                id="delete_row_form_{{ $album->id }}">
                                                {{ method_field('DELETE') }}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                            {{-- The JavaScript reads the data-formid attribute to find the associated <form> by its ID. --}}
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
    {{-- -----------------------------add modal----------------------- --}}

    <div class="modal fade" id="add_modal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">ADD ALBUM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('album-store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="recipient-name" class="form-label">Album Name:</label>
                            <input type="text" class="form-control @error('album_name') is-invalid @enderror"
                                id="recipient-name" name="album_name">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    {{-- -----------------------------edit modal----------------------- --}}

    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">ADD ALBUM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_action" action="" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="recipient-name" class="form-label">Album Name:</label>
                            <input type="text" class="form-control" id="recipient-name" name="album_name">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </div>
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
            table-layout: fixed;
            width: 100%;
        }
    </style>
@endpush
@push('script')
    <script>
        $(function() {
            'use strict'
            $('.edit').on('click', function(e) {
                e.preventDefault();

                const modal = $('#edit_modal');
                modal.find('input[name=album_name]').val($(this).data('item').album_name)

                let route = $(this).data('updateurl');
                console.log(route);

                $('#form_action').attr("action", route)
                modal.modal('show')
            })
        })
    </script>
@endpush
