@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ $ad->title }}</div>

                    <div class="card-body">
                        <div class="col-6">
                           <img src="{{$ad->image}}">
                        </div>
                        <div class="col-6">
                            <p>
                                {{$ad->content}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class ="details">
                        <h2>Additional info</h2>
                        <ul>
                            <li>{{ $ad->price }}</li>
                            <li>{{ $ad->years }}</li>
                            <li>{{ $ad->vin }}</li>
                            <li>{{ $ad->color->name}}</li>
                            <li>{{ $ad->type->name}}</li>
                        </ul>
                </div>        
            </div>
            <div class="row">
                <div class="col-6">
                    <div class ="details">
                        <h2>Contact seller</h2>
                        <ul>
                            <li>{{ $ad->user->email }}</li>
                            <li>{{ $ad->user->name }}</li>
                        </ul>
                    </div>
                </div>        
                <div class="row">
                <div class="col-6">
                    <div class ="details">
                        <h2>Contact seller</h2>
                        <ul>
                            <li>{{ $ad->user->email }}</li>
                            <li>{{ $ad->user->name }}</li>
                        </ul>
                    </div>
                </div>        
                <div class="row">
                <div class="col-7" style="margin: 0 auto 0 auto">
                    <form class="form" method="post" action="{{ route('comment.store') }}">
                        @csrf
                        <div class="form-group">
                            <h4 class="text-center">Post your comment</h4>
                            <textarea name="content" rows="3" class="form-control" placeholder="Your comment"></textarea>
                            <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="post" class="btn btn-primary text" value="Post Comment">
                        </div>
                    </form>
                </div>
                @foreach($ad->comments as $comment)
                        <div class="col-12">
                        @csrf                
                            <div class="card-header row">
                                <div class="col-6">
                                    <li>{{ $ad->user->name }}</li>
                                </div>
                                <div class="col-6 text-end">
                                    {{ ucfirst($comment->created_at) }}
                                </div>
                            </div>
                            <div class="card-body">
                                <p>{{ $comment->content }}</p>
                            </div>
                    </div> 
                 @endforeach
            </div>
        </div>
    </div>
@endsection