@extends('layouts.master')
@section('title', 'الرئيسية')

@section('content')
    <section id="top-section">
        <div id="search-container">
            <h1 class="main-title">
                بوابة التقارير
            </h1>
            <p class="sub-title">
                اكتشف ثروة من المراجع والتقارير والادلة بسهولة
            </p>
            <form action="{{ route('search') }}" method="get">
                <div class="searchbox-wrap">
                    <input type="text" name="search" placeholder="ابحث عن ادلة او تقارير" required>
                    <button>
                        <span>
                            <img src="{{ asset('assets/images/search-icon.svg') }}" alt="بحث" width="20">
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <section id="reports-section" class="mb-5">
        <div class="container mt-5 text-center">
            <div class="row">
                <div class="col-12 mb-5">
                    <h2>
                        التقارير والدراسات
                    </h2>
                </div>
                @foreach ($categories as $category)
                    <div class="col category mt-3">
                        <a href="{{ route('reports', ['slug' => $category->slug]) }}">
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
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @if ($loop->iteration % 5 == 0)
                        <div class="col-12 mt-3"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section id="proff-section" class="pt-5">
        <div class="container mt-5 text-center">
            <div class="row">
                <div class="col-12 mb-5">
                    <h2>
                        الادلة المعرفية
                    </h2>
                </div>
                @foreach ($categories as $category)
                    <div class="col category mt-3">
                        <a href="{{ route('proofs', ['slug' => $category->slug]) }}">
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
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @if ($loop->iteration % 5 == 0)
                        <div class="col-12 mt-3"></div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
