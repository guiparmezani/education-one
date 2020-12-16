<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Pro\Snapshot\Ajax;

use WPStaging\Framework\Adapter\HookedTemplate;
use WPStaging\Framework\Component\AbstractTemplateComponent as AbstractTemplateComponentBase;
use WPStaging\Framework\TemplateEngine\TemplateEngine;

/**
 * Class AbstractTemplateComponent
 *
 * Todo: Remove this class. Similar classes:
 * @see \WPStaging\Framework\Component\AbstractTemplateComponent
 * @see \WPStaging\Framework\Component\AbstractComponent
 *
 * @package WPStaging\Pro\Snapshot\Ajax
 */
abstract class AbstractTemplateComponent extends AbstractTemplateComponentBase
{
    public function __construct(HookedTemplate $hookedTemplate)
    {
        parent::__construct($hookedTemplate);
        $this->setTemplateEnginePath($hookedTemplate->getTemplateEngine());
    }

    private function setTemplateEnginePath(TemplateEngine $templateEngine)
    {
        $templateEngine->setPath($templateEngine->getPluginDirectory() . 'Pro/Snapshot/');
    }
}
