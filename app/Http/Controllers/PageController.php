<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Enums\PagesEnum;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Http\Requests\GetPageRequest;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::get();
        $pagesEnum = PagesEnum::cases();
        return view('Web.Pages.index', compact('pagesEnum','pages'));
    }
    public function navbar()
    {

        $pagesEnum = PagesEnum::cases();
        return view('Web.Sections.navbar', compact('pagesEnum'));
    }
    public function pages(GetPageRequest $request)
    {
        $pages = Page::whereType($request->type)->get();
        return view('Web.Pages.dynamic-page', compact('pages'));
    }
}
