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

                    <form action="{{route('store-education')}}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                      

                        <div class="row mb-3">
                            <label for="institution" class="col-sm-3 col-form-label">Institution</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="institution" name="institution" placeholder="institution"
                                    value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="location" class="col-sm-3 col-form-label">Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="location" name="location" placeholder="location"
                                    value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="degree" class="col-sm-3 col-form-label">Degree</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="degree" name="degree" placeholder="degree"
                                    value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="year_completed" class="col-sm-3 col-form-label">Passing Year</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" min="1900" max="2100" id="year_completed" name="year_completed" placeholder="passing year"
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
@endsection

