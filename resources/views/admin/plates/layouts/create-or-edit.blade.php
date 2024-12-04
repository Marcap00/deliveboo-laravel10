@extends('layouts.app')

@section('scss')
    @vite('resources/sass/plate-create-or-edit.scss')
@endsection

@section('content')
    <div class="container">
        @include('partials.go-back-btn')
    </div>
    <div class="container d-flex justify-content-center">
        <form action="@yield('form-action')" class="form-control w-75 shadow p-5" method="POST" enctype="multipart/form-data">
            @csrf
            @yield('form-method')

            <h2 class="text-decoration-underline text-center turquoise mb-3">@yield('form-title')</h2>
            <div class="row mb-3">
                <div class="col-12 col-lg-6">
                    <label for="image" class="form-label turquoise">Choose Image</label>
                    <input type="file" class="form-control" name="image" id="image"
                        value="{{ old('name', $plate->image) }}">
                    @error('image')
                        <small><i class="text-danger">{{ $message }}</i></small>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-6">
                    <label for="name" class="form-label turquoise">Plate Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ old('name', $plate->name) }}" required>
                    @error('name')
                        <small><i class="text-danger">{{ $message }}</i></small>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="ingredient_description" class="form-label turquoise">Ingredients Description</label>
                    <textarea class="form-control" name="ingredient_description" id="ingredient_description" rows="3">{{ old('ingredient_description', $plate->ingredient_description) }}</textarea>
                    @error('ingredient_description')
                        <small><i class="text-danger">{{ $message }}</i></small>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="description" class="form-label turquoise">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $plate->description) }}</textarea>
                    @error('description')
                        <small><i class="text-danger">{{ $message }}</i></small>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-6">
                    <label for="price" class="form-label turquoise">Price</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price"
                        value="{{ old('price', $plate->price) }}" required>
                    @error('price')
                        <small><i class="text-danger">{{ $message }}</i></small>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-6">
                    <input type="checkbox" name="visible" class="form-check-input" value="1" id="visible"
                        {{ old('visible', $plate->visible ?? false) ? 'checked' : '' }}>
                    <label for="visible" class="form-check-label turquoise">Visible</label>
                    @error('visible')
                        <small><i class="text-danger">{{ $message }}</i></small>
                    @enderror
                </div>
            </div>
            <div class="btns p-2">
                <button type="submit" class="btn btn-turquoise">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>
@endsection
