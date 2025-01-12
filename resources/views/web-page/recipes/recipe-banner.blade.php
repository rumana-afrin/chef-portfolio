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

                    <form action="{{ route('setting') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h6 class="card-title fs-4">All Recipe Page</h6>
                            </div>
                            <label for="title" class="col-sm-3 col-form-label">Banner</label>
                            <div class="col-sm-9 mb-3">
                                <div class="upload-img-box img-fluid">
                                    <img id="updateImageUrl" src="{{ getImage(getOption('all_recipe_banner')) }}" width="200"
                                        height="200">
                                    <input class="form-control" type="file" name="all_recipe_banner" id="homeBannerImage"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h6 class="card-title fs-4">Vegetable Recipe Page</h6>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="vegetable_page_titile"
                                        placeholder="Title" value="{{ getOption('vegetable_page_titile') }}">
                                </div>
                            </div>
                            <label for="title" class="col-sm-3 col-form-label mb-3">Banner</label>
                            <div class="col-sm-9 mb-3">
                                <div class="upload-img-box img-fluid">
                                    <img id="updateImageUrl" src="{{ getImage(getOption('vegetable_recipe_banner')) }}" width="200"
                                        height="200">
                                    <input class="form-control" type="file" name="vegetable_recipe_banner" id="homeBannerImage"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <h6 class="card-title fs-4">Non-Veg Recipis Page</h6>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="title" name="non_veg_page_title"
                                        placeholder="Title" value="{{ getOption('non_veg_page_title') }}">
                                </div>
                            </div>
                            <label for="title" class="col-sm-3 col-form-label mb-3">Left Side Banner</label>
                            <div class="col-sm-9 mb-3">
                                <div class="upload-img-box img-fluid">
                                    <img id="updateImageUrl" src="{{ getImage(getOption('non_veg_leftsidebanner')) }}" width="200"
                                        height="200">
                                    <input class="form-control" type="file" name="non_veg_leftsidebanner" id="homeBannerImage"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>
                            <label for="title" class="col-sm-3 col-form-label mb-3">Right Side Banner</label>
                            <div class="col-sm-9 mb-3">
                                <div class="upload-img-box img-fluid">
                                    <img id="updateImageUrl" src="{{ getImage(getOption('non_veg_rightsidebanner')) }}" width="200"
                                        height="200">
                                    <input class="form-control" type="file" name="non_veg_rightsidebanner" id="homeBannerImage"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        <button type="button" class="btn btn-secondary mt-4">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        h6 {
            color: #ffffff;
        }

        .upload-img-box {
            height: 300px;
        }
    </style>
@endpush
