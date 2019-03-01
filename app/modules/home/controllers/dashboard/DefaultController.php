<?php
namespace app\modules\home\controllers\dashboard;

use app\modules\statistics\models\Visitors;
use dashboard\modules\user\models\user;
use Yii;
use yii\data\ActiveDataProvider;
use app\components\Controller;
use dashboard\modules\post\models\Post;
use yii\filters\VerbFilter;

/**
 * Default controller for the `posts` module
 */
class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['index','create','update','delete','view'],
//                'rules' => [
//                    [
//                        'actions' => ['index','create','update','delete','view'],
//                        'allow' => true,
//                        'roles' => ['author', 'moderator', 'admin'],
//                    ]
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        # remove the clause ONLY_FULL_GROUP_BY
//        $query = Yii::$app->getDb();
//        $query->createCommand("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));")->query();
//
        $visitors = new Visitors;
//
//        $posts = new Post;
//        $postsDataProvider = new ActiveDataProvider([
//            'query' => $posts->find()->where("view > 0")->orderBy('view DESC')->limit(10),
//            'sort' => false,
//            'pagination' => false
//        ]);
//
//        $files = new File;
//        $filePostsDataProvider = new ActiveDataProvider([
//            'query' => $files->find()->where("download_count > 0")->orderBy('download_count DESC')->limit(10),
//            'sort' => false,
//            'pagination' => false
//        ]);
//
//        $user = User::findIdentity(Yii::$app->user->id);
//        $user->avatar = User::getAvatar(Yii::$app->user->id);

        return $this->render('index',[
//            'visitorsModel' => $visitors,
            'visitors' => $visitors->find()->orderBy('id DESC')->limit(100)->all(),
            'chart' => $visitors->chart(),
//            'post' => $postsDataProvider,
//            'postModel' => $posts,
//            'files' =>$filePostsDataProvider,
//            'fileModel' => $files,
//            'user' => $user,
        ]);
    }
}
