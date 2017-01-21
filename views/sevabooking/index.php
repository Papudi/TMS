<?php

use yii\helpers\Html;
use yii\helpers\Url;
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

    <p></p>
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
//            'id',
//            'time',             
//            'receiptDate',
            [
                'attribute' => 'Date',
                'value' => 'receiptDate',
                'contentOptions' => ['style' => 'width: 10em;']
            ],
            'devoteeName',
            'sevaeventsName',
                [
                'attribute' => 'Amount',
                'value' => 'amountpaid',
                'contentOptions' => ['style' => 'width: 10em;']
            ],
//            'amountpaid',
            //'staff_id',
            // 'amountbalance',
//            'paymentmode_id',
            // 'cancelation',
            // 'refund',
            // 'transaction_id',
            [
//                'class' => 'yii\grid\ActionColumn'


                'class' => 'yii\grid\ActionColumn',
                'template' => '{receipt} {view} {update} {delete} ',
                'contentOptions' => ['style' => 'width: 8em;'],
                'buttons' => [
                    'receipt' => function ($url) {
                        return Html::a(
                                        '<span class="glyphicon glyphicon-list-alt"></span>', $url, [
                                    'title' => 'Receipt',
                                    'data-pjax' => '0',
//                                    'target' => '_blank',
                                        ]
                        );
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'receipt') {
                        return Url::toRoute(['receipt', 'id' => $model->id]);
                    } else {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                }
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>
