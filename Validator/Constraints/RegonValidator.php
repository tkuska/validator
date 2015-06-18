<?php

namespace Tkuska\ValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class RegonValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if ($value == '') {
            return true;
        }
        if (strlen($value) != 9) {
            $this->context->addViolation($constraint->message, array('%string%' => $value));

            return false;
        }
        $arrSteps = array(8, 9, 2, 3, 4, 5, 6, 7);
        $intSum = 0;
        for ($i = 0; $i < 8; $i++) {
            $intSum += $arrSteps[$i] * $value[$i];
        } $int = $intSum % 11;
        $intControlNr = ($int == 10) ? 0 : $int;
        if ($intControlNr == $value[8]) {
            return true;
        }
        $this->context->addViolation($constraint->message, array('%string%' => $value));

        return false;
    }

}
