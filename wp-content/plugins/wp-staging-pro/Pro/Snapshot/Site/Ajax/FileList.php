<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Pro\Snapshot\Site\Ajax;

use WPStaging\Framework\Adapter\Directory;
use WPStaging\Framework\Component\AbstractTemplateComponent;
use WPStaging\Framework\TemplateEngine\TemplateEngine;
use WPStaging\Framework\Utils\Size;
use WPStaging\Framework\Filesystem\Filesystem;

class FileList extends AbstractTemplateComponent
{
    /** @var Directory */
    private $directory;

    public function __construct(Directory $directory, TemplateEngine $templateEngine)
    {
        parent::__construct($templateEngine);
        $this->directory = $directory;
    }

    public function render()
    {
        if ( ! $this->canRenderAjax()) {
            return;
        }

        $pluginUploadsDir = $this->directory->getPluginUploadsDirectory();
        $iterator = (new Filesystem)
            ->setPath($pluginUploadsDir)
            ->setDepth('0')
            ->addFileName('*.wpstg')
            ->findFiles()
        ;

        $iteratorHasResults = count($iterator) > 0;

        if (!$iterator || !$iteratorHasResults) {
            wp_send_json([]);
            return;
        }

        $files = [];
        foreach ($iterator as $item) {
            $files[] = [
                'fullPath' => str_replace($pluginUploadsDir, null, $item->getRealPath()),
                'name' => $item->getFilename(),
                'size' => (new Size)->toUnit($item->getSize()),
            ];
        }

        wp_send_json($files);
    }
}
