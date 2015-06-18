<?php

namespace Tkuska\ValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class NrDowoduValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
        if ($value == '') {
            return true;
        }
        if (strlen($value) != 9) {
            $this->context->buildViolation($constraint->message)
                    ->setParameter('%string%', $value)
                    ->addViolation();
        }
        $suma = 0;
        $wagi = array(7, 3, 1, 9, 7, 3, 1, 7, 3);
        $mapa = array(
            'A' => 10,
            'B' => 11,
            'C' => 12,
            'D' => 13,
            'E' => 14,
            'F' => 15,
            'G' => 16,
            'H' => 17,
            'I' => 18,
            'J' => 19,
            'K' => 20,
            'L' => 21,
            'M' => 22,
            'N' => 23,
            'O' => 24,
            'P' => 25,
            'Q' => 26,
            'R' => 27,
            'S' => 28,
            'T' => 29,
            'U' => 30,
            'V' => 31,
            'W' => 32,
            'X' => 33,
            'Y' => 34,
            'Z' => 35
        );
        for ($i = 0; $i < 9; $i++) {
            if (in_array($value[$i], array_keys($mapa))) {
                $suma += $mapa[$value[$i]] * $wagi[$i];
            } else {
                $suma += $value[$i] * $wagi[$i];
            }
        }
        if ($suma % 10) {
            $this->context->buildViolation($constraint->message)
                    ->setParameter('%string%', $value)
                    ->addViolation();
        }
    }

}
