@extends('layouts.master')
@section('title', $report->name)

@section('content')
    <section id="iframe-section">
        <div class="container pt-4">
            <iframe src="https://docs.google.com/gview?url={{ asset('uploads/' . $report->file_path) }}&embedded=true"
                style="width:100%; height:80vh;" frameborder="0"></iframe>
        </div>
    </section>
@endsection
