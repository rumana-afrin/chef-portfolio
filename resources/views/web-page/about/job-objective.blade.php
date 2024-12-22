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
                            <label for="job_objective" class="col-sm-3 col-form-label">Job Objective</label>
                            <div class="col-sm-9">
                                    <textarea type="text" class="form-control" id="job_objective" name="job_objective"
                                    placeholder="Job Objective" cols="30" rows="10">{{ getOption('job_objective') }}</textarea>
                            </div>
                        </div>
                     
                       
                        

                        <button type="submit" class="btn btn-primary mt-4">Save</button>
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
    </style>
@endpush
