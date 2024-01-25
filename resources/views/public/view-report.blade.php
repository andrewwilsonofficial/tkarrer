@extends('layouts.master')
@section('title', $report->name)

@section('content')
    <iframe src="https://docs.google.com/gview?url={{ asset('uploads/' . $report->file_path) }}&embedded=true"
        style="width:100%; height:100vh;" frameborder="0"></iframe>
@endsection
