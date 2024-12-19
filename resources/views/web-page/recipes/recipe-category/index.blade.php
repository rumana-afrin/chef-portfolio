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
                        data-bs-target="#varyingModal" data-bs-whatever="@getbootstrap">Add Category</button>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:30px;">#</th>
                                    <th>Carousel Name</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            <img class="img-fluid" src="{{ asset('storage/' . $category->category_image) }}"
                                                alt="">
                                        </td>

                                        <td>
                                            <a href="#" class=""><i class="action-icon" data-feather="eye"></i></a>
                                          
                                            <a href="#" class="edit" data-item="{{ $category }}"
                                                data-updateurl="{{ route('recipe-category-update', $category->id) }}"
                                                data-updateimage="{{ getImage($category->category_image) }}"><i class="action-icon"
                                                    data-feather="edit"></i></a>

                                            <a href="#" class="deleteItem"
                                                data-formid="delete_form_{{ $category->id }}" title="delete"><i
                                                    class="action-icon" data-feather="trash-2"></i></a>
                                            <form action="{{ route('recipe-category-delete', $category->id) }}" method="post"
                                                id="delete_form_{{ $category->id }}">
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
                    <h5 class="modal-title" id="varyingModalLabel">ADD Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('add.recipe.category')}}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                      
                        <div class="row mb-3">
                            <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name="category_name" placeholder="Carousel name"
                                    value="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Category Image:</label>
                            <div class="upload-img-box">
                                <img id="updateimage" src="{{getDefaultImage()}}">
                                <input class="form-control" type="file" name="image" id="image" accept="image/*"
                                    onchange="previewFile(this)">
                                <div class="upload-img-box-icon">
                                    <i class="bi bi-camera-fill"></i>
                                    <p class="m-0"></p>
                                </div>
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
                    <h5 class="modal-title" id="varyingModalLabel">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_action" action="" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                       

                        <div class="row mb-3">
                            <label for="category_name" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Title"
                                    value="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Category Image:</label>
                            <div class="upload-img-box">
                                <img id="updateImage" src="{{ getDefaultImage() }}">
                                <input class="form-control" type="file" name="image" id="image" accept="image/*"
                                    onchange="previewFile(this)">
                                <div class="upload-img-box-icon">
                                    <i class="bi bi-camera-fill"></i>
                                    <p class="m-0"></p>
                                </div>
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
        }

        .table td,
        .table th {
            text-overflow: ellipsis;
            overflow: hidden;
            padding: 5px;
        }

        .title {
            text-overflow: ellipsis;
            /* width: %; */
            white-space: normal;
            word-wrap: break-word;
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

                modal.find('input[name=category_name]').val($(this).data('item').category_name)

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
