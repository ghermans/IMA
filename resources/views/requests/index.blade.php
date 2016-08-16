@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {{-- Options --}}
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left">
                            <form action="" class="form-inline" method="POST">
                                <input type="text" class="form-control" name="term" placeholder="Search request" />
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-search"></span>
                                </button>
                            </form>
                        </div>

                        <div class="pull-right">
                            <a href="{{ route('requests.register') }}" class="btn btn-primary">Create request</a>
                            <a href="" class="btn btn-info">My requests</a>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
        {{-- END options --}}


        {{-- Content --}}
        @if(count($requests) === 0)
            <div class="alert alert-warning">
                There are no requests open at this moment.
            </div>
        @else
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Requester:</th>
                            <th>Status:</th>
                            <th>Employee:</th>
                            <th>Created at:</th>
                            <th>Last update:</th>
                            <th></th> {{-- Options --}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td> <code>#R{{ $request->id }}</code></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    @if(count($requests) >= 15)
                        {{ $requests->render() }}
                    @endif
                </div>
            </div>
        @endif
        {{-- End content --}}

    </div>
@endsection