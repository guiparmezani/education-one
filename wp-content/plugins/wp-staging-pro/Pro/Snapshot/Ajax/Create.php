<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Pro\Snapshot\Ajax;

use WPStaging\Framework\Component\AbstractTemplateComponent;
use WPStaging\Pro\Snapshot\Database\Job\JobCreateSnapshot;
use WPStaging\Pro\Snapshot\Site\Job\JobSiteExport;
use WPStaging\Core\WPStaging;

class Create extends AbstractTemplateComponent
{
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
            return WPStaging::getInstance()->get(JobSiteExport::class);
        }
        return WPStaging::getInstance()->get(JobCreateSnapshot::class);
    }
}
