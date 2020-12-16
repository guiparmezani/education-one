<?php

namespace WPStaging\Backend\Pro;

class ProServiceProvider
{
    public function enqueueActions()
    {
        add_action('wpstg.views.single_overview.after_existing_clones_buttons', [$this, 'addPushButton'], 10, 3);
        add_action('wpstg.views.single_overview.after_existing_clones_details', [$this, 'addEditCloneLink'], 10, 3);
    }

    /**
     * Add the "Push" button to the template
     */
    public function addPushButton($name, $data, $license)
    {
        include __DIR__ . '/views/clone/ajax/push-button.php';
    }

    /**
     * Add the "Edit this Clone" link to the template
     */
    public function addEditCloneLink($name, $data, $license)
    {
        include __DIR__ . '/views/clone/ajax/edit-clone.php';
    }
}
