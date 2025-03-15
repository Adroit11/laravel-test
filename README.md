# Laravel Tests Package

A reusable testing package for Laravel applications, designed to streamline test setup and provide custom assertions and helpers for common testing scenarios.

---

## Features

- **Reusable Test Files**: Pre-built tests for common Laravel features.
- **Custom Helpers**: Utility functions to simplify test assertions.
- **Easy Integration**: Seamlessly integrates with Laravel’s testing suite (PHPUnit or Pest).
- **Publishable Assets**: Quickly add tests to your project with a single command.

---

## Requirements

- **PHP**: 8.1 or higher
- **Laravel**: 10.x or 11.x
- **Composer**: Required for installation
- **Testing Framework**: Works with PHPUnit (default) or Pest (optional)

---

## Installation

Follow these steps to add the package to your Laravel project:

1. **Install via Composer**:
   ```bash
   composer require adroit11/laravel-tests

This pulls the package from Packagist (assuming you’ll submit it there) into your project.


2. **Publish the Test Filesr**:
   ```bash
   php artisan vendor:publish --tag=tests

This copies the test files to your tests/Feature/ directory.

3. **Run the testr**:
   ```bash
   php artisan test

---

## License

MIT License

Copyright (c) 2025 Ogundiji Bolade Adio

Permission is hereby granted, free of charge, to any person obtaining a copy of the `adroit11/laravel-tests` package and its associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE, INCLUDING ITS INTEGRATION INTO LARAVEL APPLICATIONS FOR TESTING PURPOSES.

