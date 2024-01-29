@extends('layouts.dashboard-master')
@section('title', 'الفئات')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            الفئات
        </h4>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('create-category') }}" class="btn btn-success mb-3">
                    إضافة فئة
                    <i class="bx bx-plus"></i>
                </a>
            </div>
        </div>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-3 col-6 text-center mb-3">
                    <div class="card border-0">
                        <div class="card-body category-card">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('assets/images/category/' . $category->icon) }}"
                                        alt="{{ $category->name }}">
                                </div>
                                <div class="col-12 text-center mt-2">
                                    <h5>
                                        {{ $category->name }}
                                    </h5>
                                </div>
                                <div class="col-12 mt-2 text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('delete-category', $category->id) }}" method="GET"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group options-buttons">
                                                <a href="{{ route('edit-category', ['category' => $category->id]) }}"
                                                    class="btn btn-primary btn-sm">
                                                    تعديل
                                                    <i class="menu-icon tf-icons bx bx-edit"></i>
                                                </a>

                                                <button type="button" class="btn btn-danger btn-sm remove-btn delete-report"
                                                    data-name="{{ $category->name }}" data-id="{{ $category->id }}">
                                                    حذف
                                                    <i class="menu-icon tf-icons bx bx-trash"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
