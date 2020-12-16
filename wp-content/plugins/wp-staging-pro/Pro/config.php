<?php

use WPStaging\Pro\Snapshot\Ajax\Create as AjaxSnapshotCreate;
use WPStaging\Pro\Snapshot\Ajax\Listing as AjaxSnapshotListing;
use WPStaging\Pro\Snapshot\Ajax\ConfirmDelete as AjaxSnapshotConfirmDelete;
use WPStaging\Pro\Snapshot\Ajax\Delete as AjaxSnapshotDelete;
use WPStaging\Pro\Snapshot\Ajax\Cancel as AjaxSnapshotCancel;
use WPStaging\Pro\Snapshot\Ajax\Edit as AjaxSnapshotEdit;
use WPStaging\Pro\Snapshot\Site\Ajax\Status as AjaxSnapshotSiteStatus;
use WPStaging\Pro\Snapshot\Database\Ajax\Export as AjaxSnapshotExport;
use WPStaging\Pro\Snapshot\Database\Ajax\ConfirmRestore as AjaxSnapshotDatabaseConfirmRestore;
use WPStaging\Pro\Snapshot\Database\Ajax\Restore as AjaxSnapshotDatabaseRestore;
use WPStaging\Pro\Snapshot\Site\Ajax\FileList as AjaxSnapshotImportFileList;
use WPStaging\Pro\Snapshot\Site\Ajax\FileInfo as AjaxSnapshotImportFileInfo;
use WPStaging\Pro\Snapshot\Site\Ajax\Restore as AjaxSnapshotImportRestore;
use WPStaging\Pro\Snapshot\Site\Ajax\Upload as AjaxSnapshotImportUpload;

return [
    // PRO version only params or override free version params
    'params' => [
        'version' => 'Pro',
        'slug' => 'wp-staging-pro',
    ],
    // PRO version only services
    'services' => [],
    // PRO version only components
    'components' => [
        AjaxSnapshotListing::class,
        AjaxSnapshotCreate::class,
        AjaxSnapshotConfirmDelete::class,
        AjaxSnapshotDelete::class,
        AjaxSnapshotCancel::class,
        AjaxSnapshotEdit::class,
        AjaxSnapshotSiteStatus::class,
        AjaxSnapshotExport::class,
        AjaxSnapshotDatabaseConfirmRestore::class,
        AjaxSnapshotDatabaseRestore::class,
        AjaxSnapshotImportFileList::class,
        AjaxSnapshotImportFileInfo::class,
        AjaxSnapshotImportRestore::class,
        AjaxSnapshotImportUpload::class,
    ],
    // Use to override Free Mapping or add PRO version only components
    'mapping' => [],
];
