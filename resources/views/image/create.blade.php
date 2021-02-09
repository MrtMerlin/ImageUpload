@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <a href="{{ url()->previous() }}" class="btn btn-primary float-right">Back</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Upload Images Here</h4>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" id="image-upload" action="{{ url('save') }}">
                    @csrf
                    <div class="row">
                        <div class="offset-md-4 col-md-4">
                            <div class="form-group m-5">
                                <input type="file" name="image" placeholder="Choose Your Image" id="image">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mp-5">
                        <div class="col-md-2">
                            <label>Description</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}"/>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="offset-md-10 col-md-2">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
