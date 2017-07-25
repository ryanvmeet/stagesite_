@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>
                    @if(Auth::check())
                        @if(Auth::user()->getRole() == 'practical trainer' OR Auth::user()->getRole() == 'admin')
                            @if(Auth::user()->contact_id == $internship->contact_id)
                                <?php $check = TRUE ?>
                            @endif
                        @endif
                    @endif

                    @if(isset($check))
                        <div class="panel-body">
                            {!! Form::open(['route' => ['internshiptool.update', $internship->id], 'method' => 'put', 'class'=>'delete inline']) !!}
                            <div class="form-group">
                                {!! Form::label('Tools', 'Tools:') !!}
                                {!! Form::select('tool', $toolsArray, NULL, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-12">
                                {!! Form::submit('add tool', ['class' => 'btn btn-primary form-control ']) !!}
                            </div>
                            {!! Form::close() !!}

                            <p>If a tool isn't in the list : <a href="{{ Route('tool.create') }}">Click here</a></p>
                            <p>
                                <a href="{{ route('internship.edit', $internship->id) }}" class="btn btn-info">Edit</a>
                            </p>
                        </div>
                    @endif
                    <div class="well">

                        <?php
                        $tools = DB::table('internshiptools')->where('company_id', $internship->contact->company_id)->get();
                        ?>

                        <p>Title:
                            {{ $internship->name }}
                        </p>
                        <p>Dates :
                            from {{ $internship->begin }} till {{ $internship->end }}
                        </p>
                        <p>contact:
                            {{ $internship->contact->firstname }} {{ $internship->contact->surename }}
                            {{ $internship->contact->email }}
                        </p>
                        <p>Status:
                            {{ $internship->status->name }}
                        </p>

                        <h3>Tools</h3>
                        <blockquote>
                            @if($tools != NULL)
                                @foreach($tools as $tool)
                                    <?php $tool = \App\Tool::findorfail($tool->tool_id) ?>
                                    @if($tool->status_id == 4)
                                        <a href="{{ Route('tool.show', $tool->id)  }}">
                                            <p>{{$tool->name}}</p>
                                        </a>

                                        @if(Auth::check())
                                            @if(Auth::user()->getRole() == 'practical trainer' OR Auth::user()->getRole() == 'admin')
                                                @if(Auth::user()->contact_id == $internship->contact->id OR Auth::user()->getRole() == 'admin')
                                                    {!! Form::open(['route' => ['internshiptool.destroy', $internship->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                                    {!! Form::hidden('tool_id',$tool->id, NULL, ['class' => 'form-control', 'required']) !!}
                                                    {!! Form::submit("trash", ['class' => 'btn btn-danger delete']) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                No tools needed
                            @endif
                        </blockquote>

                        <h3>Students</h3>
                        <blockquote>
                            @if($internshipcontacts != NULL)
                                @foreach($internshipcontacts as $internshipcontact)
                                    <?php $user = \App\User::where('contact_id', $internshipcontact->id)->first(); ?>
                                    @if ($user->role_id != 1)
                                        {{--<a href="{{ Route('contact.show', $internshipcontact->id) }}">--}}
                                        <p>{{$internshipcontact->firstname}} {{$internshipcontact->firstname}}</p>
                                        {{--</a>--}}
                                    @endif
                                @endforeach
                            @else
                                No students
                            @endif
                        </blockquote>
                        @if(Auth::check())
                            @if(Auth::user()->getRole() == 'student')

                                @if($internshipcontacts != NULL)
                                    @foreach($internshipcontacts as $internshipcontact)
                                        @if(Auth::user()->contact_id == $internshipcontact->id OR Auth::user()->getRole() == 'admin')

                                            @if($internship->status->name == 'in progress')
                                                {!! Form::open(['route' => ['student.update', $internship->id], 'method' => 'put']) !!}
                                                {!! Form::submit('End internship', ['class' => 'btn btn-danger form-control ']) !!}
                                                {!! Form::close() !!}
                                            @elseif($internship->status->name == 'done')
                                                You have finished your internship
                                            @else
                                                {!! Form::open(['route' => 'student.store']) !!}
                                                {!! Form::hidden('internship_id',$internship->id, NULL, ['class' => 'form-control', 'required']) !!}
                                                {!! Form::submit('Apply', ['class' => 'btn btn-primary form-control ']) !!}
                                                {!! Form::close() !!}

                                            @endif
                                        @endif
                                    @endforeach
                                @else
                                    {!! Form::open(['route' => 'student.store']) !!}
                                    {!! Form::hidden('internship_id',$internship->id, NULL, ['class' => 'form-control', 'required']) !!}
                                    {!! Form::submit('Apply', ['class' => 'btn btn-primary form-control ']) !!}
                                    {!! Form::close() !!}
                                @endif
                            @endif
                        @endif
                    </div>

                    @if(Auth::check())
                        @if(Auth::user()->getRole() == 'student' OR Auth::user()->getRole() == 'admin' OR Auth::user()->getRole() == 'teacher')
                            <div class="panel-body">
                                {!! Form::open(['url' => ['review'], 'method' => 'POST']) !!}

                                <fieldset class="col-md-8">
                                    <legend>New review</legend>
                                    <div class="form-group ">
                                        {!! Form::label('mark', 'Cijfer:*') !!}
                                        {!! Form::text('mark', NULL, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                    <div class="form-group ">
                                        {!! Form::label('review', 'review:*') !!}
                                        {!! Form::textarea('review', NULL, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                    <div class="form-group ">
                                        {!! Form::label('status', 'private:') !!}
                                        {!! Form::checkbox('status', NULL, ['class' => 'form-control']) !!}
                                    </div>

                                    {!! Form::hidden('internship_id',$internship->id, NULL, ['class' => 'form-control', 'required']) !!}

                                </fieldset>

                                <div class="form-group col-md-8">
                                    {!! Form::submit('Add review', ['class' => 'btn btn-primary form-control ']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        @endif
                    @endif

                    @if(!empty($reviews))
                        <h3>Reviews</h3>
                        @foreach ($reviews as $array)
                            @foreach ($array as $review)

                                <?php
                                $user = \App\User::findorfail($review->internship_user_id);
                                $contact = \App\Contact::findorfail($user->contact_id);
                                ?>

                                @if($review->status_id == 1)
                                    <div class="well">
                                        {{ $contact->firstname }} {{ $contact->insertion }} {{ $contact->surename }}
                                        <br>
                                        Mark: {{ $review->mark }}<br>
                                        {{ $review->review }}<br>
                                        @if(Auth::check())
                                            @if(Auth::user()->getRole() == 'student' OR Auth::user()->getRole() == 'admin' OR Auth::user()->getRole() == 'teacher')
                                                <a href="{{ route('review.edit', $review->id) }}"
                                                   class="btn btn-info">Edit</a>
                                                {!! Form::open(['route' => ['review.destroy', $review->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                                {!! Form::submit("trash", ['class' => 'btn btn-danger delete']) !!}
                                                {!! Form::close() !!}
                                            @endif
                                        @endif
                                    </div>
                                @else
                                    @if(Auth::check())
                                        @if(Auth::user()->getRole() == 'student' OR Auth::user()->getRole() == 'admin' OR Auth::user()->getRole() == 'teacher')
                                            <div class="well">
                                                {{ $contact->firstname }} {{ $contact->insertion }} {{ $contact->surename }}
                                                <br>
                                                Mark: {{ $review->mark }}<br>
                                                {{ $review->review }}<br>
                                                <a href="{{ route('review.edit', $review->id) }}" class="btn btn-info">Edit</a>
                                                {!! Form::open(['route' => ['review.destroy', $review->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                                {!! Form::submit("trash", ['class' => 'btn btn-danger delete']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        @endif
                                    @endif
                                @endif

                            @endforeach
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
