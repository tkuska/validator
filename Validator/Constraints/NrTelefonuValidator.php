<?php

namespace Tkuska\ValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class NrTelefonuValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {

        if (!$value) {
			return true;
		}
		if (!preg_match("/[0-9]{9,11}$/i", $value) &&
				!preg_match("/[0-9]{3}$/i", $value) &&
				!preg_match("/\([0-9]{2}\)[0-9]{7}$/i", $value) &&
				!preg_match("/\([0-9]{2}\)[0-9]{9}$/i", $value)) {
			$this->context->buildViolation($constraint->message)
					->setParameter('%string%', $value)
					->addViolation();
		}
    }

}
