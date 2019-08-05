@extends('layouts.master')

@section('title')
Ypslon Shop
@endsection

@section('content')

@foreach($musics->chunk(3) as $musicChunk)
<div class="row">
  @foreach($musicChunk as $music)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="height: auto; width: 350px;">
        <img src="{{asset('images/musics/' . $music->image)}}">
      <div class="caption">
        <h3>{{ $music->author . ' - ' . $music->name }}</h3>
        <div class="clearfix">
          <div> {{ $music->price . ' €' }}</div>
          <a href="#" class="btn btn-primary mb-2 pull-right" role="button">Add To Cart</a>
    </div>
  </div>
</div>
</div>
  @endforeach
</div>

@endforeach

@endsection