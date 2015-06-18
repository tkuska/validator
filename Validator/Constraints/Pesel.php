<?php

namespace Tkuska\ValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Description of Pesel
 *
 * @author Tomasz Kuśka
 * @Annotation
 */
class Pesel extends Constraint
{
    public $message = '"%string%" nie jest poprawnym numerem PESEL.';
}
