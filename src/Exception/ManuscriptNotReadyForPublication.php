<?php

namespace App\Exception;

/**
 * Thrown whenever attempting to publish a manuscript but the
 * manuscript is in an invalid state.
 */
class ManuscriptNotReadyForPublication extends \UnexpectedValueException
{
}
