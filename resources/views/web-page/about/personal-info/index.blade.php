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
    </div>


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-1 mb-md-0" data-bs-toggle="modal"
                        data-bs-target="#varyingModal" data-bs-whatever="@getbootstrap">Add Info</button>

                    <h4 class="mt-5">Personal information</h4>

                    @foreach ($personalInfos as $info)
                        <div class="row mt-3">
                            <div class="col-6 col-md-4 info border-bottom border-top p-3">Image :</div>
                            <div class="col-6 col-md-8 border-bottom border-start border-top p-3">
                                <img class="images align-self-start mr-3 img-fluid"
                                    src="{{ asset('storage/' . $info->image) }}" alt="image">
                            </div>
                            <div class="col-6 col-md-4 info border-bottom p-3">Name :</div>
                            <div class="col-6 col-md-8 border-bottom border-start p-3">{{ $info->name }}</div>
                            <div class="col-6 col-md-4 info border-bottom p-3">Designation :</div>
                            <div class="col-6 col-md-8 border-bottom border-start p-3">{{ $info->designation }}</div>
                            <div class=" col-6 col-md-4 info border-bottom p-3">Address :</div>
                            <div class=" col-6 col-md-8 border-bottom border-start p-3">{{ $info->address }}</div>
                            <div class=" col-6 col-md-4 info border-bottom p-3">Phone :</div>
                            <div class=" col-6 col-md-8 border-bottom border-start p-3">{{ $info->phone }}</div>
                            <div class=" col-6 col-md-4 info border-bottom p-3">Email :</div>
                            <div class=" col-6 col-md-8 border-bottom border-start p-3">{{ $info->email }}</div>
                            <div class=" col-6 col-md-4 info border-bottom p-3">Linkedin :</div>
                            <div class=" col-6 col-md-8 border-bottom border-start p-3">{{ $info->linkedin }}</div>
                            <div class=" col-6 col-md-4 info border-bottom p-3">Facebook :</div>
                            <div class=" col-6 col-md-8 border-bottom border-start p-3">{{ $info->facebook }}</div>
                            <div class=" col-6 col-md-4 info border-bottom p-3">Youtube :</div>
                            <div class=" col-6 col-md-8 border-bottom border-start p-3">{{ $info->youtube }}</div>
                            <div class=" col-6 col-md-4 info border-bottom p-3">Twitter :</div>
                            <div class=" col-6 col-md-8 border-bottom border-start p-3">{{ $info->twitter }}</div>
                        </div>

                        <a href="#" class="edit" data-item="{{ $info }}"
                        data-updateurl="{{ route('update-contact-info', $info->id) }}"
                        data-updateimage="{{ getImage($info->image) }}"> <button type="submit" class="btn btn-primary mt-4">Edit Info</button></a>

                    @endforeach


                </div>
            </div>
        </div>
    </div>

    {{-- -------------------------add modal----------------------- --}}

    <div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">ADD Personal Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-contact-info') }}" class="forms-sample" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <div class="upload-img-box">
                                <img id="updateimage" src="{{ getDefaultImage() }}">
                                <input class="form-control" type="file" name="image" id="image" accept="image/*"
                                    onchange="previewFile(this)">
                                <div class="upload-img-box-icon">
                                    <i class="bi bi-camera-fill"></i>
                                    <p class="m-0"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    value="">
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
                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="address" name="address" cols="10" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="phone" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="email" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="linkedin" class="col-sm-3 col-form-label">Linkedin</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="linkedin" name="linkedin"
                                    placeholder="linkedin" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="facebook" name="facebook"
                                    placeholder="facebook" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="youtube" class="col-sm-3 col-form-label">Youtube</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="youtube" name="youtube"
                                    placeholder="youtube" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pinterest" class="col-sm-3 col-form-label">Pinterest</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="pinterest" name="pinterest"
                                    placeholder="pinterest" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="twitter" name="twitter"
                                    placeholder="twitter" value="">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Save</button>
                        <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- -----------------------------edit modal----------------------- --}}

    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="varyingModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">ADD IMAGE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_action" action="" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row mb-3">
                            <label for="image" class="col-sm-3 col-form-label">Image:</label>
                            <div class="col-sm-9">
                                <div class="upload-img-box">
                                    <img id="updateImage" src="{{ getDefaultImage() }}">
                                    <input class="form-control" type="file" name="image" id="image"
                                        accept="image/*" onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="bi bi-camera-fill"></i>
                                        <p class="m-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="name"
                                    value="">
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
                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="address" name="address" cols="10" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="phone" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="email" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="linkedin" class="col-sm-3 col-form-label">Linkedin</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="linkedin" name="linkedin"
                                    placeholder="linkedin" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="facebook" name="facebook"
                                    placeholder="facebook" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="youtube" class="col-sm-3 col-form-label">Youtube</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="youtube" name="youtube"
                                    placeholder="youtube" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pinterest" class="col-sm-3 col-form-label">Pinterest</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="pinterest" name="pinterest"
                                    placeholder="pinterest" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="twitter" class="col-sm-3 col-form-label">Twitter</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" id="twitter" name="twitter"
                                    placeholder="twitter" value="">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Add</button>
                        <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('style')
    <style>
        .info {
            font-size: 18px;
            font-weight: 600;

        }

        .upload-img-box {
            height: 200px;
            width: 50%;
        }

        .images {
            width: 150px !important;
            height: 150px !important;
            border-radius: 0 !important;

        }

        .action-icon {
            height: 19px !important;
            width: 19px !important;
        }
    </style>
@endpush

@push('script')
    <script>
        $(function() {
            'use strict'
            $('.edit').on('click', function(e) {
                e.preventDefault();

                const modal = $('#edit_modal');
             
                const item = $(this).data('item');
                modal.find('textarea[name=address]').html(item.address)

                modal.find('input[name=name]').val($(this).data('item').name)
                modal.find('input[name=email]').val($(this).data('item').email)
                modal.find('input[name=phone]').val($(this).data('item').phone)
                modal.find('input[name=designation]').val($(this).data('item').designation)
                modal.find('input[name=linkedin]').val($(this).data('item').linkedin)
                modal.find('input[name=facebook]').val($(this).data('item').facebook)
                modal.find('input[name=pinterest]').val($(this).data('item').pinterest)
                modal.find('input[name=youtube]').val($(this).data('item').youtube)
                modal.find('input[name=twitter]').val($(this).data('item').twitter)

                let route = $(this).data('updateurl');
                let image = $(this).data('updateimage'); 
               console.log(image);
               
                $('#form_action').attr("action", route)
                $('#updateImage').attr("src", image)
                modal.modal('show')
            })
        })


    </script>
@endpush

