<?php

use Illuminate\Database\Seeder;
use Oxygencms\Pages\Models\Page;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'name' => 'home',
                'template' => 'home',
                'slug' => [
                    'en' => '/',
                    'nl' => '/',
                ],
                'title' => [
                    'en' => 'Home',
                    'nl' => 'Home',
                ],
            ],

            [
                'name' => 'terms_and_conditions',
                'template' => 'terms_and_conditions',
                'slug' => [
                    'en' => 'terms-and-conditions',
                    'nl' => 'terms-and-conditions',
                ],
                'title' => [
                    'en' => 'Terms and Conditions',
                    'nl' => 'Terms and Conditions',
                ],
            ],

            [
                'name' => 'about_us',
                'template' => 'about_us',
                'slug' => [
                    'en' => 'about-us',
                    'nl' => 'about-us',
                ],
                'title' => [
                    'en' => 'About Us',
                    'nl' => 'About Us',
                ],
            ],

            [
                'name' => 'contact_us',
                'template' => 'contact_us',
                'slug' => [
                    'en' => 'contact-us',
                    'nl' => 'contact-us',
                ],
                'title' => [
                    'en' => 'Contact Us',
                    'nl' => 'Contact Us',
                ],
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
