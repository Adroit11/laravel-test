<?php

namespace Adroit11\LaravelTests;

use ReflectionClass;

use ReflectionMethod;

class TestHelpers
{

    /**
     * GO54 tests helper functions
     * 
     * @author Ogundiji Bolade Adio <email: o.boladeadi@go54.com> <profile: https://github.com/adroit11>
     * 
     * @return mixed
     */

    // Extract the class name from a file
    public static function getClassNameFromFile(string $filePath): string
    {
        $contents = file_get_contents($filePath);
        $namespace = '';
        $class = '';

        // Extract namespace
        if (preg_match('/namespace\s+(.+?);/', $contents, $matches)) {
            $namespace = $matches[1];
        }

        // Extract class name
        if (preg_match('/class\s+(\w+)/', $contents, $matches)) {
            $class = $matches[1];
        }

        return $namespace ? "$namespace\\$class" : $class;
    }

    // Check that a controller does not use models directly.
    public static function assertControllerDoesNotUseModelsDirectly(ReflectionClass $reflection): void
    {
        $controllerCode = file_get_contents($reflection->getFileName());
        expect($controllerCode)->not->toMatch('/\bApp\\\Models\\\w+::/');
        expect(true)->toBeTrue();
    }

// Check that a controller does not have more than 100 lines of code.
    public static function assertControllerHasNoMoreThan400Lines(ReflectionClass $reflection): void
    {
        $controllerCode = file_get_contents($reflection->getFileName());
        $lines = explode("\n", $controllerCode);

        // Count non-empty, non-comment lines
        $lineCount = 0;
        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line) && !str_starts_with($line, '//') && !str_starts_with($line, '/*') && !str_starts_with($line, '*')) {
                $lineCount++;
            }
        }

        expect($lineCount)->toBeLessThanOrEqual(400);
        expect(true)->toBeTrue();
    }

    // Check the controller method does not have more than 10 lines of code
    public static function assertControllerMethodHasNoMoreThan10Lines(ReflectionClass $reflection, string $class): void
    {
        $methods = $reflection->getMethods(ReflectionMethod::IS_PUBLIC);
        foreach ($methods as $method) {

            if($method->isConstructor() || $method->isDestructor() || $method->class !== $class) {
                continue;
            }

            $startLine = $method->getStartLine();
            $endLine = $method->getEndLine();
            $lines = $endLine - $startLine + 1;
            expect($lines)->toBeLessThanOrEqual(10)
                ->and($method->getName())->toBeString()
                ->and($lines)->toBeGreaterThan(0);
        }
        expect(true)->toBeTrue();
    }
}