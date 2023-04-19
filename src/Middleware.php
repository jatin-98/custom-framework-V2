<?php

namespace Src;

abstract class Middleware
{
    abstract public function execute(): bool;
}
