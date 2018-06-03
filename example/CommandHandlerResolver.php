<?php

namespace Example;

use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use PascalZeroEight\CommandHandlerInterface;
use PascalZeroEight\CommandHandlerResolver\CommandHandlerResolver as BaseCommandHandlerResolver;
use PascalZeroEight\CommandInterface;
use PascalZeroEight\Inflector\InflectorInterface;

class CommandHandlerResolver extends BaseCommandHandlerResolver
{

    /**
     * @var Container
     */
    private $container;

    /**
     * @param Container $container
     * @param InflectorInterface $inflector
     */
    public function __construct(
        Container $container,
        InflectorInterface $inflector
    ) {
        $this->container = $container;

        parent::__construct($inflector);
    }

    /**
     * @param CommandInterface $command
     * @return CommandHandlerInterface
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function resolveCommandHandler(CommandInterface $command): CommandHandlerInterface
    {
        $handlerClass = $this->getCommandHandlerClassName($command);

        return $this->container->make($handlerClass);
    }


}