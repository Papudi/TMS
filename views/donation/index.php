<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DonationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Donations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Collect Donation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{summary}{pager}{items}{pager}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'date',
            ['attribute'=>'id','options'=>['style'=>'width:5em;'],],
            ['label'=>'Date','attribute'=>'date','options'=>['style'=>'width:7em;'],],
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

//            ['class' => 'yii\grid\ActionColumn'],
            
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
    ]); ?>

</div>
