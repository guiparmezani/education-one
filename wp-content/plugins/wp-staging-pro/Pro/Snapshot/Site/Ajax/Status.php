<?php

namespace WPStaging\Pro\Snapshot\Site\Ajax;

use WPStaging\Framework\Component\AbstractComponent;
use WPStaging\Framework\Component\AjaxTrait;
use WPStaging\Framework\Container\Container;
use WPStaging\Pro\Snapshot\Site\Job\JobSiteExport;
use WPStaging\Pro\Snapshot\Site\Job\JobSiteRestore;

class Status extends AbstractComponent
{
    use AjaxTrait;

    const TYPE_RESTORE = 'restore';

    /** @var Container */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function registerHooks()
    {
        add_action('wp_ajax_wpstg--snapshots--status', [$this, 'render']);
    }

    public function render()
    {
        if ( ! $this->canRenderAjax()) {
            return;
        }

        wp_send_json($this->getJob()->getDto());
    }

    /**
     * @return JobSiteExport|JobSiteRestore
     */
    private function getJob()
    {
        if (!empty($_GET['process']) && self::TYPE_RESTORE === $_GET['process']) {
            return $this->container->get(JobSiteRestore::class);
        }
        return $this->container->get(JobSiteExport::class);
    }
}
