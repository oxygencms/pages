<?php

namespace Oxygencms\Pages\Controllers;

use Oxygencms\Pages\Models\Page;
use Oxygencms\Core\Controllers\Controller;

class PageController extends Controller
{
    /**
     * @param Page $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Page $page)
    {
        $data = compact('page');

//        switch ($page->template) {
//            case 'venues':
//                $data['venues'] = Venue::all();
//                break;
//        }

        return view("oxygencms::pages.$page->template", $data);
    }
}
