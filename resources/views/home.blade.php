@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
{{-- Images foreach uploaded to display on home page --}}
        @forelse($images as $image)
        {{-- setting height and width of cards created. --}}
        <div class="col-md-4">
            <div class="card m-4" style="width: 22em; height: 26em;">
            {{-- image information to be shown, str replace to correct path --}}
            <img src="{{ asset('/storage/images/' . str_replace('public/images/', '', $image->path)) }}" />
            <div class="card-body">
                <h5 class="card-title">{{ $image->name }} Uploaded By {{ $image->creator->name }}</h5>
                <div class="row">
                    @auth
                    <div class="col-md-3">
                        <a class="btn btn-outline-primary vote vote-{{ $image->id }}" value="up" name="{{ $image->id }}" style="font-size: 10px"><i class="fas fa-arrow-circle-up"></i> Vote</a>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-outline-primary vote vote-{{ $image->id }}" value=down name="{{ $image->id }}" style="font-size: 10px"><i class="fas fa-arrow-circle-down"></i> Vote</a>
                    </div>
                    @endauth
                    <div class="col-md-3">
                        <a href="{{ route('view', $image->id) }}" class="btn btn-primary" style="font-size: 12px">View</a>
                    </div>
                    @auth
                    <div class="col-md-3">
                        <a href="{{ route('delete', $image->id) }}" class="btn btn-danger" style="font-size: 12px">Delete</a>
                    </div>
                    @endauth
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

<script type="text/javascript">

    $(function() {

        $('.vote').on('click', function (event) {
            event.preventDefault();
            var voteId = $(this).attr('name');
            var voteVal = $(this).attr('value');

            // hide voting buttons.
            $('.vote-' + voteId).hide();

            // make ajax request for post of vote.
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


