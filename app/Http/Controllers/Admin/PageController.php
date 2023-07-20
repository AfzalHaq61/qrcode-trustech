<?php

namespace App\Http\Controllers\Admin;

use Purifier;
use App\Models\Page;
use Inertia\Inertia;
use App\Models\Config;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Services\BreadcrumbService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PageController extends Controller
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

    //  Pages
    public function index(BreadcrumbService $breadcrumbService)
    {
        // Static pages

        $pages = Page::whereIn('slug', ['home', 'about', 'contact', 'faq', 'pricing', 'privacy-policy', 'refund-policy', 'cookies-and-gdpr', 'terms-and-conditions'])
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('pages')
                    ->whereIn('slug', ['home', 'about', 'contact', 'faq', 'pricing', 'privacy-policy', 'refund-policy', 'cookies-and-gdpr', 'terms-and-conditions'])
                    ->groupBy('slug');
            })
            ->paginate(10);

        // Custom pages

        $custom_pages = Page::whereNotIn('slug', ['home', 'about', 'contact', 'faq', 'pricing', 'privacy-policy', 'refund-policy', 'cookies-and-gdpr', 'terms-and-conditions'])
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('pages')
                    ->whereNotIn('slug', ['home', 'about', 'contact', 'faq', 'pricing', 'privacy-policy', 'refund-policy', 'cookies-and-gdpr', 'terms-and-conditions'])
                    ->groupBy('slug');
            })
            ->paginate(10);

        $settings = Setting::first();
        $config = Config::get();
        $breadcrumbs = $breadcrumbService->generate();

        // View
        return Inertia::render('Admin/Pages/Index', [
            'pages' => $pages,
            'custom_pages' => $custom_pages,
            'settings' => $settings,
            'config' => $config,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    // Add page
    public function addPage()
    {
        // View
        return Inertia::render('Admin/Pages/Add');
    }

    // Save page
    public function savePage(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required'
        ]);

        // Update page
        $page = new Page();
        $page->name = $request->name;
        $page->title = $request->title;
        $page->slug = $request->slug;
        // $page->body = Purifier::clean($request->body);
        $page->body = $request->body;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;
        $page->save();

        return redirect()->back()->with('success', trans('Page Saved Successfully!'));
    }

    // Edit custom page
    public function editCustomPage($id)
    {
        // Get page details
        $page = Page::where('id', $id)->first();
        $settings = Setting::first();
        $config = Config::get();

        // View
        return Inertia::render('Admin/Pages/CustomEdit', [
            'page' => $page,
            'settings' => $settings,
            'config' => $config
        ]);
    }

    // Edit page
    public function editPage($slug)
    {
        // Get page details
        $sections = Page::where('slug', $slug)->get();
        $settings = Setting::first();
        $config = Config::get();

        // View
        return Inertia::render('Admin/Pages/Edit', [
            'slug' => $slug,
            'sections' => $sections,
            'settings' => $settings,
            'config' => $config
        ]);
    }

    // Update page
    public function updatePage(Request $request, $slug)
    {
        // Update page
        $sections = Page::where('slug', $slug)->get();
        for ($i = 0; $i < count($sections); $i++) {
            $safe_section_content = $request->input('section' . $i);
            Page::where('slug', $slug)->where('id', $sections[$i]->id)->update(['body' => $safe_section_content]);
        }

        // Page redirect
        return redirect()->route('admin.pages')->with('success', trans('Website Content Updated Successfully!'));
    }

    // Update custom page
    public function updateCustomPage(Request $request)
    {
        // Validation
        $validator = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'body' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required'
        ]);

        // Update page
        $page = Page::findOrFail($request->page_id);
        $page->name = $request->name;
        $page->title = $request->title;
        $page->slug = $request->slug;
        // $page->body = Purifier::clean($request->body);
        $page->body = $request->body;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;
        $page->save();

        return redirect()->back()->with('success', trans('Page Updated Successfully!'));
    }

    // Status Page
    public function statusPage(Request $request)
    {
        // Get plan details
        $page_details = Page::where('id', $request->query('id'))->first();

        // Check status
        if ($page_details->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        // Update status
        Page::where('id', $request->query('id'))->update(['status' => $status]);
        return redirect()->back()->with('success', trans('Page Status Updated Successfully!'));
    }

    // Delete Page
    public function deletePage(Request $request)
    {
        // Update status
        Page::where('id', $request->query('id'))->delete();
        return redirect()->back()->with('success', trans('Page Deleted Successfully!'));
    }
}
