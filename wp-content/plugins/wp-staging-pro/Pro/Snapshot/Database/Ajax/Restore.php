<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Pro\Snapshot\Database\Ajax;

use WPStaging\Framework\Component\AbstractComponent;
use WPStaging\Framework\Component\AjaxTrait;
use WPStaging\Framework\Container\Container;
use WPStaging\Pro\Snapshot\Database\Job\JobRestoreSnapshot;

class Restore extends AbstractComponent
{
    use AjaxTrait;

    /** @var Container */
    private $container;

    // This is not right thing to do but "cheaper" thing to do
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function registerHooks()
    {
        add_action('wp_ajax_wpstg--snapshots--restore', [$this, 'render']);
    }

    public function render()
    {
        if ( ! $this->canRenderAjax()) {
            return;
        }

        $job = $this->container->get(JobRestoreSnapshot::class);
        wp_send_json($job->execute());
    }
}
