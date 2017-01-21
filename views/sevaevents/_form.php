<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use app\models\Seva;

/* @var $this yii\web\View */
/* @var $model app\models\Sevaevents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sevaevents-form">

    <?php $form = ActiveForm::begin(); ?>
<!--
    <?= $form->field($model, 'seva')->textInput() ?>
-->
    <?= $form->field($model, 'seva_id')->dropDownList(ArrayHelper::map(Seva::find()->all(), 'id', 'name'), ['prompt'=>'Please select a Seva']) ?>

    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(),['dateFormat'=>'yyyy-MM-dd',]) ?>

    <?= $form->field($model, 'starttime')->textInput() ?>

    <?= $form->field($model, 'endtime')->textInput() ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
