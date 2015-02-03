<?php
/**
 * Created by PhpStorm.
 * @author: Roman Budnitsky
 * @date: 03.02.15 14:51
 * @copyright Copyright (c) 2015 PFSOFT LLC
 *
 * Class Bootstrap
 * @package app\modules\releases
 */


namespace devbrom\releases;

use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface {

    /** @var array Model's map */
    private $_modelMap = [
        'Release' => 'devbrom\releases\models\Releases',
        'Project' => 'devbrom\releases\models\Project',
        'ProjectGroup' => 'devbrom\releases\models\ProjectGroup',
        'Note' => 'devbrom\releases\models\Note',
        'NoteType' => 'devbrom\releases\models\NoteType',
    ];

    /** @inheritdoc */
    public function bootstrap($app)
    {
        if ($app->hasModule('releases') && ($module = $app->getModule('releases')) instanceof Module) {
            $this->_modelMap = array_merge($this->_modelMap, $module->modelMap);
            foreach ($this->_modelMap as $name => $definition) {
                $class = "devbrom\\releases\\models\\" . $name;
                \Yii::$container->set($class, $definition);
                $modelName = is_array($definition) ? $definition['class'] : $definition;
                $module->modelMap[$name] = $modelName;
            }
        }
    }

}