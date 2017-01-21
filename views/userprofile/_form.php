<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\City;
use app\models\State;
use app\models\Country;
use app\models\Usertype;
use app\models\Nakshatra;
use app\models\Gothra;

/* @var $this yii\web\View */
/* @var $model app\models\Userprofile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userprofile-form container">
    <div class="col-md-10 col-md-offset-1">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
            </div>            
            <div class="col-md-6">
                <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
<!--            
            <div class="col-md-4">
                <?= $form->field($model, 'nakshatra_id')->dropDownList(ArrayHelper::map(Nakshatra::find()->all(), 'id', 'name'), ['prompt' => 'Please select Nakshatra'])->label('Nakshatra') ?>
            </div>            
            <div class="col-md-4">
                <?= $form->field($model, 'gothra_id')->dropDownList(ArrayHelper::map(Gothra::find()->all(), 'id', 'name'), ['prompt' => 'Please select Gothra'])->label('Gothra') ?>
            </div>
-->
            <div class="col-md-4">
                <?= $form->field($model, 'dob')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control',], 'clientOptions' => ['defaultDate' => '-18y']])->label('Date of Birth') ?>
            </div>

<!--
        </div>
        <div class="row">
-->
            <div class="col-md-4">
                <?= $form->field($model, 'gender')->radioList(array('M' => 'Male', 'F' => 'Female')) ?>
            </div>
        </div>        
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>            
            <div class="col-md-6">
                <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!--        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?> -->

                <?= $form->field($model, 'address1')->textInput(['maxlength' => true]) ?>
            </div>            
            <div class="col-md-6">
                <?= $form->field($model, 'address2')->textInput(['maxlength' => true]) ?>
            </div>            
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->all(), 'id', 'name'), ['prompt' => 'Please select City'])->label('City') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'state_id')->dropDownList(ArrayHelper::map(State::find()->all(), 'id', 'name'), ['prompt' => 'Please select a State'])->label('State') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'country')->dropDownList(ArrayHelper::map(Country::find()->all(), 'code', 'name'), ['prompt' => 'Please select a Country']) ?>                
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'pincode')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'pan')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'aadhar')->textInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'usertype_id')->dropDownList(ArrayHelper::map(Usertype::find()->all(), 'id', 'name'), ['prompt' => 'Select User Role'])->label('User Type') ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
