@extends('layouts.app')

@section('content')
    <div class="album text-muted">
        <div class="container">
            <div class="row">
                @forelse($images as $image)
                <div class="card m-4" style="width: 30em; height: 30em;">
                    <img src="{{ asset('/storage/images/' . str_replace('public/images/', '', $image->path)) }}" />
                    <div class="card-body">
                        <h5 class="card-title">{{ $image->name }} Uploaded By {{ $image->creator->name }}</h5>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        @auth
                                        <div class="col-md-3">
                                            <a class="btn btn-outline-primary vote vote-{{ $image->id }}" value="up" id="{{ $image->id }}" style="font-size: 10px"><i class="fas fa-arrow-circle-up"></i> Up Vote</a>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="btn btn-outline-primary vote vote-{{ $image->id }}" value=down id="{{ $image->id }}" style="font-size: 10px"><i class="fas fa-arrow-circle-down"></i> Down Vote</a>
                                        </div>
                                        @endauth
                                        <div class="col-md-3">
                                            <a href="{{ route('view', $image->id) }}" class="btn btn-primary" >View</a>
                                        </div>
                                        @auth
                                        <div class="col-md-3">
                                            <a href="{{ route('delete', $image->id) }}" class="btn btn-danger" >Delete</a>
                                        </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-md-12">
                        <p class="text-center">No Images To Display.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(function() {

            $('.vote').on('click', function (event) {
                event.preventDefault();
                var voteId = $(this).attr('id');
                var voteVal = $(this).val();

                $('.vote-' + voteId).attr('disabled', true);

                $.ajax({
                    url: '{{ route('makeVote') }}',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'image_id': voteId,
                        'voteVal' : voteVal,
                    },
                });
            });

        });



    </script>

@endsection


