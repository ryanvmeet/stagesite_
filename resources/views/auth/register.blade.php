@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Firstname</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('insertion') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Insertion</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="insertion"
                                           value="{{ old('insertion') }}">

                                    @if ($errors->has('insertion'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('insertion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('Surename') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Surename</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="Surename"
                                           value="{{ old('Surename') }}">

                                    @if ($errors->has('Surename'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Surename') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('Phonenumber') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Phonenumber</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="Phonenumber"
                                           value="{{ old('Phonenumber') }}">

                                    @if ($errors->has('Phonenumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Phonenumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Role</label>
                                <?php
                                $roles = \App\Role::all ();
                                ?>
                                <div class="col-md-6">
                                    <select id="Roles" class="form-control" name="role_id">
                                        @foreach($roles as $role)
                                            @if($role->role != 'admin')
                                                <option id="Role_id_{{$role->id}}" value="{{$role->id}}">{{$role->role}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="col-md-6">
                                        @if ($errors->has('role_id'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('role_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <script type="application/javascript">
                                window.onload = function () {
                                    $('#practical_trainer').hide();
                                    $('#student_teacher').hide()
                                    $('#Roles').change(function () {
                                        var selected_option = $('#Roles option:selected');
                                        if (selected_option.val() == 5) {
                                            $('#practical_trainer').show();
                                        } else {
                                            $('#practical_trainer').hide();
                                        }
                                        if (selected_option.val() == 4) {
                                            $('#teacher').show();
                                        }
                                        else {
                                            $('#teacher').hide();
                                        }
                                        if (selected_option.val() == 4 || selected_option.val() == 3) {
                                            $('#student_teacher').show();

                                        } else {
                                            $('#student_teacher').hide()
                                        }
                                    });
                                };
                            </script>
                            <div id="practical_trainer">
                                <hr>
                                <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Company</label>
                                    <?php
                                    $companies = \App\Company::all ();
                                    ?>
                                    <div class="col-md-6">
                                        <select class="form-control" name="company">
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="col-md-6">
                                            @if ($errors->has('company'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('company') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">
                                    <span class="col-md-12" style="text-align: center"><hr>If you can't find your company in the list</span>
                                </div>

                                <div class="form-group{{ $errors->has('companyname') ? ' has-error' : '' }}">

                                    <label class="col-md-4 control-label">company name</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="companyname" value="{{ old('companyname') }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('companyname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('companynumber') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">company number</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="companynumber" value="{{ old('companynumber') }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('companynumber') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                             <div id="student_teacher">
                                <hr>
                                <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">School</label>
                                    <?php
                                    $schools = \App\School::all ();
                                    ?>
                                    <div class="col-md-6">
                                        <select class="form-control" name="school">
                                            @foreach($schools as $school)
                                                <option value="{{$school->id}}">{{$school->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="col-md-6">
                                            @if ($errors->has('school'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('school') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div id="teacher">
                                    <div class="form-group{{ $errors->has('schoolname') ? ' has-error' : '' }}">
                                    <span class="col-md-12" style="text-align: center"><hr>If you can't find your school in the list</span>
                                </div>

                                    <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">

                                    <label class="col-md-4 control-label">school name</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="schoolname" value="{{ old('schoolname') }}">

                                        @if ($errors->has('schoolname'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('schoolname') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
