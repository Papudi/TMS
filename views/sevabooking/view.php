<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sevabooking */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sevabookings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sevabooking-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'time',
            'receiptDate',
            'sevaeventsName',
            'seva_date',
            'devoteeName',
            'staffName',
            'amountpaid',
            'amountbalance',
            'paymentmode_id',
            'remarks',
            'cancelation',
            'refund',
            'transaction_id',
        ],
    ]) ?>

</div>
