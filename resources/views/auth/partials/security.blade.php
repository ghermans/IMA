<div class="panel panel-default">
    <div class="panel-heading">Security information</div>

    <div class="panel-body">
        <form action="{{ route('profile.settings.password') }}" class="form-horizontal" method="POST">
            {{ csrf_field() }}

            {{-- password form-group --}}
            <div class="form-group">
                <label for="pass" class="control-label col-sm-3">
                    New password: <span class="text-danger">*</span>
                </label>

                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" placeholder="New password">
                </div>
            </div>

            {{-- Password conformation form-group --}}
            <div class="form-group">
                <label for="pass_conf" class="control-label col-sm-3">
                    Password Confirmation <span class="text-danger">*</span>
                </label>

                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password confirmation" />
                </div>
            </div>


            {{-- SUBMIT & RESET form-group --}}
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-3">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </div>
            </div>

        </form>
    </div>
</div>