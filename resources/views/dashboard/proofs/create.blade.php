@extends('layouts.dashboard-master')
@section('title', 'إضافة دليل جديد')
@section('head')
    @parent
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}">
@endsection
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            إضافة دليل جديد
        </h4>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('store-proof') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            إسم الدليل
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="source" class="form-label">
                            المصدر
                        </label>
                        <input type="text" class="form-control @error('source') is-invalid @enderror" id="source"
                            name="source" value="{{ old('source') }}" required>
                        @error('source')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="published_at" class="form-label">
                            العام
                        </label>
                        <input type="text" class="form-control published_at @error('published_at') is-invalid @enderror" id="published_at"
                            name="published_at" value="{{ old('published_at') }}" required>
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">
                            اضافة رابط الدراسة
                        </label>
                        <input type="url" class="form-control @error('url') is-invalid @enderror" id="url"
                            name="url" value="{{ old('url') }}" required>
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">
                            الفئة
                        </label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="" selected disabled>إختر الفئة</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">
                            الملف
                        </label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                            name="file" accept="application/pdf" required>
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">
                            الوصف
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                            name="description" rows="3" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">
                            إضافة
                            <i class="menu-icon tf-icons bx bx-save"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}?123"></script>
    <script>
        $('.published_at').datepicker({
            format: 'yyyy',
            viewMode: 'years',
            minViewMode: 'years',
            autoclose: true,
            clearBtn: true,
            todayHighlight: false,
            endDate: new Date(),
            language: 'ar',
        });
    </script>
@endsection
