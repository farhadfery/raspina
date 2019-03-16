<?php
namespace app\modules\home\controllers\dashboard;

use app\modules\statistics\models\Visitors;
use app\components\Controller;

/**
 * Default controller for the `posts` module
 */
class DefaultController extends Controller
{

    public function behaviors()
    {
        return [];
    }

    public function actionIndex()
    {
        $visitors = new Visitors;
        $lastVisitors = $visitors->find()
            ->orderBy(['id' => SORT_DESC])
            ->limit(100)
            ->asArray()
            ->all();

        $lastPageVisit = [];
        foreach ($lastVisitors as $lv)
        {
            $location_hash = md5($lv['location']);
            $lastPageVisit["{$lv['group_date']}-{$location_hash}"][] = $lv;
        }

        return $this->render('index',[
            'visitorsModel' => $visitors,
            'visitors' => $lastVisitors,
            'lastPageVisit' => $lastPageVisit,
            'chart' => $visitors->chart(),
        ]);
    }
}
