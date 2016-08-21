@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {{-- Tab navigation --}}
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#request" aria-controls="request" role="tab" data-toggle="tab">Request info</a>
                        </li>

                        <li role="presentation">
                            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                Comments <span class="label label-info"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- End tab navigation --}}


            {{-- Tab content --}}
            {{-- END tab content --}}

        </div>
    </div>
@endsection