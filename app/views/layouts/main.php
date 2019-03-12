<?php
use app\assets\DashboardAsset;
use app\modules\user\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\components\widgets\Alert;
use app\modules\contact\models\Contact;

DashboardAsset::register($this);

$modules_id = Yii::$app->controller->module->id;
$controller_id = Yii::$app->controller->id;
$action_id = Yii::$app->controller->action->id;
$entity_id = isset($_GET['id']) ? (int)$_GET['id'] : null;

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
        <?= Html::csrfMetaTags() ?>
        <title><?= Yii::t('app', 'Raspina') ?> - <?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script type="text/javascript">
            var base_url = '<?= Url::base() ?>';
            var modules_name = '<?= $modules_id ?>';
            var controller_name = '<?= $controller_id ?>';
            var action_name = '<?= $action_id ?>';
            var entity_id = '<?= $entity_id ?>';
        </script>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="base-container">
        <div class="menu-container col-md-2">
            <br>
            <div class="rs-profile-content">
                <div class="rs-profile-image"><img src="http://127.0.0.1:32768/3050755.jpeg"></div>
                <div class="rs-profile-text">احسان رضایی</div>
            </div>
            <div class="clear"></div>

            <div>
                <div class="new-post">
                    <div class="pen btn btn-primary">
                        <img class="pen-icon" src="<?= Yii::$app->setting->getValue('url') ?>app/web/img/pen.svg">
                        <div><?= Yii::t('app', 'New Post') ?></div>
                    </div>
                </div>
                <!-- menu start -->
                <ul class="menu-item" style="width: 100%">
                    <?php if (Yii::$app->user->can('post')): ?>
                        <li class="menu-item-child">
                            <a href="<?= Url::base(); ?>/post"><span class="fa fa-file-text"></span> <div><?= Yii::t('app', 'Posts') ?></div></a>
                        </li>
                    <?php endif; ?>

                    <?php if (Yii::$app->user->can('category')): ?>
                        <li class="menu-item-child">
                            <a href="<?= Url::base(); ?>/post/category/index"><span class="fa fa-book"></span> <div><?= Yii::t('app', 'Categories') ?></div></a>
                        </li>
                    <?php endif; ?>

                    <?php if (Yii::$app->user->can('file')): ?>
                        <li class="menu-item-child">
                            <a href="<?= Url::base(); ?>/file"><span class="fa fa-upload"></span> <div><?= Yii::t('app', 'Files') ?></div></a>
                        </li>
                    <?php endif; ?>

                    <?php if (Yii::$app->user->can('newsletter')): ?>
                        <li class="menu-item-child">
                            <a href="<?= Url::base(); ?>/newsletter"><span class="fa fa-paper-plane"></span> <div><?= Yii::t('app', 'Newsletter') ?></div></a>
                        </li>
                    <?php endif; ?>

                    <?php if (Yii::$app->user->can('link')): ?>
                        <li class="menu-item-child">
                            <a href="<?= Url::base(); ?>/link"><span class="fa fa-link"></span> <div><?= Yii::t('app', 'Links') ?></div></a>
                        </li>
                    <?php endif; ?>

                    <?php if (Yii::$app->user->can('statistics')): ?>
                        <li class="menu-item-child">
                            <a href="<?= Url::base(); ?>/statistics"><span class="fa fa-line-chart"></span> <div><?= Yii::t('app', 'Statistics') ?></div></a>
                        </li>
                    <?php endif; ?>

                    <?php if (Yii::$app->user->can('user')): ?>
                        <li class="menu-item-child">
                            <a href="<?= Url::base(); ?>/user"><span class="fa fa-user"></span> <div><?= Yii::t('app', 'Users') ?></div></a>
                        </li>
                    <?php endif; ?>

                    <?php if (Yii::$app->user->can('template')): ?>
                        <li class="menu-item-child">
                            <a href="<?= Url::base(); ?>/template"><span class="fa fa-file-code-o"></span> <div><?= Yii::t('app', 'Template') ?></div></a>
                        </li>
                    <?php endif; ?>

                    <?php if (Yii::$app->user->can('settings')): ?>
                        <li class="menu-item-child">
                            <a href="<?= Url::base(); ?>/setting/default/update"><span class="fa fa-file-code-o"></span> <div><?= Yii::t('app', 'Settings') ?></div></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- menu end -->
            </div>
            <br>
        </div>
        <div class="main-container col-md-10">
            <br>
            <div class="col-md-12">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
            </div>
            <?= $content ?>
        </div>
    </div>



    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>