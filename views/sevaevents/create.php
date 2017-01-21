<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sevaevents */

$this->title = 'Create Sevaevents';
$this->params['breadcrumbs'][] = ['label' => 'Sevaevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sevaevents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
