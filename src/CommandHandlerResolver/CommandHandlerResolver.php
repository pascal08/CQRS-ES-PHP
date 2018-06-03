<?php

namespace PascalZeroEight\CommandHandlerResolver;

use PascalZeroEight\Inflector\InflectorInterface;

abstract class CommandHandlerResolver implements CommandHandlerResolverInterface
{

    /**
     * @var InflectorInterface
     */
    private $inflector;

    /**
     * @param InflectorInterface $inflector
     */
    public function __construct(
        InflectorInterface $inflector
    ) {
        $this->inflector = $inflector;
    }

    /**
     * @param $command
     * @return string
     */
    protected function getCommandHandlerClassName($command)
    {
        return $this->inflector->getHandlerClassName($command);
    }
}