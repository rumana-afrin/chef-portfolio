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

                    <form action="{{route('language-store')}}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                      

                        <div class="row mb-3">
                            <label for="language" class="col-sm-3 col-form-label">Language</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="language" name="language" placeholder="language"
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

