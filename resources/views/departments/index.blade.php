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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- /Search component --}}

            {{-- content --}}
            <div class="panel panel-default">
                <div class="panel-heading">Departments overview:</div>

                <div class="panel-body">
                    @if(count($departments) === 0)
                        <div class="alert alert-info">
                            There are no departments in the system.
                        </div>
                    @else
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            {{-- /Content --}}
        </div>
    </div>
</div>
@endsection