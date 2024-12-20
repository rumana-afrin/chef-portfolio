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
                    <div class="recipe-name">
                        <h3>{{$recipe->name}}</h3>
                        <img src="{{asset('storage/'. $recipe->image)}}" alt="">
                    </div>
                    <div class="description mt-5">
                      <h4>Description</h4>
                        <p>{!! $recipe->description !!}</p>
                    </div>
                    <div class="ingredients mt-5">
                        <h4>Ingredients</h4>
                        <p>{!! $recipe->ingredients !!}</p>
                    </div>
                    <div class="instructions mt-5">
                        <h4>Instructions</h4>
                        <p>{!! $recipe->instructions !!}</p>
                    </div>
                    <div class="nutritious mt-5">
                        <h4>Nutritious</h4>
                        <p>{!! $recipe->nutritious !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

