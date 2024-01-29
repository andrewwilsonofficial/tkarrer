@extends('layouts.dashboard-master')
@section('title', 'إضافة فئة جديدة')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            إضافة فئة جديدة
        </h4>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('store-category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            إسم الفئة
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">
                            معرف الرابط
                        </label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                            value="{{ old('slug') }}" required>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">
                            الأيقونة
                        </label>
                        <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon"
                            accept="image/*" required>
                        @error('icon')
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
