<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_date')->widget(

        DatePicker::className(), [
            'inline' => false,
            'clientOption' => [

                'autoclose' => true,
                'format' => 'yyyy-m-d'

            ]
        ]); ?>

    <?= $form->field($model, 'address_street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_zip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
