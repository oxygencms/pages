<?php

namespace Oxygencms\Pages\Controllers;

use Oxygencms\Pages\Interfaces\PageModel;
use Oxygencms\Core\Controllers\Controller;

class PageController extends Controller
{
    /**
     * @param PageModel $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(PageModel $page)
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
