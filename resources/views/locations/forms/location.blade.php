<div class="form-group">
    {!! Form::label('street', 'street:') !!}
    {!! Form::text('street', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('streetnumber', 'streetnumber:') !!}
    {!! Form::text('streetnumber', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('postcode', 'postcode:') !!}
    {!! Form::text('postcode', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('state', 'city:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<div style="visibility: hidden">
         <?php if (isset($school->id)) {
        ?>
        <input hidden name="school" value="{{$school->id}}">
        <?php
         }?>
</div>
<div class="form-group">
    {!! Form::submit('create', ['class' => 'btn btn-primary form-control']) !!}
</div>