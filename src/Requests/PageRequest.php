<?php

namespace Oxygencms\Pages\Requests;

use Oxygencms\Pages\Models\Page;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $key = $this->isMethod('POST') ? '' : $this->page->id;

        $slug_format = '/^[а-я0-9a-z-\/]+$/u';

        $layouts = implode(',', Page::getLayouts()['list']);

        $templates = implode(',', Page::getTemplates()['list']);

        $rules = [
            'active' => 'boolean',

            'name' => "required|alpha_dash|unique:pages,name,$key",

            'layout'  => "required|string|in:$layouts",
            'template' => "required|string|in:$templates",

            'slug' => 'required|array|distinct',
            'slug.*' => "required|string|max:140|regex:$slug_format|unique_translation:pages,slug,$key",

            'title' => 'required|array|distinct',
            'title.*' => 'required|string|max:250',

            'summary' => 'nullable|array|distinct',
            'summary.*' => 'nullable|string',

            'body' => 'nullable|array|distinct',
            'body.*' => 'nullable|string',

            'meta_keywords' => 'nullable|array|distinct',
            'meta_keywords.*' => 'nullable|string',

            'meta_description' => 'nullable|array|distinct',
            'meta_description.*' => 'nullable|string',

            'meta_tags' => 'nullable|array|distinct',
            'meta_tags.*' => 'nullable|string',
        ];

        return $rules;
    }
}
