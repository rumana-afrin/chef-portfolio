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

        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">

                    <form action="{{route('recipe-update', $recipe->id)}}" class="forms-sample" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')


                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Recipe Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" placeholder="Recipe name" value="{{$recipe->name}}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-3 col-form-label">Recipe Category:</label>
                        <div class="col-sm-9">
                            <select class="form-select @error('recipe_category_id') is-invalid @enderror"
                                name="recipe_category_id" id="recipe_category_id" required>
                                <option selected>Select Album</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{$category->id == $recipe->category->id ? 'selected' : ''}}>{{ $category->category_name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Description</h4>
                                    <textarea class="form-control" name="description" id="tinymceExample" rows="10">{{$recipe->description}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Ingredients</h4>
                                    <textarea class="form-control" name="ingredients" id="tinymceExample" rows="10">{{$recipe->ingredients}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Instructions</h4>
                                    <textarea class="form-control" name="instructions" id="tinymceExample" rows="10">{{$recipe->instructions}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Nutritious</h4>
                                    <textarea class="form-control" name="nutritious" id="tinymceExample" rows="10">{{$recipe->nutritious}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Category Image:</label>
                        <div class="upload-img-box">
                            <img id="updateImage" src="{{ getImage($recipe->image) }}">
                            <input class="form-control" type="file" name="image" id="image"
                                accept="image/*" onchange="previewFile(this)">
                            <div class="upload-img-box-icon">
                                <i class="bi bi-camera-fill"></i>
                                <p class="m-0"></p>
                            </div>
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
          .upload-img-box {
            height: 200px;
            width: 20%;
        }
    </style>
@endpush
