<?php
namespace P4\LouvreBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class ClosedTuesdayValidator
 * @package P4\LouvreBundle\Validator
 */
class ClosedTuesdayValidator extends ConstraintValidator
{

    const TUESDAY = 2;

    /**
     * @param mixed $visitDate
     * @param Constraint $constraint
     */
    public function validate($visitDate, Constraint $constraint)
    {
        if($visitDate->format('N') == self::TUESDAY)
        {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}