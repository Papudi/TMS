<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Sevaevents;

/* @var $this yii\web\View */
/* @var $model app\models\Sevabooking */

$this->title = 'Seva Booking Receipt';
?>
<div class="sevabooking-view">


<!--    <div class="container" style="border: lightgray thin solid; max-width: 800px;" > -->
<div class="panel panel-default center-block" style="max-width: 800px;">
        <div class="panel-heading">
            <h1 class="text-center"><?= $model->sevaevents->sevaname . " Receipt" ?></h1>
            <h3 class="text-center"><?= "Seva Date: " . date("d-M-Y", strtotime($model->seva_date)) ?></h3>
        </div>
        <div class="panel-body">
            <h4 class="col-md-6">Receipt : <?= $model->id ?></h4>
            <h5 class="col-md-6 text-right right">Receipt Date : <?= date("d-M-Y", strtotime($model->time)) ?></h5>

            <div class="col-md-8 col-md-offset-1">
                <h3><small>Received from Smt/Sri.</small> <u><?= $model->devotee->fullName ?></u></h3>
                <p><strong>Remarks :</strong> <?= $model->remarks ?></p>
            </div>
            <div class="col-md-2 col-md-offset-1"><h3>&#8377; <?= $model->amountpaid ?></h3></div>

        </div>
    <div class="panel-footer">Devastanam Trust <span class="pull-right">received by  <?= $model->staff->fullName ?></span></div>
    </div>
    <!--
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'time',
            'sevaevents_id',
            'seva_date',
            'devotee_id',
            'staff_id',
            'amountpaid',
            'amountbalance',
            'paymentmode_id',
            'cancelation',
            'refund',
            'transaction_id',
        ],
    ])
    ?>
    -->
</div>
