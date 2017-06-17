<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);

$modules_id = Yii::$app->controller->module->id;
$controller_id = Yii::$app->controller->id;
$action_id = Yii::$app->controller->action->id;
$entity_id = isset($_GET['id'])? (int)$_GET['id'] : 0;
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
    <title>رسپینا - <?= Html::encode($this->title) ?></title>
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
<div class="header">
    <div class="header-split" style="margin-top: 8px;">
        <img class="user-profile" src="<?= Yii::$app->setting->getValue('url') ?>/backend/web/img/avatar.jpg">
    </div>

        <div class="header-split" >
            <a href="#">
                <img class="header-icon" src="<?= Yii::$app->setting->getValue('url') ?>/backend/web/img/apps.svg">
            </a>
        </div>

    <div class="header-split" >
        <a href="#">
            <img class="header-icon" src="<?= Yii::$app->setting->getValue('url') ?>/backend/web/img/comments.svg">
            <span class="alert-count">8</span>
        </a>
    </div>

    <div class="header-split" >
        <a href="#">
            <img class="header-icon" src="<?= Yii::$app->setting->getValue('url') ?>/backend/web/img/messages.svg">
            <span class="alert-count">3</span>
        </a>
    </div>
</div>


<div class="pen">
    <img class="pen-icon" src="<?= Yii::$app->setting->getValue('url') ?>/backend/web/img/pen.svg">
</div>

<div class="pull-left main-content">
    <div class="col-md-12">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>