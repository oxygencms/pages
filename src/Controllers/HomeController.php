<?php

namespace Oxygencms\Pages\Controllers;

use Oxygencms\Pages\Models\Page;
use Oxygencms\Core\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $page = Page::bySlug('/')->first();

        return view("oxygencms::pages.$page->template", compact('page'));
    }
}
