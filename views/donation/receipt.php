<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Donation;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Donation */

$this->registerJs(
    '$("document").ready(function(){ 
            $("#printr").click(function () {
                alert("print");
                $("#receipt").print();
            });
        });'
);
?>

<div class="donation-view" id="receipt">

    <div class="panel panel-default center-block" style="max-width: 760px;">
        <div class="panel-heading">
            <h2><?= Html::img('@web/images/logo.png', ['alt' => \Yii::$app->params['organisation.name'], 'class' => 'receiptLogo']) . \Yii::$app->params['organisation.name'] ?></h2>
        </div>
        <div class="panel-body">
            <h5 class="col-md-6">Receipt : <?= $model->id ?></h5>
            <h5 class="col-md-6 text-right right">Receipt Date : <?= date("d-M-Y", strtotime($model->date)) ?></h5>

            <div class="col-md-9">
                <h4><small>Received in the name of Smt/Sri. </small> <?= $model->nameof ?></h4>
                <h4><small>for the occasion of </small> <?= $model->occasion ?> 
                    <small>on</small> <?php echo ($model->fordate) ? date("d-M-Y", strtotime($model->fordate)) : $model->hinduDate; ?></u> </h4>
                <h4><small>Towards</small> <?= $model->donationtypeName ?></h4>
                <h5><small>Received From Smt/Sri. </small> <?= $model->donorName ?></h5>
            </div>
            <div class="col-md-3 "><h3>&#8377; <?= $model->amount ?></h3></div>
        </div>
        <div class="panel-footer"><?= \Yii::$app->params['organisation.trustname'] . ' ' . \Yii::$app->params['organisation.address'] ?><span class="pull-right">received by  <?= $model->userName ?></span></div>
    </div>
    <div><button id="printr">Print Receipt</button></div>

</div>