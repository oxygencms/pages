<?php

namespace Oxygencms\Pages\Controllers\Admin;

use JavaScript;
use Oxygencms\Pages\Models\Page;
use Oxygencms\Pages\Requests\PageRequest;
use Oxygencms\Core\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('index', Page::class);

        JavaScript::put(['models' => Page::allWithAccessors(['edit_url', 'show_url'])]);

        return view('oxygencms::admin.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Page::class);

        $layouts = Page::getLayouts();

        $templates = Page::getTemplates();

        $page = null;

        return view('oxygencms::admin.pages.create', compact('layouts', 'templates', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(PageRequest $request)
    {
        $this->authorize('create', Page::class);

        $page = Page::create($request->validated());

        notification("$page->model_name successfully created.");

        return redirect()->route('admin.page.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Page $page)
    {
        $this->authorize('update', Page::class);

        $layouts = Page::getLayouts();

        $templates = Page::getTemplates();

        $page->mapMediaUrls();

        return view('oxygencms::admin.pages.edit', compact('page', 'layouts', 'templates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageRequest $request
     * @param Page        $page
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(PageRequest $request, Page $page)
    {
        $this->authorize('update', Page::class);

        $page->update($request->validated());

        $message = "$page->model_name successfully updated.";

        if ($request->ajax()) {
            return response()->json([
                'model' => $page,
                'notification' => [
                    'type' => 'success',
                    'text' => $message,
                ],
            ]);
        }

        notification($message);

        return redirect()->back();
    }
}
