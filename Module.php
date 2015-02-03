<?php
/**
 * Created by PhpStorm.
 * @author: Roman Budnitsky
 * @date: 03.02.15 14:13
 * @copyright Copyright (c) 2015 PFSOFT LLC
 *
 * Class Module
 */

namespace devbrom\releases;

use yii\base\Module as BaseModule;
use yii\base\BootstrapInterface;

class Module extends BaseModule implements BootstrapInterface {

    /** @var array Model map */
    public $modelMap = [];

    /** @var string BasePath to releases */
    public $releasesBasePath = null;

    /**
     * @var string The prefix for user module URL.
     */
    public $urlPrefix = 'user';

    /** @var array The rules to be used in URL management. */
    public $urlRules = [
        '<action:releases>' => 'default/index',
    ];



}