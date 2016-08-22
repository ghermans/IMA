@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {{-- Heading panel --}}
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left">
                            <form action="" method="POST" class="form-inline">
                                <input type="text" name="term" class="form-control" placeholder="Search permission">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-search"></span>
                                </button>
                            </form>
                        </div>

                        <div class="pull-right">
                            <button data-toggle="modal" data-target="#addApplication" class="btn btn-info">Add application</button>
                            <button data-toggle="modal" data-target="#addPermission" class="btn btn-primary">Create permission</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End heading panel --}}

            {{-- Sidepanel --}}
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Menu:
                    </div>

                    <div class="list-group">
                        <a class="list-group-item" href="">Applications</a>
                        <a class="list-group-item active" href="">Permissions</a>
                    </div>
                </div>
            </div>
            {{-- End sidepanel --}}

            {{-- Content --}}
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Permissions</div>

                    <ul class="list-group">
                        @foreach($permissions as $perm)
                            <li class="list-group-item">
                                {{ $perm->application->name }}  - {{ $perm->name }}

                                <span class="pull-right">
                                    <a href="" class="label label-danger">Delete</a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- End content --}}

            {{-- Includes --}}
            @include('permissions.partials.add-permission')
            @include('permissions.partials.add-platform')

        </div>
    </div>
@endsection