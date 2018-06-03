<?php

namespace PascalZeroEight;

use DI\Container;
use PascalZeroEight\CommandHandlerResolver\CommandHandlerResolverInterface;

class CommandDispatcher implements CommandDispatcherInterface
{

    /**
     * @var Container
     */
    protected $container;


    /**
     * @var CommandHandlerResolverInterface
     */
    private $commandHandlerResolver;

    /**
     * @param Container $container
     * @param CommandHandlerResolverInterface $commandHandlerResolver
     */
    public function __construct(
        Container $container,
        CommandHandlerResolverInterface $commandHandlerResolver
    ) {
        $this->container = $container;
        $this->commandHandlerResolver = $commandHandlerResolver;
    }

    /**
     * @param CommandInterface $command
     */
    public function dispatch(CommandInterface $command)
    {
        $handler = $this->commandHandlerResolver->resolveCommandHandler($command);

        $handler->handle($command);
    }
}