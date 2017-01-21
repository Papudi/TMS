<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Donation */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    $donorautofill = \app\models\Userprofile::find()
        ->select(['firstname as value', 'firstname+lastname as  label','id as id'])
        ->asArray()
        ->all();
?>

<div class="donation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'donor_id')->widget(yii\jui\AutoComplete::className(), [
        'clientOptions' => [
            'source' => $donorautofill,
            'autoFill'=>true,
            'select' => new JsExpression("function(event,ui){
                $('#donation-donor_id').val(ui.item.id);
                }"),  
        ],
        'clientEvents' => [
            'select' => 'function(event,ui) {alert(ui.item.id);}'
        ],
        ]) ?> 

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
