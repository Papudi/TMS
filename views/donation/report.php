<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DonationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Donations Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?> 
    <div>
        <?php Pjax::begin();
        echo Html::beginForm(['donation/report'], 'post', ['data-pjax' => '', 'class' => 'form-inline']);
        ?>
        Receipts Between Dates
        <?php
        echo DatePicker::widget(['name' => 'from_date', 'dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]);
        echo DatePicker::widget(['name' => 'to_date', 'dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]);
        Html::input('text', 'string', Yii::$app->request->post('string'), ['class' => 'form-control']);
        echo Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'Submit']);
        Html::endForm();
        ?>   
    </div>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{summary}{pager}{items}{pager}',
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'date',
            ['attribute' => 'id', 'options' => ['style' => 'width:5em;'],],
                ['label' => 'Date', 'attribute' => 'date', 'options' => ['style' => 'width:7em;'],],
            'donorName',
            'nameof',
            'occasion',
            'fordate',
            // 'dob',
            // 'marriage',
            // 'mobile',
            // 'calendar',
            // 'paksha',
            // 'masa',
            // 'thiti',
            'donationtypeName',
            'amount',
            // 'paymentmode_id',
            // 'user_id',
            // 'status',
            // 'time',
            [
//                'class' => 'yii\grid\ActionColumn'

                'class' => 'yii\grid\ActionColumn',
                'template' => '{receipt} {view} {update} {delete} ',
                'contentOptions' => ['style' => 'width: 8em;'],
                'buttons' => [
                    'receipt' => function ($url) {
                        return Html::a(
                                        '<span class="glyphicon glyphicon-list-alt"></span>', $url, ['title' => 'Receipt', 'data-pjax' => '0',
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

</div>
