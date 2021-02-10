@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url()->previous() }}" class="btn btn-primary float-right">Back</a>
        </div>
    </div>
    <div class="card m-3">
        <img src="{{ asset('/storage/images/' . str_replace('public/images/', '', $image->path)) }}" />
        <div class="card-body">
            <h5 class="card-title">{{ $image->name }} Uploaded By {{ $image->creator->name }}</h5>
            <div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <span>Description : </span>
                    </div>
                    <div class="col-md-8">
                        <span>{{ $image->description }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <span>Up Votes :  {{ $upVote }}</span>
                            </div>
                            <div class="col-md-6">
                                <span>Down Votes :  {{ $downVote }}</span>
                            </div>
                        </div>
                        <span class="vote">
                        </span>
                    </div>
                    @auth
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('update', $image->id) }}" class="btn btn-primary" style="margin-top: -35px">Update</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('delete', $image->id) }}" class="btn btn-danger" style="margin-top: -35px">Delete</a>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
