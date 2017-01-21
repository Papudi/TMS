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
        ->select([
            'CONCAT(firstname," ",lastname," - ",mobile) as value',
            'CONCAT(firstname," ",lastname," - ",mobile) as label',
            'id as id'])
        ->asArray()
        ->all();

$donationtype = \app\models\Donationtype::find()->all();
$donationtypeAmount = ArrayHelper::map($donationtype, 'id', 'amount');
$donationtypeRepeats = ArrayHelper::map($donationtype, 'id', 'repeats');

$this->registerJsFile(
        '@web/js/calendar.js', ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<script>

// Short hand for checking document is ready
//    $(function () {

// Auto populate donation amount based on donation type
    var dtamount = JSON.parse('<?php echo json_encode($donationtypeAmount); ?>');
// Get if donation type is recurring / repeats
    var dtrepeats = JSON.parse('<?php echo json_encode($donationtypeRepeats); ?>');

//    });

</script>


<div class="donation-form">

<?php $form = ActiveForm::begin(); ?>
    <div class="col-md-10 col-md-offset-1 ">
        <div class="row">
            <div class="col-md-2 col-md-push-8">
<?php if (!$model->date) $model->date = date('Y-m-d'); ?>
<?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'dd-MM-yyyy', 'options' => ['class' => 'form-control']]) ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
<?=
$form->field($model, 'donor_name')->widget(yii\jui\AutoComplete::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'source' => $donorautofill,
        'autoFill' => true,
        'select' => new JsExpression("function(event,ui) { $('#donation-donor_id').val(ui.item.id); }"),
    ],
    'clientEvents' => [
        'select' => "function(event,ui) { $('#donation-donor_id').val(ui.item.id); inthename(ui.item.value); }"
    ],
])
?>  
            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'donor_id')->textInput(['readonly' => TRUE, 'style' => 'width:150px; ']) ?>  
            </div>
            <div class="col-md-3 col-md-push-1"> <div class="control-label">Didn't find Donor?</div>
                <a class="btn btn-primary pull-left" href="index.php?r=userprofile/create" role="button">Add New Donor</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
<?= $form->field($model, 'nameof')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'dob')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'dd-MM-yyyy', 'options' => ['class' => 'form-control',]]) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'marriage')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'dd-MM-yyyy', 'options' => ['class' => 'form-control']]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">   
<?=
$form->field($model, 'donationtype_id')->dropDownList(ArrayHelper::map(app\models\Donationtype::find()->all(), 'id', 'name'), [
    'onChange' => 'setAmount($(this));',
    'prompt' => 'Please select Donation'])
?>
            </div>
            <div class="col-md-3">   
                <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">  
<?=
$form->field($model, 'calendar')->dropDownList(ArrayHelper::map(app\models\Calendar::find()->all(), 'id', 'name'), [
    'onChange' => 'setCalendar();',
    'prompt' => 'Select Calendar'])
?>
            </div>

            <div class="col-md-2" id="date-0-english" style="display: none;">
<?= $form->field($model, 'fordate')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'dd-MM-yyyy', 'options' => ['class' => 'form-control', 'placeholder' => 'For Date']]) ?>
            </div>
            <div class="col-md-2" id="date-0a-english-day" style="display: none;">
                <?= $form->field($model, 'day')->dropDownList(['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30', '31' => '31']) ?>
            </div>
            <div class="col-md-2" id="date-0a-english-month" style="display: none;">
                <?= $form->field($model, 'month')->dropDownList(['1' => 'Jan', '2' => 'Feb', '3' => 'Mar', '4' => 'Apr', '5' => 'May', '6' => 'Jun', '7' => 'Jul', '8' => 'Aug', '9' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec']) ?>
            </div>

            <div class="col-md-2" id="date-2-hindu-masa" style="display: none;">              
<?= $form->field($model, 'masa')->dropDownList(\Yii::$app->params['masa'], ['prompt' => 'Select Masa']) ?>
            </div>
            <div class="col-md-2" id="date-2-hindu-paksha" style="display: none;">  
                <?= $form->field($model, 'paksha')->dropDownList(\Yii::$app->params['paksha'], ['prompt' => 'Select Paksha']) ?>
            </div>
            <div class="col-md-2" id="date-2-hindu-thithi" style="display: none;">   
                <?= $form->field($model, 'thiti')->dropDownList(\Yii::$app->params['thithi'], ['prompt' => 'Select Thithi']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
<?= $form->field($model, 'occasion')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">   
<?= $form->field($model, 'paymentmode_id')->dropDownList(['1' => 'Cash', '2' => 'Cheque', '3' => 'DD', '3' => 'Transfer']) ?>
            </div>
            <div class="col-md-3">   
                <?= $form->field($model, 'reference')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-3">   
                <?= $form->field($model, 'user_id')->hiddenInput(['value' => '0'])->label(false) ?>
<?= $form->field($model, 'status')->hiddenInput(['value' => '1'])->label(false) ?> 
            </div>
        </div>

        <div class="row">
            <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

</div>
