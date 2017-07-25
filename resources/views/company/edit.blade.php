@extends('master')

@section('title', 'Edit company')

@section('content')
    <h1>Edit company</h1>
    {!! Form::model($company, ['route' => ['company.update', $company->id], 'method' => 'put']) !!}
    @include('company.forms.company')
    {!! Form::close() !!}
@stop