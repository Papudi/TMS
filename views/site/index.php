<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Donationtype;
use app\models\DonationtypeSearch;
use app\models\Donation;
use app\models\DonationSearch;
use yii\helpers\Url;

/* @var $this yii\web\View */



$this->title = 'TMS - ' . \Yii::$app->params['organisation.name'];

$dataProvider = new ActiveDataProvider([
    'query' => Donationtype::find(),
    'pagination' => [
        'pageSize' => 10,
    ],
        ]);

$dataProvider2 = new ActiveDataProvider([
    'query' => Donation::find()->where('(donationtype_id in ("7","8","9","10","11") AND fordate <= CURRENT_DATE - INTERVAL 355 DAY AND fordate >= CURRENT_DATE - INTERVAL 365 DAY) OR (donationtype_id in ("1","2","3","4","5","6") AND fordate >= CURRENT_DATE AND fordate <= CURRENT_DATE + INTERVAL 5 DAY)'),
    'sort' => ['defaultOrder' => ['fordate' => SORT_ASC]],
    'pagination' => [
        'pageSize' => 10,
    ],
        ]);


//$model = new Seva();
//$searchModel = new SevaSearch();
?>
<div class="site-index">

    <div class="body-content">
        <?php if (Yii::$app->user->isGuest) { ?>
            <?= Html::img('@web/images/logo.png', ['alt' => \Yii::$app->params['organisation.name'], 'class' => 'center-block', 'width' => '250']) ?>
            <div align="center"></div>
            <h3 align="center"><?= \Yii::$app->params['organisation.name']; ?></h3>
            <h5 align="center"><?= 'a unit of <br>' . \Yii::$app->params['organisation.trustname'] . '<br>' . \Yii::$app->params['organisation.website']; ?></h5>

        <?php } ?>
        <?php if (!Yii::$app->user->isGuest) { ?>
            <div class="row">

                <div class="col-lg-7">
                    <h3>Donation Registration</h3>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider2,

                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id',
                            'nameof',
                            'occasion',
                            [
            'value' => function ($data) {
                        if($data->donationtypeRepeats==1) 
                            { return date("d M", strtotime($data->fordate));} else { return date("d M Y", strtotime($data->fordate));}
            },
                            ],
//                            'fordate:date',
                                [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{receipt}',
                                'contentOptions' => ['style' => 'width: 1em;'],
                                'buttons' => [
                                    'receipt' => function ($url) {
                                        return Html::a(
                                                        '<span class="glyphicon glyphicon-list-alt"></span>', $url, ['title' => 'Receipt', 'data-pjax' => '0',
                                                        ]
                                        );
                                    },
                                ],
                                'urlCreator' => function ($action, $model, $key, $index) {
                                    if ($action === 'receipt') {
                                        return Url::toRoute(['donation/receipt', 'id' => $model->id]);
                                    } else {
                                        return Url::toRoute([$action, 'id' => $model->id]);
                                    }
                                }
                            ],
                        ],
                    ]);
                    ?>
                    <!--                    <div id="chart_div" style="height:300px;"></div> -->
                    <br/>
                    <div class="col-lg-6"><div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Make a Donation</h3>
                            </div>
                            <div class="panel-body">
                                Register a donation received, directly at the temple, or through collectors.<br/>
                                <a href="?r=donation/create" class="btn btn-primary pull-right">Donate</a>
                            </div>
                        </div></div>
                    <div class="col-lg-6"><div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Search a Donor</h3>
                            </div>
                            <div class="panel-body">
                                Find a registered donor, using any of the following information.<br/>
                                <a href="?r=userprofile" class="btn btn-primary pull-right">Find Donor</a>
                            </div>
                        </div></div>
                </div>
                <div class="col-lg-5">
                    <h3>Donations Accepted </h3>
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
                        'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
//            'id',
                            'name',
//            'description:ntext',
                            'amount',
//                            'maxlimit',
                        // 'seats',
                        // 'calendar',
                        // 'is_active',
//            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>

                </div>         

            </div>

        <?php } ?>
    </div>

</div>
