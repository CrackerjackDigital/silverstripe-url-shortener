<?php

/**
 * Constants which can be set independantly of normal isDev etc, by default track it though.
 * Can be used e.g. in config with constantdefined.
 */
if (!defined('MODULAR_DEV')) {
    if (Director::isDev()) {
        define('MODULAR_DEV', 'auto');
    }
}
if (!defined('MODULAR_TEST')) {
    if (Director::isTest()) {
        define('MODULAR_TEST', 'auto');
    }
}
if (!defined('MODULAR_LIVE')) {
    if (Director::isLive()) {
        define('MODULAR_LIVE', 'auto');
    }
}
