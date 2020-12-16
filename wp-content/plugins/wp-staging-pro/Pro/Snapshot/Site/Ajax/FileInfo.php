<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Pro\Snapshot\Site\Ajax;

use WPStaging\Framework\Adapter\Directory;
use WPStaging\Framework\Adapter\HookedTemplate;
use WPStaging\Framework\Component\AjaxTrait;
use WPStaging\Pro\Snapshot\Ajax\AbstractTemplateComponent;
use WPStaging\Pro\Snapshot\Site\Service\Compressor;

class FileInfo extends AbstractTemplateComponent
{
    use AjaxTrait;

    /** @var Compressor */
    private $exporter;
    /**
     * @var Directory
     */
    private $directory;

    public function __construct(Compressor $exporter, Directory $directory, HookedTemplate $hookedTemplate)
    {
        parent::__construct($hookedTemplate);
        $this->exporter = $exporter;
        $this->directory = $directory;
    }

    public function registerHooks()
    {
        add_action('wp_ajax_wpstg--snapshots--import--file-info', [$this, 'render']);
    }

    public function render()
    {
        if ( ! $this->canRenderAjax()) {
            return;
        }

        // Replace & add ABSPATH back is in a way a security measure to not fiddle with other directories
        $path = $this->directory->getPluginUploadsDirectory();
        $file = $path . str_replace($path, null, $_POST['filePath']);
        $info = $this->exporter->findExportFileInfo($file);

        $result = $this->templateEngine->render(
            'Site/template/info.php',
            [
                'info' => $info,
            ]
        );

        wp_send_json($result);
    }
}
