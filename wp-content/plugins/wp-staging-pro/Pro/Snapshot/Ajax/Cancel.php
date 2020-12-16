<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Pro\Snapshot\Ajax;

use RuntimeException;
use WPStaging\Framework\Adapter\Directory;
use WPStaging\Framework\Adapter\HookedTemplate;
use WPStaging\Framework\Container\Container;
use WPStaging\Pro\Snapshot\Database\Job\JobCreateSnapshot;
use WPStaging\Pro\Snapshot\Site\Job\JobSiteExport;
use WPStaging\Framework\Filesystem\Filesystem;

// TODO RPoC
class Cancel extends AbstractTemplateComponent
{

    /** @var Container */
    private $container;

    public function __construct(Container $container)
    {
        parent::__construct($container->get(HookedTemplate::class));
        $this->container = $container;
    }

    public function registerHooks()
    {
        add_action('wp_ajax_wpstg--snapshots--cancel', [$this, 'render']);
    }

    public function render()
    {
        if ( ! $this->canRenderAjax()) {
            return;
        }

        $directory = $this->container->get(Directory::class);
        (new Filesystem)->delete($directory->getCacheDirectory() . $this->findJobName());
        wp_send_json(true);
    }

    // Hack & Slash || Rip & Tear until it is done!
    private function findJobName()
    {
        if (!empty($_POST['type']) && 'database' === $_POST['type']) {
            return JobCreateSnapshot::JOB_NAME;
        }

        return JobSiteExport::JOB_NAME;
    }
}
