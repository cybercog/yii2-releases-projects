<?php
/**
 * Created by PhpStorm.
 * @author: Roman Budnitsky
 * @date: 03.02.15 16:46
 * @copyright Copyright (c) 2015 PFSOFT LLC
 *
 * Class DefaultController
 */

namespace devbrom\releases\controllers;

use yii\web\Controller;

class DefaultController extends Controller {

    public function actionIndex() {
        echo 'OK!';
    }

}