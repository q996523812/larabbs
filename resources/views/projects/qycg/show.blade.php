@extends('layouts.app')

@section('title', isset($category) ? $category->name : '项目列表')
@section('content')

@include('projects._head', ['project' => $project])

@endsection