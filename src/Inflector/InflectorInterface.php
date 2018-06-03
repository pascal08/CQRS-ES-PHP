<?php

namespace PascalZeroEight\Inflector;

use PascalZeroEight\CommandInterface;

interface InflectorInterface
{

    public function getHandlerClassName(CommandInterface $command): string;

}