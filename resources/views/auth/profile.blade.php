@extends('layouts.app')

@section('content')
    <div class="container">(((
        <div class="row">
            {{-- Menu --}}
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>

                    <div class="list-group">
                        <a href="#account" aria-controls="profile" role="tab" data-toggle="tab" class="list-group-item">Account information</a>
                        <a href="#sec" aria-controls="profile" role="tab" data-toggle="tab" class="list-group-item">Security information</a>
                        <a href="#api" aria-controls="profile" role="tab" data-toggle="tab" class="list-group-item">API information</a>
                    </div>
                </div>
            </div>
            {{-- End menu --}}

            {{-- Content --}}
            <div class="col-md-9">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="account">
                        @include('auth.partials.account')
                    </div>

                    <div role="tabpanel" class="tab-pane fade in" id="sec">
                        @include('auth.partials.security')
                    </div>

                    <div role="tabpanel" class="tab-pane fade in" id="api">
                        <passport-personal-access-tokens></passport-personal-access-tokens>
                        <passport-clients></passport-clients>
                        <passport-authorized-clients></passport-authorized-clients>
                    </div>
                </div>
            </div>
            {{-- End content --}}
        </div>
    </div>
@endsection