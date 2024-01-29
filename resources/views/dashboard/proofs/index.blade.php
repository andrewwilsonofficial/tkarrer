@extends('layouts.dashboard-master')
@section('title', 'الادلة')
@section('head')
    @parent
    {{-- <link href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">

    <style>
        .sorting_disabled::before,
        .sorting_disabled::after {
            display: none !important;
        }

        .form-check-input {
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            الادلة
        </h4>
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('create-proof') }}" class="btn btn-success mb-3">
                    إضافة دليل
                    <i class="bx bx-plus"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            الإسم
                                        </th>
                                        <th>
                                            المصدر
                                        </th>
                                        <th>
                                            التاريخ
                                        </th>
                                        <th>
                                            الفئة
                                        </th>
                                        <th class="text-center no-export">
                                            خيارات
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proofs as $proof)
                                        <tr>
                                            <td>
                                                {{ $proof->id }}
                                            </td>
                                            <td>
                                                {{ $proof->name }}
                                            </td>
                                            <td>
                                                {{ $proof->source }}
                                            </td>
                                            <td>
                                                {{ $proof->published_at }}
                                            </td>
                                            <td>
                                                {{ $proof->category->name }}
                                            </td>
                                            <td class="text-center no-export">
                                                <div class="btn-group">
                                                    <form action="{{ route('delete-proof', $proof->id) }}"
                                                        method="GET" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="btn-group options-buttons">
                                                            <a href="{{ route('edit-proof', ['proof' => $proof->id]) }}"
                                                                class="btn btn-primary btn-sm">
                                                                تعديل
                                                                <i class="menu-icon tf-icons bx bx-edit"></i>
                                                            </a>

                                                            <button type="button"
                                                                class="btn btn-danger btn-sm remove-btn delete-proof"
                                                                data-name="{{ $proof->name }}"
                                                                data-id="{{ $proof->id }}">
                                                                حذف
                                                                <i class="menu-icon tf-icons bx bx-trash"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                {{ $proofs->links('pagination.admin') }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('dashboard-assets/js/vendor/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('dashboard-assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
@endsection
