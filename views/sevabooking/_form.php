<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Sevabooking */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$devoteeautofill = \app\models\Userprofile::find()
        ->select([
            'CONCAT(firstname," ",lastname," - ",mobile) as value',
            'CONCAT(firstname," ",lastname," - ",mobile) as label',
            'id as id'])
        ->asArray()
        ->all();

$sevaevents = \app\models\Sevaevents::find()->all();
$sevaeventdatesavailable = ArrayHelper::map($sevaevents, 'id', 'sevaDatetime');
$sevaeventAmount = ArrayHelper::map($sevaevents, 'id', 'sevaAmount');
//print_r($sevaeventAmount);
?>


<div class="sevabooking-form container"> 

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-10 col-md-offset-1">
        <p></p>
        <div class="row">
            <div class="col-md-4">
                <?=
                $form->field($model, 'devotee_name')->widget(yii\jui\AutoComplete::className(), [
                    'clientOptions' => [
                        'source' => $devoteeautofill,
                        'autoFill' => true,
                        'select' => new JsExpression("function(event,ui) { $('#sevabooking-devotee_id').val(ui.item.id); }"),
                    ],
                    'clientEvents' => [
                        'select' => "function(event,ui) { $('#sevabooking-devotee_id').val(ui.item.id); }"
                    ]
                ])
                ?>  
            </div>
            <div class="col-md-5">
                <?= $form->field($model, 'devotee_id')->textInput(['readonly' => TRUE, 'style' => 'width:100px; height:30px;'])->label(false) ?>  
            </div>
            <div class="col-md-2">
                <a class="btn btn-primary pull-left" href="index.php?r=userprofile/create" role="button">Add New Devotee</a>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <!--                <?= $form->field($model, 'sevaevents_id')->dropDownList($sevaeventdatesavailable, ['prompt' => 'Please select a Seva ']) ?> -->
                <?=
                $form->field($model, 'sevaevents_id')->dropDownList($sevaeventdatesavailable, [
                    'onChange' => '$( "#sevabooking-amountpaid" ).val('.$sevaeventAmount[1].');',
                    'prompt' => 'Please select a Seva ',
                ])
                ?>

            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'seva_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd',]) ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'paymentmode_id')->dropDownList(['1' => 'Cash', '2' => 'Cheque', '3' => 'DD', '3' => 'Transfer', '4' => 'Website']) ?>
            </div>
            <div class="col-md-3">              
                <?= $form->field($model, 'amountpaid')->textInput() ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'remarks')->textarea(['rows' => 3]) ?>
            </div>
        </div>

        <?= $form->field($model, 'staff_id')->hiddenInput(['value' => '1'])->label(false) ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Book' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>



</div> 
