@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(count(auth()->user()->unreadNotifications) === 0)
                    <div class="alert alert-info">
                        You don't have any unread notifications.
                    </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-heading">Notifications:</div>

                        <ul class="list-group">
                            @foreach(auth()->user()->unreadNotifications as $notification)
                                <li class="list-group-item">
                                    <code style="margin-right: 7px;">#N{{ $notification->notifiable_id }}</code>
                                    {{ $notification->data['message'] }}
                                    <span class="pull-right">{{ $notification->created_at }}</span>
                                    {{ $notification->markAsRead() }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection