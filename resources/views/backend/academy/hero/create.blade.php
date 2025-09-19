@extends('backend.layouts.app')
@section('title', 'Hero Settings')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hero Section Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Settings</a></div>
                <div class="breadcrumb-item">Hero Section</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <form action="{{ route('settings.hero.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label><b>Hero Title*</b></label>
                                        <input type="text" name="hero_title" class="form-control"
                                            value="{{ $hero->hero_title ?? '' }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label><b>Hero Subtitle</b></label>
                                        <input type="text" name="hero_subtitle" class="form-control"
                                            value="{{ $hero->hero_subtitle ?? '' }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label><b>Hero Text</b></label>
                                        <textarea name="hero_text" class="form-control" rows="3">{{ $hero->hero_text ?? '' }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label><b>Hero Image</b></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="heroImage" name="hero_image">
                                            <label class="custom-file-label" for="heroImage">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mt-4">
                                        @if(!empty($hero->hero_image))
                                            <img src="{{ asset($hero->hero_image) }}" alt="Hero" width="150px">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="text-left my-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success mt-2">{{ session('success') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
