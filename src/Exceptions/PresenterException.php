<?php

namespace Kayrunm\Anchorman\Exceptions;

class PresenterException extends Exception
{
    /**
     * Set the exception's message.
     *
     * @var string
     */
    protected $message = 'Model\'s $presenter property not set.';
}