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

        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('setting') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="card-title text-decoration-underline fs-4">App Logo</h6>
                                <div class="upload-img-box img-fluid">
                                    <img id="updateImageUrl" src="{{ getImage(getOption('app_logo')) }}" width="200" height="200">
                                    <input class="form-control" type="file" name="app_logo" id="homeBannerImage"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="card-title text-decoration-underline fs-4">App Favicon</h6>
                                <div class="upload-img-box img-fluid">
                                    <img id="updateImageUrl" src="{{ getImage(getOption('app_favicon')) }}" width="200" height="200">
                                    <input class="form-control" type="file" name="app_favicon" id="homeBannerImage"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="card-title text-decoration-underline fs-4 mt-4">Social Link</h6>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Facebook</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="title" name="app_facebook_url"
                                    placeholder="Title" value="{{ getOption('app_facebook_url') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Linkeden</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="title" name="app_linkeden_url"
                                    placeholder="Title" value="{{ getOption('app_linkeden_url') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Pinterest</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="title" name="app_pinterest_url"
                                    placeholder="Title" value="{{ getOption('app_pinterest_url') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Youtube</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="title" name="app_youtube_url"
                                    placeholder="Title" value="{{ getOption('app_youtube_url') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Twiter</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="title" name="app_twiter_url"
                                    placeholder="Title" value="{{ getOption('app_twiter_url') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Restaurant Link</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="title" name="app_restaurant_url"
                                    placeholder="Title" value="{{ getOption('app_restaurant_url') }}">
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
            height: 200px;
            width: 200px;
        }
    </style>
@endpush
