<?php

namespace Tkuska\ValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PeselValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
		//jeżeli pusta wartość to nie oznacza, że jest błąd, pole może nie być wymagane
		if(!$value){
			return true;
		}
        if (!preg_match('/^[0-9]{11}$/', $value)) { //sprawdzamy czy ciąg ma 11 cyfr
            $this->context->buildViolation($constraint->message)
                    ->setParameter('%string%', $value)
                    ->addViolation();
					return;
        }
        $arrSteps = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3); // tablica z odpowiednimi wagami
        $intSum = 0;
        for ($i = 0; $i < 10; $i++) {
            $intSum += $arrSteps[$i] * $value[$i]; //mnożymy każdy ze znaków przez wagć i sumujemy wszystko
        } $int = 10 - $intSum % 10; //obliczamy sumć kontrolną
        $intControlNr = ($int == 10) ? 0 : $int;
        if ($intControlNr == $value[10]) { //sprawdzamy czy taka sama suma kontrolna jest w ciągu
            return true;
        }
        $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
    }

}
