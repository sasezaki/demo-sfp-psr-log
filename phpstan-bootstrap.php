<?php

namespace NunoMaduro\Larastan {
use PHPStan\PhpDoc\StubFilesExtension;
use Symfony\Component\Finder\Finder;

final class LarastanStubFilesExtension implements StubFilesExtension
{
    /**
     * @inheritDoc
     */
    public function getFiles(): array
    {
        $files = [];

        $finder = Finder::create()
            ->files()
            ->name('*.stub')
            ->in(__DIR__.'/vendor/nunomaduro/larastan/stubs');

        foreach ($finder as $file) {
            if ($file->getFileName() === 'Logger.stub') {
                continue;
            }
            $files[] = $file->getPathname();
        }

        return $files;
    }
}
}


