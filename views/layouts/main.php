<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Html::img('@web/images/logo.png', ['alt' => \Yii::$app->params['organisation.name'], 'class' => 'pull-left', 'width' => '40']) . \Yii::$app->params['organisation.shortname'],
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

              echo Nav::widget([
              'options' => ['class' => 'navbar-nav navbar-right'],
              'items' => [
              ['label' => 'Home', 'url' => ['/site/index']],
              Yii::$app->user->can('staff') ?
              ['label' => 'Donations',
              'items' => [
              ['label' => 'Collect Donation', 'url' => '?r=donation/create'],
              ['label' => 'Donations Report', 'url' => ['donation/report']],
              ],
              ] :
              ['label' => ''],
              Yii::$app->user->can('admin') ?
              ['label' => 'Admin',
              'items' => [
              '<li class="dropdown-header">Donations</li>',
              ['label' => 'Donation Reports', 'url' => '?r=donation/report'],
              ['label' => 'Manage Donation Types', 'url' => '?r=donationtype/'],
              '<li class="divider"></li>',
              '<li class="dropdown-header">Users</li>',
              ['label' => 'Manage Users', 'url' => '?r=userprofile/'],
              ['label' => 'Manage User Roles', 'url' => '?r=usertype/'],
              '<li class="divider"></li>',
              '<li class="dropdown-header">Other Masters</li>',
              ['label' => 'Cities', 'url' => '?r=city/'],
              ['label' => 'States', 'url' => '?r=state/'],
              ['label' => 'Countries', 'url' => '?r=country/'],
              ['label' => 'Calendar', 'url' => '?r=calendar/'],
              ],
              ] :
              ['label' => ''],
              Yii::$app->user->isGuest ?
              ['label' => 'Login', 'url' => ['/site/login']] :
              [
              'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
              'url' => ['/site/logout'],
              'linkOptions' => ['data-method' => 'post']
              ],
              ],
              ]);


            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Team Group <?= date('Y') ?></p>

<!--                <p class="pull-right"><?= Yii::powered() ?></p> -->
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
