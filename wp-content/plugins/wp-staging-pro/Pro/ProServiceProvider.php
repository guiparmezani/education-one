<?php

namespace WPStaging\Pro;

use WPStaging\Framework\DI\ServiceProvider;
use WPStaging\Pro\License\LicenseServiceProvider;
use WPStaging\Pro\Snapshot\SnapshotServiceProvider;
use WPStaging\Pro\Template\TemplateServiceProvider;

class ProServiceProvider extends ServiceProvider
{
    public function registerClasses()
    {
        $this->container->register(TemplateServiceProvider::class);
        $this->container->register(LicenseServiceProvider::class);
        $this->container->register(SnapshotServiceProvider::class);
    }

    public function addHooks()
    {
        // no-op
    }
}
