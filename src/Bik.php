<?php

namespace Anper\RussianId;

final class Bik
{
    public function __invoke(string $bik): bool
    {
        return \preg_match('/^\d{9}$/', $bik);
    }
}
