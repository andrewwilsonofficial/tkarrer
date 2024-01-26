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
                </div>
                <div class="col-md-6 mt-5">
                    <a href="{{ route('reports') }}?search={{ $search }}">
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h4>
                                            عرض التقارير والدراسات
                                        </h4>
                                        <p>
                                            {{ $reportsCount }} تقرير
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mt-5">
                    <a href="{{ route('proofs') }}?search={{ $search }}">
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h4>
                                            عرض الادلة المعرفية
                                        </h4>
                                        <p>
                                            {{ $proofsCount }} ادلة
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
