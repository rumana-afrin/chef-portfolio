@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="example">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-dot">
                    <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}} Page</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('setting') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <h6 class="card-title text-decoration-underline fs-4">Banner Image</h6>

                            <div class="upload-img-box">
                                <img id="updateImageUrl" src="{{ getimage(getOption('home_banner_image')) }}">
                                <input class="form-control" type="file" name="home_banner_image" id="homeBannerImage"
                                    accept="image/*" onchange="previewFile(this)">
                                <div class="upload-img-box-icon">
                                    <i class="bi bi-camera-fill"></i>
                                    <p class="m-0"></p>
                                </div>
                            </div>

                        </div>

                        <h6 class="card-title text-decoration-underline fs-4">Left Side</h6>
                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="home_title"
                                    placeholder="Title" value="{{ getOption('home_title') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="subtitle" class="col-sm-3 col-form-label">Subtitle</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="subtitle" name="home_subtitle"
                                    autocomplete="off" placeholder="Subtitle" value="{{ getOption('home_subtitle') }}">
                            </div>
                        </div>
                        <br />
                        <h6 class="card-title text-decoration-underline fs-4">Right Side</h6>
                        <div class="row">
                            <div class="repeater-container">
                                @if (count($experiences) > 0)
                                    @foreach ($experiences as $experience)
                                        <div id="repeater">
                                            <!-- Initial Repeater Item -->
                                            <div class="repeater-item d-flex  mt-2">
                                                <input class="form-control w-90" type="text" name="home_experience[]"
                                                    placeholder="Enter Value" value="{{ $experience->experience }}" />
                                                <button type="button" class="remove-btn btn btn-primary ms-4"
                                                    onclick="removeItem(event, this)"><i
                                                        data-feather="x-circle"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div id="repeater">
                                        <!-- Initial Repeater Item -->
                                        <div class="repeater-item d-flex">
                                            <input class="form-control w-90" type="text" name="home_experience[]"
                                                placeholder="Enter Value" value="" />
                                            <button type="button" class="remove-btn btn btn-primary ms-4"
                                                onclick="removeItem(event, this)"><i data-feather="x-circle"></i></button>
                                        </div>
                                    </div>
                                @endif

                                <button type="button" class="add-btn btn btn-primary mt-4"
                                    onclick="addExperienceItem(event)">Add
                                    Experience</button>
                            </div>
                        </div>
                        {{-- -----------------------------------------skill--------------- --}}
                        <div class="row mb-3 mt-4">
                            <h6 class="card-title text-decoration-underline fs-4">Skill Image</h6>

                            <div class="upload-img-box">

                                <img id="updateImageUrl" src="{{ getimage(getOption('home_skill_image')) }}">
                                <input class="form-control" type="file" name="home_skill_image" id="homeBannerImage"
                                    accept="image/*" onchange="previewFile(this)">
                                <div class="upload-img-box-icon">
                                    <i class="bi bi-camera-fill"></i>
                                    <p class="m-0"></p>
                                </div>

                            </div>
                            {{-- <input type="file" class="myDropify" name="home_skill_image"/> --}}
                        </div>
                        <div class="row">
                            <div class="repeater-container">
                                @if (count($skills) > 0)
                                    @foreach ($skills as $skill)
                                        <div id="skill-repeater">
                                            <!-- Initial Repeater Item -->
                                            <div class="repeater-item d-flex mt-2">
                                                <input class="form-control w-90" type="text" name="home_skill[]"
                                                    placeholder="Enter Value" value="{{$skill->skill}}" />
                                                <button type="button" class="remove-btn btn btn-primary ms-4"
                                                    onclick="removeItem(event, this)"><i
                                                        data-feather="x-circle"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div id="skill-repeater">
                                        <!-- Initial Repeater Item -->
                                        <div class="repeater-item d-flex">
                                            <input class="form-control w-90" type="text" name="home_skill[]"
                                                placeholder="Enter Value" value="" />
                                            <button type="button" class="remove-btn btn btn-primary ms-4"
                                                onclick="removeItem(event, this)"><i data-feather="x-circle"></i></button>
                                        </div>
                                    </div>
                                @endif
                                <button type="button" class="add-btn btn btn-primary mt-4"
                                    onclick="addSkillItem(event)">Add Skill</button>
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
            color: #4655fa;
        }
    </style>
@endpush
@push('script')
    <!--start repeater -->
    <script>
        // Add a new repeater item
        function addExperienceItem(event) {
            event.preventDefault(); // Prevent default button behavior
            const repeater = document.getElementById('repeater');
            const newItem = document.createElement('div');
            newItem.className = 'repeater-item d-flex';
            newItem.innerHTML = `
             <input class="form-control w-90 mt-2" type="text" name="home_experience[]" placeholder="Enter Value" />
        <button type="button" class="remove-btn btn btn-primary ms-4 mt-2" onclick="removeItem(event, this)">
            <i data-feather="x-circle"></i>
        </button>
        `;
            repeater.appendChild(newItem);
            feather.replace();
        }

        function addSkillItem(event) {
            event.preventDefault(); // Prevent default button behavior
            const repeater = document.getElementById('skill-repeater');
            const newItem = document.createElement('div');
            newItem.className = 'repeater-item d-flex';
            newItem.innerHTML = `
             <input class="form-control w-90 mt-2" type="text" name="home_skill[]" placeholder="Enter Value" />
        <button type="button" class="remove-btn btn btn-primary ms-4 mt-2" onclick="removeItem(event, this)">
            <i data-feather="x-circle"></i>
        </button>
        `;
            repeater.appendChild(newItem);
            feather.replace();
        }

        // Remove a repeater item
        const button = event.target;

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
        // -------------------------------------------------------------------------------
        // -------------------------------------------------------------------------------
        // -------------------------------------------------------------------------------
        // Add a new repeater item
        //     function addItem(event) {
        //         event.preventDefault(); // Prevent default button behavior

        //         // Determine which button triggered the event
        //         const button = event.target;
        //         const repeaterContainer = button.closest('.repeater-container');
        //         const repeater = repeaterContainer.querySelector('#repeater, #skill-repeater'); //The querySelector() method searches inside the identified repeater-container for either an element with the ID #repeater or #skill-repeater.

        //         // Create the new item
        //         const newItem = document.createElement('div');
        //         newItem.className = 'repeater-item d-flex';
        //         newItem.innerHTML = `
    //     <input class="form-control w-90 mt-2" type="text" name="dynamicField[]" placeholder="Enter Value" />
    //     <button type="button" class="remove-btn btn btn-primary ms-4 mt-2" onclick="removeItem(event, this)">
    //         <i data-feather="x-circle"></i>
    //     </button>
    // `;

        //         // Append the new item to the correct repeater
        //         repeater.appendChild(newItem);

        //         // Re-render Feather icons
        //         feather.replace();
        //     }
    </script>
@endpush
