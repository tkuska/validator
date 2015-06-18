<?php

namespace Tkuska\ValidationBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Description of Nip
 *
 * @author Tomasz Kuśka
 * @Annotation
 */
class NrDowodu extends Constraint
{
    public $message = '"%string%" nie jest poprawnym numerem dowodu osobistego.';
}
