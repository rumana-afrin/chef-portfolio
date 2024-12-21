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
                        data-bs-target="#varyingModal" data-bs-whatever="@getbootstrap">Add Language</button>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:30px;">#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($languages as $language)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $language->language }}</td>

                                        <td>
                                            <a href="#" class="edit" data-item="{{ $language }}" data-updateurl="{{ route('language-update', $language->id) }}">
                                                <i class="action-icon" data-feather="edit"></i>
                                            </a>

                                            <a href="#" class="deleteItem" data-formid="delete_form_{{ $language->id }}" title="delete">
                                                <i class="action-icon" data-feather="trash-2"></i>
                                            </a>
                                            <form action="{{ route('language-delete', $language->id) }}" method="post"
                                                id="delete_form_{{ $language->id }}">
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
                    <h5 class="modal-title" id="varyingModalLabel">ADD LANGUAGE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('language-store')}}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                      

                        <div class="row mb-3">
                            <label for="language" class="col-sm-3 col-form-label">Language</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="language" name="language" placeholder="language"
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
                            <label for="language" class="col-sm-3 col-form-label">Language</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="language" name="language" placeholder="language"
                                    value="">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Add</button>
                        <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .upload-img-box {
            height: 200px;
            width: 50%;
        }

        .table td img {
            width: 200px !important;
            height: 100px !important;
            border-radius: 0 !important;
        }

        .action-icon {
            height: 19px !important;
            width: 19px !important;
        }

        .table {
            table-layout: fixed;
            width: 100%;
            height: auto;
        }

        .table td,
        .table th {
            white-space: normal;
            text-wrap: break-word;
            padding: 5px;
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
                modal.find('input[name=language]').val($(this).data('item').language)

                let route = $(this).data('updateurl');
                let image = $(this).data('updateimage'); 
                console.log(image);
               
                $('#form_action').attr("action", route)
                $('#updateImage').attr("src", image)
                modal.modal('show')
            })
        })
    </script>
@endpush
