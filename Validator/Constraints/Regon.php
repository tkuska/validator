<?php

namespace Tkuska\ValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Description of Regon
 *
 * @author Tomasz Kuśka
 * @Annotation
 */
class Regon extends Constraint
{
    public $message = '"%string%" nie jest poprawnym numerem REGON.';
}
