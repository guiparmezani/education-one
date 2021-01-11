<?php

namespace WPStaging\Pro\Snapshot;

use WPStaging\Framework\DI\ServiceProvider;
use WPStaging\Pro\Snapshot\Ajax\Cancel;
use WPStaging\Pro\Snapshot\Ajax\ConfirmDelete;
use WPStaging\Pro\Snapshot\Ajax\Create;
use WPStaging\Pro\Snapshot\Ajax\Delete;
use WPStaging\Pro\Snapshot\Ajax\Edit;
use WPStaging\Pro\Snapshot\Ajax\Listing;
use WPStaging\Pro\Snapshot\Database\Ajax\ConfirmRestore;
use WPStaging\Pro\Snapshot\Database\Ajax\Export;
use WPStaging\Pro\Snapshot\Database\Ajax\Restore as DatabaseRestore;
use WPStaging\Pro\Snapshot\Site\Ajax\Restore as SiteRestore;
use WPStaging\Pro\Snapshot\Site\Ajax\FileInfo;
use WPStaging\Pro\Snapshot\Site\Ajax\FileList;
use WPStaging\Pro\Snapshot\Site\Ajax\Status;
use WPStaging\Pro\Snapshot\Site\Ajax\Upload;

class SnapshotServiceProvider extends ServiceProvider
{
    public function registerClasses()
    {
    }

    public function addHooks()
    {
        add_action('wp_ajax_wpstg--snapshots--create', [$this->container->make(Create::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--listing', [$this->container->make(Listing::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--delete--confirm', [$this->container->make(ConfirmDelete::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--delete', [$this->container->make(Delete::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--cancel', [$this->container->make(Cancel::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--edit', [$this->container->make(Edit::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--status', [$this->container->make(Status::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--export', [$this->container->make(Export::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--restore--confirm', [$this->container->make(ConfirmRestore::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--restore', [$this->container->make(DatabaseRestore::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--import--file-list', [$this->container->make(FileList::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--import--file-info', [$this->container->make(FileInfo::class), 'render']);
        add_action('wp_ajax_wpstg--snapshots--import--file-upload', [$this->container->make(Upload::class), 'render']);

        // @todo: Add this back in the Site Export/Import branch
        // add_action('wp_ajax_wpstg--snapshots--site--restore', [$this->container->make(SiteRestore::class), 'render']);
        // add_action('wp_ajax_nopriv_wpstg--snapshots--site--restore', [$this->container->make(SiteRestore::class), 'render']);
    }
}
