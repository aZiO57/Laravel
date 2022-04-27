@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($ads as $ad)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{$ad->title}}</div>

                <div class="card-body">
                    <img width="100%" src="{{ $ad->image }}">
                </div>
                <div class="card-footer">
                    <span class="price">{{ $ad->price }}Eur</span>
                    <a class="btn btn-primary" href="{{ route('ad.show',$ad->id) }}">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach($ads as $ad)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{$ad->title}}</div>

                <div class="card-body">
                    <img width="100%" src="{{ $ad->image }}">
                </div>
                <div class="card-footer">
                    <span class="price">{{ $ad->price }}Eur</span>
                    <a class="btn btn-primary" href="{{ route('ad.show',$ad->id) }}">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
