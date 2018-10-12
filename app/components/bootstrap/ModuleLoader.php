<?php
namespace app\components\bootstrap;

use app\models\Modules;
use Yii;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\web\Request;

class ModuleLoader implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $modules = Modules::findAll(['status' => Modules::ACTIVE]);

        $config = [];
        foreach ((array)$modules as $m)
        {
            $config[$m->key] = $m->path;
        }
        Yii::$app->modules = $config;
    }
}