<?php

namespace Anper\RussianId;

final class Bik
{
    /**
     * @param mixed $bik
     *
     * @return bool
     */
    public function __invoke($bik): bool
    {
        return \is_numeric($bik) && \preg_match('/^\d{9}$/', (string) $bik);
    }
}
