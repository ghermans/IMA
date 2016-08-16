@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Search panel --}}
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Search Employee</div>
                    <div class="panel-body">
                        <form action="" method="POST" class="form-horizontal">
                            {{-- Search field --}}
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="Search employee" name="name" />
                                </div>
                            </div>
                            {{-- END search field --}}

                            {{-- SUBMIT and create new form-group --}}
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ route('staff.register') }}" class="btn btn-default">Create new login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End serach panel --}}

        {{-- Content --}}
        <div class="row">
            <div class="col-md-12">
                @if(count($logins) > 0)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            {{-- Overview table --}}
                            <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name:</th>
                                        <th>Email</th>
                                        <th>Created at</th>
                                        <th></th> {{-- Options --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logins as $login)
                                        <tr>
                                            <td><code>#U{{ $login->id }}</code></td>
                                            <td> {{ $login->name }} </td>
                                            <td> {{ $login->email }}</td>
                                            <td> {{ $login->created_at }}</td>

                                            {{-- Functions & options --}}
                                            <td>
                                                <a href="" class="label label-primary">Show</a>
                                                <a href="" class="label label-warning">Edit</a>
                                                <a href="" class="label label-danger">Delete</a>
                                            </td>
                                            {{-- End functions & options --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- End overview table --}}


                            {{-- Pagination --}}
                            {{ $logins->render() }}
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">
                        There are no staff member logins for this platform.
                    </div>
                @endif
            </div>
        </div>
        {{-- End content --}}
    </div>
@endsection