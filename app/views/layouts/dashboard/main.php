<?php

use dashboard\assets\AppAsset;
use dashboard\modules\user\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use dashboard\modules\post\models\Comment;
use dashboard\modules\contact\models\Contact;

//AppAsset::register($this);

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
    <h1>Main Page</h1>
    <?= $content ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>