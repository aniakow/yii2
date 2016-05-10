<?php

namespace app\models;

use yii\validators\Validator;

class NameValidator extends Validator {

	public function validateAttribute($model, $attribute) {

		if ( ! preg_match('/.{3,40}$/', $model->$attribute)) {

		    $this->addError($model,$attribute, 'Nazwa firmy musi zawierać od 3 do 40 znaków.');
		        
		}

	}

} 