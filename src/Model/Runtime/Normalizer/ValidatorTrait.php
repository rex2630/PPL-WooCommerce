<?php
// phpcs:ignoreFile WordPress.Security.EscapeOutput.ExceptionNotEscaped


namespace PPLCZ\Model\Runtime\Normalizer;



use PPLCZVendor\Symfony\Component\Validator\Constraint;
trait ValidatorTrait
{
    protected function validate(array $data, Constraint $constraint) : void
    {
        $validator = \PPLCZVendor\Symfony\Component\Validator\Validation::createValidator();
        $violations = $validator->validate($data, $constraint);
        if ($violations->count() > 0) {
            throw new ValidationException($violations);
        }
    }
}