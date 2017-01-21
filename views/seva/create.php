<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Seva */

$this->title = 'Create Seva';
$this->params['breadcrumbs'][] = ['label' => 'Sevas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seva-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
