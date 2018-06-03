<?php

namespace PascalZeroEight\CommandHandlerResolver;

use PascalZeroEight\CommandHandlerInterface;
use PascalZeroEight\CommandInterface;

interface CommandHandlerResolverInterface
{

    public function resolveCommandHandler(CommandInterface $command): CommandHandlerInterface;

}