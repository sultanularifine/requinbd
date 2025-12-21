@extends('backend.layouts.app')

@section('title', 'Hero Section Settings')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hero Section</h1>
        </div>

        <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label>Title*</label>
                        <input type="text" class="form-control" name="title" 
                               value="{{ old('title', $hero->title ?? '') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" 
                               value="{{ old('description', $hero->description ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>Button Text</label>
                        <input type="text" class="form-control" name="button_text" 
                               value="{{ old('button_text', $hero->button_text ?? '') }}">
                    </div>

                  

                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="url" class="form-control" name="facebook" 
                               value="{{ old('facebook', $hero->facebook ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>LinkedIn</label>
                        <input type="url" class="form-control" name="linkedin" 
                               value="{{ old('linkedin', $hero->linkedin ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="url" class="form-control" name="instagram" 
                               value="{{ old('instagram', $hero->instagram ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>Hero Image</label>
                        <input type="file" class="form-control" name="image">
                        @if(!empty($hero->image))
                            <img src="{{ asset('backend/'.$hero->image) }}" alt="Hero Image" class="mt-2" width="200">
                        @endif
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection
