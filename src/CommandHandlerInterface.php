<?php

namespace PascalZeroEight;

interface CommandHandlerInterface
{

    /**
     * @param CommandInterface $command
     */
    public function handle(CommandInterface $command);

}