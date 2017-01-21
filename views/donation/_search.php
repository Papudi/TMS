<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DonationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'donor_id') ?>

    <?= $form->field($model, 'occasion') ?>

    <?= $form->field($model, 'fordate') ?>

    <?php // echo $form->field($model, 'nameof') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'marriage') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'calendar') ?>

    <?php // echo $form->field($model, 'paksha') ?>

    <?php // echo $form->field($model, 'masa') ?>

    <?php // echo $form->field($model, 'thiti') ?>

    <?php // echo $form->field($model, 'donationtype_id') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'paymentmode_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
