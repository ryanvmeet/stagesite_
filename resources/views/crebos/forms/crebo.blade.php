<div class="form-group">
    {!! Form::label('name', 'name:') !!}
    {!! Form::text('name', NULL, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('number', 'number:') !!}
    {!! Form::text('number', NULL, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('startyear', 'startyear:') !!}
    <?php
    echo '<select name="startyear"';
    $starting_year = date ('Y', strtotime ('-10 year'));
    $ending_year = date ('Y', strtotime ('+10 year'));
    $current_year = date ('Y');
    for ($starting_year; $starting_year <= $ending_year; $starting_year++)
    {
        echo '<option value="'.$starting_year.'"';
        if ($starting_year == $current_year)
        {
            echo ' selected="selected"';
        }
        echo ' >'.$starting_year.'</option>';
    }
    echo '<select>';
    ?>
</div>

<div class="form-group">
    {!! Form::label('endyear', 'endyear:') !!}
    <?php
    echo '<select name="endyear"';
    $starting_year = date ('Y', strtotime ('-10 year'));
    $ending_year = date ('Y', strtotime ('+10 year'));
    $current_year = date ('Y');
    for ($starting_year; $starting_year <= $ending_year; $starting_year++)
    {
        echo '<option value="'.$starting_year.'"';
        if ($starting_year == $current_year)
        {
            echo ' selected="selected"';
        }
        echo ' >'.$starting_year.'</option>';
    }
    echo '<select>';
    ?>
</div>

<div class="form-group">

<div class="form-group">
    <select id="schools" class="form-control" name="school">
        @foreach($school_all_info as $array)
            <option id="School_id_{{$array['school']->id}}" value="{{$array['school']->name}}">{{$array['school']->name}}</option>
        @endforeach
    </select>
</div>

<select id="locations" class="form-control" name="location">
    @foreach($school_all_info as $array)
        @foreach($array['location'] as $location)
            @if(!empty($location))
                <option class="{{$array['school']->name}}" value="{{$location[0]->street}}">{{$array['school']->name}} - {{$location[0]->street}}</option>
            @endif
        @endforeach
    @endforeach
    </select>
</div>



<div class="form-group">
    {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
</div>