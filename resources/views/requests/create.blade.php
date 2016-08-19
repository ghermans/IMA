@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create new request.
                    </div>

                    <div class="panel-body">
                        <form action="" method="POST" class="form-horizontal">

                            {{-- CSRF token --}}
                            {{ csrf_field() }}

                            {{-- Employee form-group --}}
                            <div class="form-group">
                                <label for="employee" class="col-sm-2 control-label">
                                    Employee: <span class="text-danger">*</span>
                                </label>

                                <div class="col-sm-5">
                                    <select class="form-control" name="employee" id="employee">
                                        <option value="" selected> --select the employee-- </option>

                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}"> {{ $user->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Permission type(s) form-group --}}
                            <div class="form-group">
                                <label for="perms" class="col-sm-2 control-label">
                                    Permission(s): <span class="text-danger">*</span>
                                </label>

                                <div class="col-sm-5">
                                    <select class="form-control" multiple name="permissions" id="perms">
                                        <option value="" selected>-- Select your permission(s) --</option>

                                        @foreach($perms as $perm)
                                            <option value="{{ $perm->id }}"> {{ $perm->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Description form-group --}}
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">
                                    Description <span class="text-danger">*</span>
                                </label>

                                <div class="col-sm-5">
                                    <textarea class="form-control" placeholder="Description" name="description" id="description" rows="7"></textarea>
                                </div>
                            </div>

                            {{-- Submit & Reset form-group --}}
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary">Insert</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection