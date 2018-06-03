<?php

namespace Example\CommandHandler;

use Example\Command\RegisterUserCommand;
use Example\Entity\User;
use Example\Event\RegisterUserCompletedEvent;
use Example\Repository\UserRepository;
use PascalZeroEight\CommandHandlerInterface;
use PascalZeroEight\CommandInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class RegisterUserCommandHandler implements CommandHandlerInterface
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * RegisterUserCommandHandlerInterface constructor.
     * @param UserRepository $userRepository
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        UserRepository $userRepository,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->userRepository = $userRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param CommandInterface $command
     * @return User
     */
    public function handle(CommandInterface $command): User
    {
        if(!($command instanceof RegisterUserCommand)) {
            throw new \RunTimeException();
        }

        /** @var RegisterUserCommand $command */
        $user = $this->userRepository->create(
            $command->getUsername(),
            $command->getEmail(),
            $command->getPassword()
        );

        $this->userRepository->add($user);

        $this->eventDispatcher->dispatch(
            RegisterUserCompletedEvent::class,
            new RegisterUserCompletedEvent($user)
        );

        return $user;
    }


}