<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index($slug = null)
    {
        $page_title = 'التقارير والدراسات';
        if ($slug == null) {
            $category = null;
            $sources = Report::select('source')->where('report_type', 'report')->groupBy('source')->get();
        } else {
            $category = Category::where('slug', $slug)->firstOrFail();
            $sources = Report::select('source')->where('report_type', 'report')->where('category_id', $category->id)->groupBy('source')->get();
        }

        $reports = Report::query();
        $reports = Report::where('report_type', 'report');

        if (request('source')) {
            $currentSource = request('source');
            $reports->where('source', request('source'));
        } else {
            $currentSource = null;
        }

        if (request('search')) {
            $search = request('search');
            $reports->where(function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('source', 'like', '%' . request('search') . '%');
            });
        } else {
            $search = null;
        }

        if (request('published_at')) {
            $published_at = request('published_at');
            $reports->whereYear('published_at', request('published_at'));
        } else {
            $published_at = null;
        }

        if ($category) {
            $reports = $reports->where('category_id', $category->id);
        }

        $reports = $reports->orderBy('published_at', 'desc')->paginate(10)->withQueryString();

        return view('public.reports', compact('category', 'sources', 'reports', 'currentSource', 'search', 'published_at', 'page_title'));
    }

    public function proofs($slug = null)
    {
        $page_title = 'الأدلة المعرفية';


        if ($slug == null) {
            $category = null;
            $sources = Report::select('source')->where('report_type', 'proof')->groupBy('source')->get();
        } else {
            $category = Category::where('slug', $slug)->firstOrFail();
            $sources = Report::select('source')->where('report_type', 'proof')->where('category_id', $category->id)->groupBy('source')->get();
        }

        $reports = Report::query();
        $reports = Report::where('report_type', 'proof');

        if (request('source')) {
            $currentSource = request('source');
            $reports->where('source', request('source'));
        } else {
            $currentSource = null;
        }

        if (request('search')) {
            $search = request('search');
            $reports->where(function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('source', 'like', '%' . request('search') . '%');
            });
        } else {
            $search = null;
        }

        if (request('published_at')) {
            $published_at = request('published_at');
            $reports->whereYear('published_at', request('published_at'));
        } else {
            $published_at = null;
        }

        if ($category) {
            $reports = $reports->where('category_id', $category->id);
        }

        $reports = $reports->orderBy('published_at', 'desc')->paginate(10)->withQueryString();

        return view('public.reports', compact('category', 'sources', 'reports', 'currentSource', 'search', 'published_at', 'page_title'));
    }

    public function search()
    {
        $page_title = 'نتائج البحث عن: ' . request('search');
        $search = request('search');

        $reportsCount = Report::where('name', 'like', '%' . request('search') . '%')->where('report_type', 'report')->count();
        $proofsCount = Report::where('name', 'like', '%' . request('search') . '%')->where('report_type', 'proof')->count();

        return view('public.search', compact('page_title', 'search', 'reportsCount', 'proofsCount'));
    }

    public function viewReport(Report $report)
    {
        return view('public.view-report', compact('report'));
    }

    public function downloadReport(Report $report)
    {
        return response()->download(public_path('uploads/' . $report->file_path));
    }
}
