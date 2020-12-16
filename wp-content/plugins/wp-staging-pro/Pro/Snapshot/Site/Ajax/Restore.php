<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Pro\Snapshot\Site\Ajax;

use WPStaging\Framework\Component\AbstractComponent;
use WPStaging\Framework\Component\AjaxTrait;
use WPStaging\Framework\Container\Container;
use WPStaging\Pro\Snapshot\Site\Job\JobSiteRestore;

class Restore extends AbstractComponent
{
    use AjaxTrait;

    /** @var Container */
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function registerHooks()
    {
        // Todo: Remove this and re-add through the Site Export/Import branch
        //$this->addAction('wp_ajax_wpstg--snapshots--site--restore', 'render');
        //$this->addAction('wp_ajax_nopriv_wpstg--snapshots--site--restore', 'render');
    }

    public function render()
    {
        if ( ! $this->canRenderAjax()) {
            return;
        }

        // We explicitly do not check capabilities here, since the DB is going to be replaced.
        // For authentication, we rely on the AccessToken, only granted to authenticated users.

        /** @var JobSiteRestore $job */
        $job = $this->container->get(JobSiteRestore::class);
        $response = $job->execute();
        wp_send_json($response);
    }
}
