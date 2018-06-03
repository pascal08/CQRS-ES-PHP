<?php

namespace PascalZeroEight;

interface CommandDispatcherInterface
{

    public function dispatch(CommandInterface $command);

}