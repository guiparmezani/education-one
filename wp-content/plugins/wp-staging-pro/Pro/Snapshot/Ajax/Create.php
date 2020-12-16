<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Pro\Snapshot\Ajax;

use WPStaging\Framework\Adapter\HookedTemplate;
use WPStaging\Framework\Container\Container;
use WPStaging\Pro\Snapshot\Database\Job\JobCreateSnapshot;
use WPStaging\Pro\Snapshot\Site\Job\JobSiteExport;

class Create extends AbstractTemplateComponent
{

    /** @var Container */
    private $container;

    // This is not right thing to do but "cheaper" thing to do
    public function __construct(Container $container, HookedTemplate $hookedTemplate)
    {
        parent::__construct($hookedTemplate);
        $this->container = $container;
    }

    public function registerHooks()
    {
        add_action('wp_ajax_wpstg--snapshots--create', [$this, 'render']);
    }

    public function render()
    {
        if ( ! $this->canRenderAjax()) {
            return;
        }

        $job = $this->getJob();
        $response = $job->execute();
        wp_send_json($response);
    }

    private function getJob()
    {
        if (!empty($_POST['wpstg']['jobs']['snapshot']['site'])) {
            return $this->container->get(JobSiteExport::class);
        }
        return $this->container->get(JobCreateSnapshot::class);
    }
}
