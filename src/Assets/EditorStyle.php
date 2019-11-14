<?php

namespace Awsm\WPWrapper\Assets;

class EditorStyle extends Style
{
    /**
     * Where should the assets be registered.
     *
     * @var string Hook to register
     */
    protected $hook = 'enqueue_block_editor_assets';
}