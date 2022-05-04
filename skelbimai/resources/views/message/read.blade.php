@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$receiver->name }}</div>

                    <div class="card-body">
                        @foreach($messages as $message)
                            <div class="message-wrapper
                            @if($message->receiver_id == $receiver->id)
                                received
                            @else
                                sent
                            @endif
                                ">
                                <p>{{$message->message}}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('messages.send') }}">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{$receiver->id}}">
                            <textarea name="message">

                            </textarea>
                            <input type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
