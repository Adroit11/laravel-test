<?php

use Adroit11\LaravelTests\TestHelpers;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

// Checks that controllers do not use models directly
it('checks that controllers do not use models directly', function () : void {
    $files = File::allFiles(app_path('Http/Controllers'));

    foreach ($files as $file) {
        $className = TestHelpers::getClassNameFromFile($file->getPathname());

        if (!class_exists($className)) {
            continue;
        }

        $reflectionClass = new ReflectionClass($className);

        if ($reflectionClass->isSubclassOf(Controller::class)) {
            TestHelpers::assertControllerDoesNotUseModelsDirectly($reflectionClass);
        }
    }

    expect(true)->toBeTrue();
});


// Checks that controllers do not have more than 400 lines of code
it('test_controllers_have_no_more_than_400_lines_of_code', function (): void {
    $controllers = File::allFiles(app_path('Http/Controllers'));

    foreach ($controllers as $controllerFile) {
        $controllerClassName = TestHelpers::getClassNameFromFile($controllerFile->getPathname());

        if (!class_exists($controllerClassName)) {
            continue;
        }

        $reflection = new ReflectionClass($controllerClassName);

        // Ensure the class is a controller
        if ($reflection->isSubclassOf(Controller::class)) {
            TestHelpers::assertControllerHasNoMoreThan400Lines($reflection);
        }
    }

    expect(true)->toBeTrue();
});

it('test_controllers_methods_have_no_more_than_10_lines_of_code', function (): void {
    $controllers = File::allFiles(app_path('Http/Controllers'));

    foreach ($controllers as $controllerFile) {
        $controllerClassName = TestHelpers::getClassNameFromFile($controllerFile->getPathname());

        if (!class_exists($controllerClassName)) {
            continue;
        }

        $reflection = new ReflectionClass($controllerClassName);
        // Todo: Adroit, get the methods array in the controller
        TestHelpers::assertControllerMethodHasNoMoreThan10Lines($reflection, $controllerClassName);
    }

    expect(true)->toBeTrue();
});
