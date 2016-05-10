<?php

namespace app\models;

use yii\validators\Validator;

class NameValidator extends Validator {

	public function validateAttribute($model, $attribute) {

		if ( ! preg_match('/.{1,40}$/', $model->$attribute)) {

		    $this->addError($model,$attribute, 'Nazwa firmy musi zawierać mniej niż 40 znaków.');
		        
		}

	}

} 