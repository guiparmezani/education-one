<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Pro\Snapshot\Ajax;

use WPStaging\Framework\Adapter\HookedTemplate;
use WPStaging\Pro\Snapshot\Service;

class Delete extends AbstractTemplateComponent
{

    /** @var Service */
    private $service;

    public function __construct(Service $service, HookedTemplate $hookedTemplate)
    {
        parent::__construct($hookedTemplate);
        $this->service = $service;
    }

    public function registerHooks()
    {
        add_action('wp_ajax_wpstg--snapshots--delete', [$this, 'render']);
    }

    public function render()
    {
        if ( ! $this->canRenderAjax()) {
            return;
        }

        $id = isset($_POST['id'])? sanitize_text_field($_POST['id']) : '';
        $this->service->deleteById($id);
    }
}
