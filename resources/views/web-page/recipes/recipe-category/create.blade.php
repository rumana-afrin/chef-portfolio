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

        <div class="col-md-6 stretch-card">
            <div class="card">
                <div class="card-body">
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
@endsection
@push('style')
    <style>
        .upload-img-box {
            height: 200px;
            width: 50%;
        }
    </style>
@endpush
