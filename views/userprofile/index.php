<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Usertype;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserprofileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userprofiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userprofile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add User', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'firstname',
//            'lastname',
            'fullName',
            'email:email',
            'mobile',
            // 'phone',
            // 'password',
            // 'address1',
            // 'address2',
             //'city_id',
            'cityName',
            // 'state_id',
            'stateName',
            // 'pincode',
            // 'country',
            // 'pan',
            // 'aadhar',
            // 'dob',
            // 'gender',
            //'usertype_id',
            'usertypeName',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
