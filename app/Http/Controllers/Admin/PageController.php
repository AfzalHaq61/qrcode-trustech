<?php

namespace App\Http\Controllers\Admin;

use Purifier;
use App\Models\Page;
use App\Models\Config;
use App\Models\Setting;
use Illuminate\Http\Request;
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
    public function index()
    {
        // Static pages
        $pages = Page::where('slug', 'home')->orWhere('slug', 'about')->orWhere('slug', 'contact')
        ->orWhere('slug', 'faq')->orWhere('slug', 'pricing')->orWhere('slug', 'privacy-policy')
        ->orWhere('slug', 'refund-policy')->orWhere('slug', 'cookies-and-gdpr')->orWhere('slug', 'terms-and-conditions')->groupBy('slug')->get(DB::raw('count(*) as total, pages.*'));
        // Custom pages
        $custom_pages = Page::groupBy('slug')->where('slug', '!=', 'home')->where('slug', '!=', 'about')->where('slug', '!=', 'contact')
        ->where('slug', '!=', 'faq')->where('slug', '!=', 'pricing')->where('slug', '!=', 'privacy-policy')
        ->where('slug', '!=', 'refund-policy')->where('slug', '!=', 'terms-and-conditions')->get(DB::raw('count(*) as total, pages.*'));

        $settings = Setting::first();
        $config = Config::get();

        // View
        return view('admin.pages.pages.index', compact('pages', 'custom_pages', 'settings', 'config'));
    }

    // Add page
    public function addPage()
    {
        // View
        return view('admin.pages.pages.add');
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
        $page->body = Purifier::clean($request->body);
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
        return view('admin.pages.pages.custom-edit', compact('page', 'settings', 'config'));
    }

    // Edit page
    public function editPage($id)
    {
        // Get page details
        $sections = Page::where('slug', $id)->get();
        $settings = Setting::first();
        $config = Config::get();

        // View
        return view('admin.pages.pages.edit', compact('sections', 'settings', 'config'));
    }

    // Update page
    public function updatePage(Request $request, $id)
    {
        // Update page
        $sections = Page::where('slug', $id)->get();
        for ($i = 0; $i < count($sections); $i++) {
            $safe_section_content = $request->input('section' . $i);
            Page::where('slug', $id)->where('id', $sections[$i]->id)->update(['body' => $safe_section_content]);
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
        $page->body = Purifier::clean($request->body);
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
