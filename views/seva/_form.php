<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Calendar;

/* @var $this yii\web\View */
/* @var $model app\models\Seva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seva-form container col-lg-8 col-lg-offset-2">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true])->label('Seva Ticket Price') ?>

    <?= $form->field($model, 'maxlimit')->textInput()->label('Number of Seva Tickets') ?>

    <?= $form->field($model, 'seats')->textInput()->label('Number of people per ticket') ?>

    <?= $form->field($model, 'calendar')->hiddenInput(['value' => 2])->label(false) ?>

    <?= $form->field($model, 'repeats')->dropDownList(['0' => 'Does not repeat', '7' => 'Week', '30' => 'Month', '365' => 'Year']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary      ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
