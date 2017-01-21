<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SevabookingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seva Bookings Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sevabooking-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>


    </p>
    <?php Pjax::begin(); ?>

    <?= Html::beginForm(['sevabooking/report'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
    Between Dates
    <?=
    DatePicker::widget([
        'name' => 'from_date',
//    'value'  => $value,
        //'language' => 'ru',
//        'placeholder' => 'From Date',
        'dateFormat' => 'yyyy-MM-dd',
    ]);
    ?>
    <?=
    DatePicker::widget([
        'name' => 'to_date',
        'dateFormat' => 'yyyy-MM-dd',
    ]);

    Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control'])
    ?>

    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'Submit']) ?>
<?= Html::endForm() ?>    


    <?=
    GridView::widget([
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
    ]);
    ?>
<?php Pjax::end(); ?>

</div>
