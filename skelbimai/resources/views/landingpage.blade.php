@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-12"><img width="80%" src="https://s1.15min.lt/static/cache/OTcweDU4MCw2NTl4NjMwLDk4OTEzOCxvcmlnaW5hbCwsaWQ9NjE1MTUzNCZkYXRlPTIwMjElMkYwOSUyRjE5LDE1NjAzNDU4ODk=/elonas-muskas-61479bb43da36.jpg"></div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="alert alert-info" role="alert" >
                Recent Ads
              </div>
            @foreach($recent as $ad)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">{{ $ad->title }}</div>
                        <div class="card-body">
                           <img width="100%" src="{{$ad->image}}">
                        </div>
                        <div class="card-footer">
                            <span class="price">{{$ad->price}} Eur</span>
                            <a class="btn btn-primary float-end" href="{{route('ad.show',$ad->id)}}">
                                Read more
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <div class="alert alert-info" role="alert">
            Popular ads
          </div>
        <div class="row justify-content-center">
            @foreach($popular as $ad)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">{{ $ad->title }}</div>
                        <div class="card-body">
                           <img width="100%" src="{{$ad->image}}">
                        </div>
                        <div class="card-footer">
                            <span class="price">{{$ad->price}} Eur</span>
                            <a class="btn btn-primary float-end" href="{{route('ad.show',$ad->id)}}">
                                Read more
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
