@extends('master')

@section('title', "$profile->firstname", "$profile->surename")

@section('content')

    <div class="row">
        <h3>
            {{ $profile->firstname }} {{ $profile->insertion }} {{ $profile->surename }}
        </h3>
    </div>

    <div class="row">
        <div class="col-md-6">
            Email:<br>
            Tel:<br>
            @if($company != NULL)
            Company:
            @elseif($school != NULL)
            School:
            @endif
        </div>
        <div class="col-md-6">
            {{ $profile->email }}<br>
            {{ $profile->phonenumber }}<br>

            @if(isset($company) or !empty($company))
                <a href="{{ route('company.show', $company->id) }}">{{ $company->name }}</a>
            @elseif($school != NULL)
                <a href="{{ route('school.show', $school->id) }}">{{ $school->name }}</a>
            @endif
        </div>
        <div class="col-md-6">
            @if(!empty($interships))
                <h3>Interships</h3>
                @foreach($interships as $intership)
                    <a href="{{ Route('internship.show', $intership->id) }}">
                    {{ $intership->name }} | Startdate {{ $intership->begin }}, Enddate {{ $intership->end }}<br>
                </a>
                @endforeach
            @endif
        </div>

        @if(Auth::check())
            @if(Auth::user()->getRole() == 'student')
        <div class="col-md-6">

            <?php
/*            $contact = \App\Contact::findorfail (Auth::user ()->contact_id);
            */?><!--
                <h3>Tools</h3>
            @foreach($internshiptoolArray as $tool)
                <a href="{{ Route('tool.show', $tool->id) }}">
                    {{ $tool->name }}
                    {!! Form::open(['route' => ['internshiptool.destroy', $tool->id], 'method' => 'delete', 'class'=>'delete inline']) !!}
                    {!! Form::hidden('internship_user_id',Auth::user()->id, NULL, ['class' => 'form-control', 'required']) !!}
                    {!! Form::submit("trash", ['class' => 'btn btn-danger delete ']) !!}
                    {!! Form::close() !!}
                    <br>
                </a>
            @endforeach
            {{--{!! Form::open(['route' => ['internshiptool.update', $contact->id], 'method' => 'put', 'class'=>'delete inline']) !!}--}}
            <div class="form-group">
                {{--{!! Form::hidden('internship_user_id',Auth::user()->id, NULL, ['class' => 'form-control', 'required']) !!}
                {!! Form::label('Tools', 'Tools:') !!}
                {!! Form::select('tool', $toolsArray, NULL, ['class' => 'form-control']) !!}--}}
            </div>


                <div class="form-group col-md-12">
                {{--{!! Form::submit('add tool', ['class' => 'btn btn-primary form-control ']) !!}--}}
            </div>
            {{--{!! Form::close() !!}--}}-->
        </div>
            @endif
        @endif

        @if(Auth::user()->getRole() == 'admin' OR Auth::user()->getRole() == 'student')
            <div class="col-md-6">
                @if($profile->education_offer_id != NULL OR !empty($profile->education_offer_id))
                    <?php $education = \App\Education_offer::findorfail($profile->education_offer_id); ?>
                    Your current Education: {{ $education->name }}
                @else
                    Your have not selected your current Education
                @endif
                {!! Form::open(['route' => ['profile.update', $profile->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('Education', 'Education:') !!}
                    {!! Form::select('education_offer_id', $educationArray, NULL, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-12">
                    {!! Form::submit('Update Education', ['class' => 'btn btn-primary form-control ']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        @endif

    </div>

    <div>
        <a href="{{ route('contact.edit', $profile->id) }}" class="btn btn-default"> <span class="glyphicon glyphicon-pencil"></span></a>
    </div>
@endsection