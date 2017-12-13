<?php

namespace Veruscript\TechTest\Exception;

/**
 * Thrown whenever attempting to publish a manuscript but the
 * manuscript is in an invalid state.
 *
 * This is a logic exception meaning whenever it is thrown,
 * should lead to a direct fix in the code.
 */
class TransitionNotApplicable extends \DomainException
{
    /**
     * The transition that was attempted to be applied on the object.
     *
     * @var string
     */
    private $transition;

    /**
     * The status the object is currently in.
     *
     * @var string
     */
    private $statusA;

    /**
     * The status that was attempted to be set on the object as a result of the transition.
     *
     * @var string
     */
    private $statusB;

    public function __construct(string $transition, string $statusA, string $statusB, int $code = 0, \Exception $previous = null)
    {
        $this->transition = $transition;
        $this->statusA = $statusA;
        $this->statusB = $statusB;

        parent::__construct("Cannot apply '{$transition}' transition from '{$statusA}' to '{$statusB}'.", $code, $previous);
    }

    /**
     * @return string
     */
    public function getTransition(): string
    {
        return $this->transition;
    }

    /**
     * @return string
     */
    public function getStatusA(): string
    {
        return $this->statusA;
    }

    /**
     * @return string
     */
    public function getStatusB(): string
    {
        return $this->statusB;
    }
}
