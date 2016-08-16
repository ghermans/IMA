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
                                    <button class="btn btn-default">Create new login</button>
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