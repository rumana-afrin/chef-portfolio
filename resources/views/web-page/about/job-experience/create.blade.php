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

                    <form action="{{ route('store-experiance') }}" class="forms-sample" method="post"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="row mb-3">
                        <label for="company_name" class="col-sm-3 col-form-label">Company Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                placeholder="Company Name" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="designation" class="col-sm-3 col-form-label">Designation</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="designation" name="designation"
                                placeholder="designation" value="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="role" class="col-sm-12 col-form-label">Role</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="role_description" id="tinymceExample" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="start_date" class="col-sm-3 col-form-label">Start Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" min="1900" max="2100" id="start_date"
                                name="start_date" placeholder="Start Date" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="end_date" class="col-sm-3 col-form-label">End Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" min="1900" max="2100" id="end_date"
                                name="end_date" placeholder="End Date" value="">
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

