@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="example">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-dot">
                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home Page</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">

                    <form class="forms-sample">
                        <div class="row mb-3">
                            <h6 class="card-title text-decoration-underline fs-4">Banner Image</h6>
                            <input type="file" class="myDropify" />
                        </div>

                        <h6 class="card-title text-decoration-underline fs-4">Left Side</h6>
                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="title"
                                    placeholder="Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleInputSubtitle" class="col-sm-3 col-form-label">Subtitle</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputSubtitle" name="subtitle"
                                    autocomplete="off" placeholder="Subtitle">
                            </div>
                        </div>
                        <br />
                        <h6 class="card-title text-decoration-underline fs-4">Right Side</h6>
                        <div class="row">
                            <div class="repeater-container">

                                <div id="repeater">
                                    <!-- Initial Repeater Item -->
                                    <div class="repeater-item d-flex">
                                        <input class="form-control w-90" type="text" name="dynamicField[]"
                                            placeholder="Enter Value" />
                                        <button type="button" class="remove-btn btn btn-primary ms-4"
                                            onclick="removeItem(event, this)"><i data-feather="x-circle"></i></button>
                                    </div>
                                </div>
                                <button type="button" class="add-btn btn btn-primary mt-4" onclick="addItem(event)">Add
                                    Experience</button>
                            </div>

                        </div>
                        {{-- -----------------------------------------skill--------------- --}}
                        <div class="row mb-3 mt-4">
                            <h6 class="card-title text-decoration-underline fs-4">Skill Image</h6>
                            <input type="file" class="myDropify" />
                        </div>
                        <div class="row">
                            <div class="repeater-container">

                                <div id="skill-repeater">
                                    <!-- Initial Repeater Item -->
                                    <div class="skill-repeater-item d-flex">
                                        <input class="form-control w-90" type="text" name="dynamicField[]"
                                            placeholder="Enter Value" />
                                        <button type="button" class="remove-btn btn btn-primary ms-4"
                                            onclick="removeItem(event, this)"><i data-feather="x-circle"></i></button>
                                    </div>
                                </div>
                                <button type="button" class="add-btn btn btn-primary mt-4" onclick="addItem(event)">Add Skill</button>
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
        h6{
            color: #4655fa;
        }
    </style>
@endpush
@push('script')
    <!--start repeater -->
    <script>
        // Add a new repeater item
        function addItem(event) {
            event.preventDefault(); // Prevent default button behavior

            // Determine which button triggered the event
            const button = event.target;
            const repeaterContainer = button.closest('.repeater-container');
            const repeater = repeaterContainer.querySelector('#repeater, #skill-repeater');

            // Create the new item
            const newItem = document.createElement('div');
            newItem.className = 'repeater-item d-flex';
            newItem.innerHTML = `
        <input class="form-control w-90 mt-2" type="text" name="dynamicField[]" placeholder="Enter Value" />
        <button type="button" class="remove-btn btn btn-primary ms-4 mt-2" onclick="removeItem(event, this)">
            <i data-feather="x-circle"></i>
        </button>
    `;

            // Append the new item to the correct repeater
            repeater.appendChild(newItem);

            // Re-render Feather icons
            feather.replace();
        }
        // Remove a repeater item
        function removeItem(event, button) {
            event.preventDefault(); // Prevent default button behavior
            const repeaterItem = button.closest('.repeater-item');

            // Check if there is more than one item before removing
            const repeater = button.closest('#repeater, #skill-repeater');
            if (repeater.children.length > 1) {
                repeaterItem.remove();
            } else {
                alert("At least one item is required!");
            }
        }
    </script>
@endpush
