<?php

namespace Oxygencms\Pages\Controllers;

use Oxygencms\Pages\Models\Page;
use Oxygencms\Core\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $page = Page::bySlug('/')->first();

        return view("oxygencms::pages.$page->template", compact('page'));
    }
}
