<?php

namespace Oxygencms\Pages\Models;

use Oxygencms\Uploads\Traits\HasUploads;
use Oxygencms\Core\Models\Model;
use Illuminate\Support\Facades\File;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;

class Page extends Model
{
    use HasUploads, HasTranslations;

    /**
     * @var array $guarded
     */
    public $guarded = [];

    /**
     * @var array $translatable
     */
    public $translatable = [
        'slug',
        'title',
        'summary',
        'body',
        'meta_keywords',
        'meta_description',
        'meta_tags',
    ];

    /**
     * @var array $appends
     */
    public $appends = ['model_name'];

    /**
     * Query the Slug json column of the model to get a page.
     *
     * @param string $locale
     * @param Builder $query
     * @param string $slug
     *
     * @return Builder
     */
    public function scopeBySlug(Builder $query, string $slug, string $locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $query->where("slug->$locale", $slug);
    }

    /**
     * Get a list of all layouts and their root.
     *
     * @return array
     */
    public static function getLayouts()
    {
        return self::getViewsList('layout');
    }

    /**
     * Get a list of all page templates and their root.
     *
     * @return array
     */
    public static function getTemplates()
    {
        return self::getViewsList('template');
    }

    /**
     * @param $string
     * @return array
     */
    public static function getViewsList($string)
    {
        $path = file_exists($dir = config('pages.'. $string .'s_path'))
            ? $dir
            : config('pages.'. $string .'s_package_path');

        $array = [
            'path' => $path,
            'list' => [],
        ];

        foreach (File::files($array['path']) as $view) {
            array_push($array['list'], substr($view->getFilename(), 0, -10));
        }

        return $array;
    }

    /**
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete()
    {
        if ($this->template == 'home' || $this->slug == '/') {
            throw new \Exception('Cannot delete the home page!');
        }

        parent::delete();
    }
}
