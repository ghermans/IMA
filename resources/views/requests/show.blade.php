@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Content --}}
            <div class="col-sm-9">
                {{-- Request info --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Request information
                        <span class="pull-right {{ $request->status->css_class }}"> {{ $request->status->name }} </span>
                    </div>

                    {{-- Permission info --}}
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Requested permission:</strong>

                            <span class="pull-right">
                                {{ $request->permission->application->name }} - {{ $request->permission->name }}
                            </span>
                        </li>
                    </ul>
                    {{-- /Permission info --}}

                    <div class="panel-body">{!!  $request->description !!}</div>
                </div>
                {{-- /Request info --}}

                {{-- Comments --}}
                @if (count($request->comments) === 0)
                    <div class="alert alert-info">
                        There are no comments for this request. You can <a data-toggle="modal" data-target="#newComment" href="#">Create one here</a>
                    </div>
                @else
                    {{-- Comments display --}}
                    <div class="row">
                        @foreach($request->comments as $comment)
                            <div class="col-sm-1">
                                <div class="thumbnail">
                                    @if (! empty($comment->user->avatar))
                                        <img class="img-responsive user-photo" src="{{ '/avatars/' . $comment->user->avatar }}">
                                    @else
                                        <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-11">
                                <div class="panel panel-comment panel-default">
                                    <div class="panel-heading">
                                        <strong style="margin-right: 5px;">{{ $comment->user->name }}</strong>
                                        <span class="text-muted">commented on {{ Carbon\Carbon::parse($comment->created_at) }}</span>

                                        <div class="btn-group pull-right">
                                            <a class="btn btn-xs btn-success" href="">
                                                <span class="fa fa-warning"></span>
                                            </a>

                                            {{-- The following actions can only be done by the creation user --}}
                                            @if ((int) $comment->user_id === auth()->user()->id)
                                                <a class="btn btn-xs btn-success" href="">
                                                    <span class="fa fa-pencil"></span>
                                                </a>
                                                <a class="btn btn-xs btn-success" href="{{ route('comment.destroy', ['rid' => $request->id, 'cid' => $comment->id]) }}">
                                                    <span class="fa fa-close"></span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="panel-body">{{ $comment->comment }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- /Comments display --}}

                    {{-- Create comment --}}
                    <div class="col-sm-12">
                        <form action="{{ route('comment.new', ['rid' => $request->id]) }}" method="POST" class="form-horizontal">
                            {{-- CSRF field --}}
                            {{ csrf_field() }}

                            {{-- Comment input form-group --}}
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Your comment" name="comment" rows="7"></textarea>
                            </div>

                            {{-- Submit & reset --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                    {{-- /Create comment --}}
                @endif
                {{-- /Comments --}}
            </div>
            {{-- /Content --}}

            {{-- Affected employee information --}}
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Affected employee:</div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Name:</strong>
                            <span class="pull-right">{{ $request->employee->name }}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong>
                            <span class="pull-right">{{ $request->employee->email }}</span>
                        </li>
                    </ul>
                </div>

                {{-- Handlings --}}
                <div class="btn-group">
                    <a href="" class="btn btn-warning">Delete request</a>
                    <a href="" class="btn btn-danger">Close Request</a>
                </div>
                {{-- /Handlings --}}
            </div>
            {{-- /Affected employee information --}}

            {{-- Partials --}}
            @if (count($request->comments) === 0)
                @include('requests.partials.comment')
            @elseif((int) $comment->user_id === auth()->user()->id)
                {{-- TODO: build up the the change modal --}}
                {{-- TODO: build up the report model --}}
            @endif
            {{-- /Partials --}}
        </div>
    </div>
@endsection