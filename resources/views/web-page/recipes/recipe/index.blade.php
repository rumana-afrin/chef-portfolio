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
                        data-bs-target="#varyingModal" data-bs-whatever="@getbootstrap">Add Recipe</button>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:5%;">#</th>
                                    <th style="width:20%;">Name</th>
                                    <th style="width:20%;">Category</th>
                                    <th class="responsive-description" style="width:20%;">Description</th>
                                    <th style="width:20%;">Image</th>

                                    <th style="width:15%;">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($recipes as $recipe)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $recipe->name }}</td>
                                        <td>{{ $recipe->category->category_name }}</td>
                                        <td class="responsive-description">{!! $recipe->description !!}</td>
                                        <td>
                                            <img class="img-fluid" src="{{ asset('storage/' . $recipe->image) }}"
                                                alt="">
                                        </td>

                                        <td>
                                            <a href="{{ route('recipe-details', $recipe->id) }}" class=""><i
                                                    class="action-icon" data-feather="eye"></i></a>

                                            <a href="{{ route('recipe-edit', $recipe->id) }}"><i class="action-icon"
                                                    data-feather="edit"></i></a>

                                            <a href="#" class="deleteItem"
                                                data-formid="delete_form_{{ $recipe->id }}" title="delete"><i
                                                    class="action-icon" data-feather="trash-2"></i></a>
                                            <form action="{{ route('recipe-delete', $recipe->id) }}" method="post"
                                                id="delete_form_{{ $recipe->id }}">
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
    <div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">ADD Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.recipe') }}" class="forms-sample" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Recipe Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Recipe name" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category_id" class="col-sm-3 col-form-label">Recipe Category:</label>
                            <div class="col-sm-9">
                                <select class="form-select @error('recipe_category_id') is-invalid @enderror"
                                    name="recipe_category_id" id="recipe_category_id" required>
                                    <option selected>Select Album</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Description</h4>
                                        <textarea class="form-control" name="description" id="tinymceExample" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Ingredients</h4>
                                        <textarea class="form-control" name="ingredients" id="tinymceExample" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Instructions</h4>
                                        <textarea class="form-control" name="instructions" id="tinymceExample" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Nutritious</h4>
                                        <textarea class="form-control" name="nutritious" id="tinymceExample" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Category Image:</label>
                            <div class="upload-img-box">
                                <img id="updateimage" src="{{ getDefaultImage() }}">
                                <input class="form-control" type="file" name="image" id="image"
                                    accept="image/*" onchange="previewFile(this)">
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

    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="varyingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">

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
            /* height: auto; */
        }

        .responsive-description {
            white-space: nowrap;
            display: table-cell;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        @media (max-width: 600px) {
            .responsive-description {
                display: none;
            }
            .table td,
            .table th {
                white-space: normal;
                text-wrap: break-word;
                padding: 5px;
            }
        }

        /* Default: Hide the "Description" column */

        /* Show the "Description" column when screen width is at least 786px */
    </style>
@endpush
