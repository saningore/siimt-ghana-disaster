<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicRoutesTest extends TestCase
{
    public function test_public_get_routes_return_ok(): void
    {
        $paths = [
            '/',
            '/weather',
            '/alerts',
            '/api/alerts',
            '/news',
            '/news/nadmo-flood-hotlines',
            '/roads',
            '/situation',
            '/missing',
            '/missing/report',
            '/incident/report',
            '/rescue',
            '/relief',
            '/history',
            '/about',
            '/data-sources',
            '/contact',
            '/privacy',
        ];

        foreach ($paths as $path) {
            $this->get($path)->assertOk();
        }
    }

    public function test_admin_get_routes_return_ok(): void
    {
        $paths = [
            '/admin',
            '/admin/bulletins',
            '/admin/roads',
            '/admin/missing',
            '/admin/incidents',
            '/admin/site-config',
        ];

        foreach ($paths as $path) {
            $this->get($path)->assertOk();
        }
    }
}
