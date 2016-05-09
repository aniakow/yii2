<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CompanySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'add_date') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'nip') ?>

    <?php // echo $form->field($model, 'address_street') ?>

    <?php // echo $form->field($model, 'address_city') ?>

    <?php // echo $form->field($model, 'address_zip') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
