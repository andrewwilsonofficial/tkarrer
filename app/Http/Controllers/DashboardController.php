<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $reports = Report::where('report_type', 'report')->get();
        $proofs = Report::where('report_type', 'proof')->get();

        return view('dashboard.home', compact('categories', 'reports', 'proofs'));
    }

    public function categories()
    {
        $categories = Category::all();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('dashboard.categories.create');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;

        $imageName = time() . '.' . $request->icon->extension();
        $request->icon->move(public_path('assets/images/category'), $imageName);

        $category->icon = $imageName;
        $category->save();

        return redirect()->route('categories')->with('success', 'تم إضافة الفئة بنجاح');
    }

    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;

        if ($request->hasFile('icon')) {
            $imageName = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('assets/images/category'), $imageName);

            $category->icon = $imageName;
        }

        $category->save();

        return redirect()->route('categories')->with('success', 'تم تعديل الفئة بنجاح');
    }

    public function editCategory(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        return redirect()->route('categories')->with('success', 'تم حذف الفئة بنجاح');
    }

    public function reports()
    {
        $reports = Report::where('report_type', 'report')->orderBy('id', 'desc');

        $all_categories = Category::all();
        $all_sources = $reports->pluck('source')->unique();
        $all_years = $reports->pluck('published_at')->unique();

        if (request()->has('category_id') && request()->category_id != '') {
            $reports = $reports->where('category_id', request()->category_id);
        }

        if (request()->has('source') && request()->source != '') {
            $reports = $reports->where('source', request()->source);
        }

        if (request()->has('year') && request()->year != '') {
            $reports = $reports->where('published_at', request()->year);
        }

        if (request()->has('search') && request()->search != '') {
            $reports = $reports->where('name', 'like', '%' . request()->search . '%');
        }

        $all_years = $all_years->unique();

        $all_years = $all_years->sortByDesc(function ($item) {
            return $item;
        });

        $all_sources = $all_sources->sortByDesc(function ($item) {
            return $item;
        });

        $reports = $reports->paginate(20);

        return view('dashboard.reports.index', compact('reports', 'all_categories', 'all_sources', 'all_years'));
    }

    public function createReport()
    {
        $categories = Category::all();

        return view('dashboard.reports.create', compact('categories'));
    }

    public function storeReport(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'published_at' => 'required|digits:4|integer|min:1000|max:' . (date('Y') + 1),
            'file' => 'required|file|mimes:pdf',
            'description' => 'required|string',
        ]);

        $report = new Report();
        $report->category_id = $request->category_id;
        $report->name = $request->name;
        $report->source = $request->source;
        $report->url = $request->url;
        $report->published_at = $request->published_at;

        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);

        $report->file_path = $fileName;
        $report->description = $request->description;
        $report->report_type = 'report';
        $report->save();

        return redirect()->route('admin-reports')->with('success', 'تم إضافة التقرير بنجاح');
    }

    public function editReport(Report $report)
    {
        $categories = Category::all();

        return view('dashboard.reports.edit', compact('report', 'categories'));
    }

    public function updateReport(Request $request, Report $report)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'published_at' => 'required|digits:4|integer|min:1000|max:' . (date('Y') + 1),
            'file' => 'nullable|file|mimes:pdf',
            'description' => 'required|string',
        ]);

        $report->category_id = $request->category_id;
        $report->name = $request->name;
        $report->source = $request->source;
        $report->url = $request->url;
        $report->published_at = $request->published_at;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);

            $report->file_path = $fileName;
        }

        $report->description = $request->description;
        $report->save();

        return redirect()->route('admin-reports')->with('success', 'تم تعديل التقرير بنجاح');
    }

    public function deleteReport(Report $report)
    {
        $report->delete();

        return redirect()->route('admin-reports')->with('success', 'تم حذف التقرير بنجاح');
    }

    public function proofs()
    {
        $proofs = Report::where('report_type', 'proof')->orderBy('id', 'desc');

        $all_categories = Category::all();
        $all_sources = $proofs->pluck('source')->unique();
        $all_years = $proofs->pluck('published_at')->unique();

        if (request()->has('category_id') && request()->category_id != '') {
            $proofs = $proofs->where('category_id', request()->category_id);
        }

        if (request()->has('source') && request()->source != '') {
            $proofs = $proofs->where('source', request()->source);
        }

        if (request()->has('year') && request()->year != '') {
            $proofs = $proofs->where('published_at', request()->year);
        }

        if (request()->has('search') && request()->search != '') {
            $proofs = $proofs->where('name', 'like', '%' . request()->search . '%');
        }

        $all_years = $all_years->unique();

        $all_years = $all_years->sortByDesc(function ($item) {
            return $item;
        });

        $all_sources = $all_sources->sortByDesc(function ($item) {
            return $item;
        });

        $proofs = $proofs->paginate(20);

        return view('dashboard.proofs.index', compact('proofs', 'all_categories', 'all_sources', 'all_years'));
    }

    public function createProof()
    {
        $categories = Category::all();

        return view('dashboard.proofs.create', compact('categories'));
    }

    function storeProof(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'published_at' => 'required|digits:4|integer|min:1000|max:' . (date('Y') + 1),
            'file' => 'required|file|mimes:pdf',
            'description' => 'required|string',
        ]);

        $report = new Report();
        $report->category_id = $request->category_id;
        $report->name = $request->name;
        $report->source = $request->source;
        $report->url = $request->url;
        $report->published_at = $request->published_at;

        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);

        $report->file_path = $fileName;
        $report->description = $request->description;
        $report->report_type = 'proof';
        $report->save();

        return redirect()->route('admin-proofs')->with('success', 'تم إضافة الدليل بنجاح');
    }

    public function editProof(Report $proof)
    {
        $categories = Category::all();

        return view('dashboard.proofs.edit', compact('proof', 'categories'));
    }

    public function updateProof(Request $request, Report $proof)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'published_at' => 'required|digits:4|integer|min:1000|max:' . (date('Y') + 1),
            'file' => 'nullable|file|mimes:pdf',
            'description' => 'required|string',
        ]);

        $proof->category_id = $request->category_id;
        $proof->name = $request->name;
        $proof->source = $request->source;
        $proof->url = $request->url;
        $proof->published_at = $request->published_at;

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);

            $proof->file_path = $fileName;
        }

        $proof->description = $request->description;
        $proof->save();

        return redirect()->route('admin-proofs')->with('success', 'تم تعديل الدليل بنجاح');
    }

    public function deleteProof(Report $proof)
    {
        $proof->delete();

        return redirect()->route('admin-proofs')->with('success', 'تم حذف الدليل بنجاح');
    }
}
