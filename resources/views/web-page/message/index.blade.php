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
                        data-bs-target="#varyingModal" data-bs-whatever="@getbootstrap" disabled>Add Message</button>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:30px;">#</th>
                                    <th>name</th>
                                    <th>Email</th>
                                    <th class="responsive-description">Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td class="responsive-description">{{ $message->phone }}</td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ $message->message }} Lorem ipsum dolor sit amet. Lorem ipsum dolor sit. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum quidem sunt aspernatur perspiciatis consectetur aperiam numquam! Eum tempora odit accusantium earum expedita neque perspiciatis itaque facere aliquid totam similique ipsam eligendi rerum, eaque fugit nemo quam deleniti, deserunt reprehenderit animi numquam. Illo quibusdam eum reprehenderit omnis asperiores alias harum quidem!</td>

                                        <td>

                                            
                                            <a href="#" class="deleteItem"
                                                data-formid="delete_form_{{ $message->id }}" title="delete">
                                                <i class="action-icon" data-feather="trash-2"></i>
                                            </a>
                                            <form action="{{ route('message-delete', $message->id) }}" method="post"
                                                id="delete_form_{{ $message->id }}">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                        </td>
                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- -------------------------add modal----------------------- --}}

    <div class="modal fade" id="varyingModal" tabindex="-1" aria-labelledby="varyingModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varyingModalLabel">Add Job Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-message') }}" class="forms-sample" method="post"
                        enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Name" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email" placeholder="email"
                                    value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" min="1900" max="2100" id="phone"
                                    name="phone" placeholder="phone" value="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="subject" class="col-sm-3 col-form-label">Subject</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" min="1900" max="2100" id="subject"
                                    name="subject" placeholder="subject" value="">
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label for="message" class="col-sm-12 col-form-label">Message</label>
                            <div class="col-sm-12">
                                <textarea  class="form-control" name="message" id="" cols="30" rows="10"></textarea>
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
        .action-icon {
            height: 19px !important;
            width: 19px !important;
        }

        .table {
            /* table-layout: fixed; */
            width: 100%;
            height: auto;
        }

        .table td,
        .table th {
            white-space: normal;
            text-wrap: break-word;
            padding: 8px;
        }

        /* Default: Hide the "Description" column  */
        .responsive-description {
            display: none;
        }

        /* Show the "Description" column when screen width is at least 786px */
        @media (min-width: 786px) {
            .responsive-description {
                display: table-cell;
            }
        }
    </style>
 @endpush

