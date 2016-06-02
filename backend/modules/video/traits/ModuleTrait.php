<?php

namespace app\modules\video\traits;

use Yii;

trait ModuleTrait {

    /**
     * @var \vova07\blogs\Module|null Module instance
     */
    private $_module;

    /**
     * @return \vova07\blogs\Module|null Module instance
     */
    public function getModule() {
        if ($this->_module === null) {
            $this->_module = Yii::$app->getModule('video');
        }
        return $this->_module;
    }

}
