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

        <div class="col-md-6 stretch-card">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('gallary-store') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="album_id" class="col-sm-3 col-form-label">Album:</label>
                            <div class="col-sm-9">
                                <select class="form-select @error('album_id') is-invalid @enderror" id="album_id" name="album_id">
                                    <option selected>Select Album</option>

                                    @foreach ($albums as $album)
                                    <option value="{{$album->id}}">{{$album->album_name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <div class="upload-img-box">
                                <img id="updateImageUrl" src="{{ getimage(getOption('image')) }}">
                                <input class="form-control" type="file" name="image" id="image"
                                    accept="image/*" onchange="previewFile(this)">
                                <div class="upload-img-box-icon">
                                    <i class="bi bi-camera-fill"></i>
                                    <p class="m-0"></p>
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
        .upload-img-box {
            height: 200px;
            width: 50%;
        }
    </style>
@endpush
