@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Message') }}</div>

                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('messages.send') }}">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{$receiver_id}}">
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
