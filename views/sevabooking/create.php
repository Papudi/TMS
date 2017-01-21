<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sevabooking */

$this->title = 'Seva Booking';
$this->params['breadcrumbs'][] = ['label' => 'Sevabookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sevabooking-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
