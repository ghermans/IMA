@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{-- Content --}}
            <div class="col-sm-9">
                {{-- Request info --}}
                <div class="panel panel-default">
                    <div class="panel-heading">Request information</div>
                    <div class="panel-body">{{ $request->description }}</div>
                </div>
                {{-- /Request info --}}

                {{-- Comments --}}
                @if (count($request->comments) === 0)
                    <div class="alert alert-info">
                        There are no comments for this request. You can <a href="">Create one here</a>
                    </div>
                @else
                    {{-- Comments display --}}
                    <div class="col-sm-1">
                        <div class="thumbnail">
                            <img class="img-responsive user-photo" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png">
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>myusername</strong> <span class="text-muted">commented 5 days ago</span>
                            </div>
                            <div class="panel-body">
                                Panel content
                            </div>
                        </div>
                    </div>
                    {{-- /Comments display --}}

                    {{-- Create comment --}}
                    <form action="" method="POST" class="form-horizontal">
                        {{-- CSRF field --}}
                        {{ csrf_field() }}

                        {{-- Comment input form-group --}}
                        <div class="form-group">
                            <textarea name="comment" rows="7"></textarea>
                        </div>

                        {{-- Submit & reset --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </form>
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
            </div>
            {{-- /Affected employee information --}}

            {{-- Partials --}}
            @if (count($request->comments) === 0)
                @include('requests.partials.comment')
            @endif
            {{-- /Partials --}}
        </div>
    </div>
@endsection