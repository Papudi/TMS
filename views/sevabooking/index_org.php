<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SevabookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sevabookings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sevabooking-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sevabooking', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
             'time',
            'receiptDate',
            'devoteeName',
            'sevaeventsName',
             'amountpaid',

            //'staff_id',
            // 'amountbalance',
            'paymentmode_id',
            // 'cancelation',
            // 'refund',
            // 'transaction_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
