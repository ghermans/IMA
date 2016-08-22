<div class="panel panel-default">
    <div class="panel-heading">Account Information</div>

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('profile.settings.information') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            {{-- Name form-group --}}
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">
                    Username: <span class="text-danger">*</span>
                </label>

                <div class="col-md-8">
                    <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" placeholder="Your Account name" />
                </div>
            </div>

            {{-- Email form-group --}}
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">
                    Email Address: <span class="text-danger">*</span>
                </label>

                <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" placeholder="Your email address">
                </div>
            </div>

            {{-- Profile avatar form-group --}}
            <div class="form-group">
                <label for="avatar" class="col-sm-2 control-label"> Profile image: </label>

                <div class="col-sm-8">
                    <input type="file" name="avatar" id="avatar">
                </div>
            </div>

            {{-- SUBMIT & REST form-group --}}
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
            </div>

        </form>
    </div>
</div>