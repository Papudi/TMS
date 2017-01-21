<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SevabookingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sevabooking-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'sevaevents_id') ?>

    <?= $form->field($model, 'devotee_id') ?>

    <?= $form->field($model, 'staff_id') ?>

    <?php // echo $form->field($model, 'amountpaid') ?>

    <?php // echo $form->field($model, 'amountbalance') ?>

    <?php // echo $form->field($model, 'paymentmode') ?>

    <?php // echo $form->field($model, 'cancelation') ?>

    <?php // echo $form->field($model, 'refund') ?>

    <?php // echo $form->field($model, 'transaction_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
