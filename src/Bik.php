<?php

namespace Anper\RussianId;

final class Bik
{
    public function __invoke($bik): bool
    {
        return \is_numeric($bik) && \preg_match('/^\d{9}$/', $bik);
    }
}
