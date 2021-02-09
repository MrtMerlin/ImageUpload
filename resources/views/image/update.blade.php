@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url()->previous() }}" class="btn btn-primary float-right">Back</a>
            </div>
        </div>
        <div class="card m-3">
            <h5 class="card-title text-center mt-3">{{ $image->name }}</h5>
            <img src="{{ asset('/storage/images/' . str_replace('public/images/', '', $image->path)) }}" />
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" id="image-upload" action="{{ url('save') }}/{{$image->id}}">
                @csrf
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <label>File Name</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $image->name) }}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">
                                <label>Description</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $image->description) }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-11" style="margin-top: 15px;">
                            <span class="vote">
                                <a href="#"><i class="fas fa-arrow-circle-down"></i> Up Votes 0</a>
                                <a href="#"><i class="fas fa-arrow-circle-up"></i> Down Votes 0</a>
                            </span>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
