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

                    <form action="{{ route('album-store') }}" class="forms-sample" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <h6 class="card-title text-decoration-underline fs-4"></h6>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Album Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('album_name') is-invalid @enderror"
                                    id="title" name="album_name" placeholder="Album Name" placeholder="Title"
                                    value="{{ old('album_name') }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Save</button>
                        <button type="button" class="btn btn-secondary mt-4">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
