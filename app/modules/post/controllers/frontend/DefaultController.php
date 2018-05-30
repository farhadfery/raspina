<?php
namespace app\modules\post\controllers\frontend;

use Yii;
use yii\web\Controller;
use dashboard\modules\post\models\PostSearch;
use dashboard\modules\post\models\Post;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Default controller for the `posts` module
 */
class DefaultController extends Controller
{
    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        exit('frontend/post');
    }
}
