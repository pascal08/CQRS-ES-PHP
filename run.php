<?php

use DI\Container;
use Example\CommandHandlerResolver;
use Example\EventListener\SendUserEmailConfirmationListener;
use Example\Command\RegisterUserCommand;
use Example\Repository\InMemoryUserRepository;
use Example\Repository\UserRepository;
use PascalZeroEight\CommandDispatcher;
use PascalZeroEight\CommandHandlerResolver\CommandHandlerResolverInterface;
use PascalZeroEight\Inflector\ClassNameInflector;
use PascalZeroEight\Inflector\InflectorInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container();

$container->set(UserRepository::class, new InMemoryUserRepository);
$container->set(EventDispatcherInterface::class, $eventDispatcher = new EventDispatcher());
$container->set(InflectorInterface::class, new ClassNameInflector());
$container->set(CommandHandlerResolverInterface::class, new CommandHandlerResolver($container, $container->get(InflectorInterface::class)));

$eventDispatcher->addSubscriber(new SendUserEmailConfirmationListener);

$dispatcher = $container->make(CommandDispatcher::class);

$command = new RegisterUserCommand('pascal08', 'pascallubbers8@hotmail.com', 'test123');

$dispatcher->dispatch($command);
