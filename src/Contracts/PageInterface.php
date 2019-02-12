<?php

namespace Oxygencms\Pages\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface PageInterface
{
    /**
     * Query the Slug json column of the model to get a page.
     *
     * @param string $locale
     * @param Builder $query
     * @param string $slug
     *
     * @return Builder
     */
    public function scopeBySlug(Builder $query, string $slug, string $locale = null): Builder;

    /**
     * Get a list of all layouts and their root.
     *
     * @return array
     */
    public static function getLayouts(): array;

    /**
     * Get a list of all page templates and their root.
     *
     * @return array
     */
    public static function getTemplates(): array;

    /**
     * @param $string
     * @return array
     */
    public static function getViewsList($string): array;

    /**
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete();
}