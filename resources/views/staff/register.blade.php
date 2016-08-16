@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new staff member</div>

                    <div class="panel-body">
                        <form action="" method="POST" class="form-horizontal">

                            {{-- CSRF token --}}
                            {{ csrf_field() }}

                            {{-- Name form-group --}}
                            <div class="form-group">
                                <label for="name" class="control-label col-md-2">
                                    Name: <span class="text-danger">*</span>
                                </label>

                                <div class="col-sm-8">
                                    <input type="text" id="name" placeholder="Example: John Doe" class="form-control">
                                </div>
                            </div>

                            {{-- Email form-group --}}

                            {{-- Office phone number form-group --}}
                            <div class="form-group">
                                <label for="office" class="control-label col-md-2">
                                    Office phone: <span class="text-danger">*</span>
                                </label>

                                <div class="col-sm-8">
                                    <input type="text" id="office" placeholder="Office phone" class="form-control">
                                </div>
                            </div>

                            {{--cellphone number form-group --}}
                            <div class="form-group">
                                <label for="cellphone" class="control-label col-md-2">
                                    Mobile number: <span class="text-danger">*</span>
                                </label>

                                <div class="col-sm-8">
                                    <input id="cellphone" type="text" placeholder="Mobile number" class="form-control" name="mobile_number'">
                                </div>
                            </div>

                            {{-- Submit and rest form-group --}}
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