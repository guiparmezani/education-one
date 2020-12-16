<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Pro\Snapshot\Ajax;

use WPStaging\Framework\Adapter\Directory;
use WPStaging\Framework\Adapter\HookedTemplate;
use WPStaging\Pro\Snapshot\Repository\SnapshotRepository;

class Listing extends AbstractTemplateComponent
{

    /** @var SnapshotRepository  */
    private $snapshotRepository;

    /** @var Directory */
    private $directory;

    public function __construct(Directory $directory, SnapshotRepository $snapshotRepository, HookedTemplate $hookedTemplate)
    {
        parent::__construct($hookedTemplate);
        $this->snapshotRepository = $snapshotRepository;
        $this->directory = $directory;
    }

    public function registerHooks()
    {
        add_action('wp_ajax_wpstg--snapshots--listing', [$this, 'render']);
    }

    public function render()
    {
        if ( ! $this->canRenderAjax()) {
            return;
        }

        $snapshots = $this->snapshotRepository->findAll();
        if ($snapshots) {
            $snapshots->sortBy('updatedAt');
        }

        $directories = [
            'uploads' => $this->directory->getUploadsDirectory(),
            'themes' => trailingslashit(get_theme_root()),
            'plugins' => trailingslashit(WP_PLUGIN_DIR),
            'muPlugins' => trailingslashit(WPMU_PLUGIN_DIR),
            'wpContent' => trailingslashit(WP_CONTENT_DIR),
            'wpStaging' => $this->directory->getPluginUploadsDirectory(),
        ];

        $result = $this->templateEngine->render(
            'template/listing.php',
            [
                'snapshots' => $snapshots?: [],
                'directory' => $this->directory,
                'directories' => $directories,
                // TODO
                'urlPublic' => plugin_dir_url('wp-staging-pro/wp-staging-pro.php') . 'Backend/public/',
            ]
        );
        wp_send_json($result);
    }
}
