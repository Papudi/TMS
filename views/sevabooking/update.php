<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sevabooking */

$this->title = 'Update Sevabooking: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sevabookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sevabooking-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
