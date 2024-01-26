@extends('layouts.master')
@section('title', $page_title)

@section('content')
    <section id="reports-section">
        <div class="container-fluid mt-5 text-right">
            <div class="row">
                <div class="col-12">
                    <span>
                        الرئيسية
                    </span>
                    <span class="mx-2">
                        <svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0.808018V11.192L0.846001 6.00002L9 0.808018Z" fill="#303030" />
                        </svg>
                    </span>
                    <span>
                        {{ $page_title }}
                    </span>
                    <span class="mx-2">
                        <svg width="9" height="12" viewBox="0 0 9 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 0.808018V11.192L0.846001 6.00002L9 0.808018Z" fill="#303030" />
                        </svg>
                    </span>
                    <span>
                        {{ $category->name ?? 'جميع المصادر' }}
                    </span>
                </div>
                <div class="col-12 mt-3">
                    <h3>
                        {{ $category->name ?? 'جميع المصادر' }}
                    </h3>
                </div>
                <div class="col-md-5">
                    <form action="{{ url()->current() }}" method="get">
                        <div class="searchbox-wrap">
                            <input type="text" name="search" placeholder="ابحث عن اسم التقرير, المصدر"
                                value="{{ $search }}">
                            <input type="hidden" name="published_at" value="{{ $published_at }}">
                            <button>
                                <span>
                                    <img src="{{ asset('assets/images/search-icon.svg') }}" alt="بحث" width="20">
                                </span>
                            </button>
                            <button class="btn calender-button" type="button">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.666748 23.3333C0.666748 25.6 2.40008 27.3333 4.66675 27.3333H23.3334C25.6001 27.3333 27.3334 25.6 27.3334 23.3333V12.6667H0.666748V23.3333ZM23.3334 3.33334H20.6667V2.00001C20.6667 1.2 20.1334 0.666672 19.3334 0.666672C18.5334 0.666672 18.0001 1.2 18.0001 2.00001V3.33334H10.0001V2.00001C10.0001 1.2 9.46675 0.666672 8.66675 0.666672C7.86675 0.666672 7.33341 1.2 7.33341 2.00001V3.33334H4.66675C2.40008 3.33334 0.666748 5.06667 0.666748 7.33334V10H27.3334V7.33334C27.3334 5.06667 25.6001 3.33334 23.3334 3.33334Z"
                                        fill="#3B5998" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-12 mt-5">
                    <div class="scrollable-pills">
                        @foreach ($sources as $index => $source)
                            <a href="{{ url()->current() }}?source={{ $source->source }}">
                                <span class="source-badge {{ $currentSource == $source->source ? 'active' : '' }}">
                                    {{ $source->source }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 mt-5 px-5">
                    <div class="row">
                        <div class="col-5 titles text-right px-4">
                            اسم الدراسة
                        </div>
                        <div class="col-2 titles text-right px-1">
                            المصدر
                        </div>
                        <div class="col-2 titles text-right px-0">
                            العام
                        </div>
                        <div class="col-3 titles text-right px-0">
                            الاجرائات
                        </div>
                        <div class="col-12 mt-4">
                            <div class="accordion">
                                @foreach ($reports as $report)
                                    <div class="accordion-item mb-3">
                                        <input type="checkbox" id="report{{ $report->id }}">
                                        <label class="accordion-label" for="report{{ $report->id }}">
                                            <div class="row w-100">
                                                <div class="col-md-5 col-10 text-right d-flex align-items-center">
                                                    <span class="report-name">
                                                        {{ $report->name }}
                                                    </span>
                                                </div>
                                                <div class="col-md-2 source-column text-right d-flex align-items-center">
                                                    {{ $report->source }}
                                                </div>
                                                <div class="col-md-2 date-column text-right d-flex align-items-center">
                                                    {{ date('Y', strtotime($report->published_at)) }}
                                                </div>
                                                <div class="col-md-2 options-column text-right d-flex align-items-center">
                                                    <span class="view-button">
                                                        <a class="text-dark d-flex align-items-center"
                                                            href="{{ route('view-report', ['report' => $report->id]) }}"
                                                            target="_blank">
                                                            اطلاع
                                                            <img class="mr-2" src="{{ asset('assets/images/eye.svg') }}"
                                                                alt="اطلاع">
                                                        </a>
                                                    </span>
                                                    <span class="download-button mr-5">
                                                        <a class="text-dark d-flex align-items-center"
                                                            href="{{ route('download-report', ['report' => $report->id]) }}"
                                                            target="_blank">
                                                            تحميل
                                                            <img class="mr-2"
                                                                src="{{ asset('assets/images/download.svg') }}"
                                                                alt="اطلاع">
                                                        </a>
                                                    </span>
                                                </div>
                                                <div class="col-md-1 col-2 text-left d-flex align-items-center">
                                                    <img class="mr-auto" src="{{ asset('assets/images/arrow.svg') }}"
                                                        alt="اطلاع">
                                                </div>
                                            </div>
                                        </label>
                                        <div class="accordion-content">
                                            <div class="row p-3">
                                                <div class="col-12 only-mobile text-center">
                                                    <h6>
                                                        {{ $report->name }}
                                                    </h6>
                                                </div>
                                                <div class="col-6 only-mobile">
                                                    <a class="btn btn-primary text-center"
                                                        href="{{ route('view-report', ['report' => $report->id]) }}"
                                                        target="_blank">
                                                        اطلاع
                                                        <img class="mr-2" src="{{ asset('assets/images/eye.svg') }}"
                                                            alt="اطلاع">
                                                    </a>
                                                </div>
                                                <div class="col-6 only-mobile mb-3">
                                                    <a class="btn btn-primary text-center"
                                                        href="{{ route('download-report', ['report' => $report->id]) }}"
                                                        target="_blank">
                                                        تحميل
                                                        <img class="mr-2" src="{{ asset('assets/images/download.svg') }}"
                                                            alt="اطلاع">
                                                    </a>
                                                </div>
                                                <div class="col-12">
                                                    <h5>
                                                        نبذه مختصرة
                                                    </h5>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    {{ $report->description }}
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <a href="{{ $report->url }}" class="font-weight-bold"
                                                        target="_blank">
                                                        رابط التقرير الاساسي
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if (count($reports) == 0)
                            <div class="col-12 mt-4">
                                <div class="alert alert-danger text-center">
                                    لا يوجد تقارير
                                </div>
                            </div>
                        @endif
                        <div class="col-auto m-auto mt-4">
                            {{ $reports->links('pagination.default') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
