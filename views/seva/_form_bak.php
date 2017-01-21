<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Calendar;

/* @var $this yii\web\View */
/* @var $model app\models\Seva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="seva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maxlimit')->textInput()->label('Number of seva tickets') ?>

    <?= $form->field($model, 'seats')->textInput()->label('Number of people per seva ticket') ?>
<!--
    <?= $form->field($model, 'recurring')->textInput() ?>

    <?= $form->field($model, 'calendar')->textInput() ?>
-->
    <?= $form->field($model, 'calendar')->dropDownList( ArrayHelper::map(Calendar::find()->all(), 'id', 'name'),['prompt'=>'Please select a calendar']) ?>
<!--
    <?= $form->field($model, 'is_active')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
