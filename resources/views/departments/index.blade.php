@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            {{-- Search component --}}
            <div class="panel panel-default">
                <div class="panel-heading">Search department:</div>
                <div class="panel-body">
                    <form action="" method="POST" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-sm-5">
                                <input type="text" placeholder="Department name" class="form-control" name="term">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="" class="btn btn-default">New department</a>
                                <a href="" class="btn btn-default">New department team</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- /Search component --}}

            {{-- content --}}
            @if(count($departments) === 0)
                <div class="alert alert-info">
                    There are no departments in the system.
                </div>
            @else
                <div class="panel panel-default">
                    <div class="panel-heading">Departments overview:</div>

                    <div class="panel-body">
                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name:</th>
                                    <th>Manager:</th>
                                    <th>Created at:</th>
                                    <th></th> {{-- Functions --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                    <td><code>#D{{ $department->id }}</code></td>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->managers->name }}</td>
                                    <td>{{ $department->created_at }}</td>
                                    <td></td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            {{-- /Content --}}

            {{-- Includes --}}
            {{-- /Includes --}}
        </div>
    </div>
</div>
@endsection