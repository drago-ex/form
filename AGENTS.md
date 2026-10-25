# Agent Guide

Use this file as package-specific guidance when working in this repository. Keep changes aligned with the existing public API, project conventions, and supported PHP range.

## Package Overview
- **Package**: `drago-ex/form`
- **Type**: library
- **Purpose**: Helper classes for Nette forms with extended inputs and shortcuts.
- **PHP**: >=8.3 <9
- **Runtime dependencies**: nette/application (^3.2), nette/forms (^3.2), latte/latte (^3.0)
- **License**: MIT

## Repository Layout
- `src/`: package source code.
- `tests/`: automated tests.
- `.github/`: CI workflows; keep their PHP versions and commands consistent with Composer and the package scripts.
- `composer.json`: package metadata, dependency constraints, autoloading, and available Composer scripts.

## Key Parts
- `Drago\Form\Forms` adds typed inputs (`Input`, `IntegerInput`, `Textarea`); `ExtraForms` adds preconfigured email and password fields.
- `Forms::SlugPattern` is the one slug rule of the ecosystem: `addSlugInput()` validates with it and the blog and static-page routers use it in their route masks; its message is translated in `src/Form/Translate/cs.neon`.
- `IntegerInput` mirrors Nette's `addInteger()`: server-side integer rule, nullable, value converted to int; `setMin()` and `setMax()` add server-side rules.
- `setReadOnly()` is only an HTML attribute; it does not protect the value.
- `src/assets/latte` form widgets are rendered in `tests/Form/TemplatesTest.phpt`; `src/assets/*.js` are Naja extensions.

## Dependencies

Composer constraints describe the package contract. Before changing integration behavior, inspect the source and the actual call sites in this package; do not infer runtime usage solely from dependency declarations.
Development dependencies include nette/tester (^2.5), tracy/tracy (^2.10), phpstan/phpstan-nette (^2.0).

## Essential Commands

```bash
composer tester                 # tester tests -s
composer phpstan                # phpstan analyse
```

## Conventions & Rules

- Preserve backward compatibility unless the task explicitly permits a breaking change. Check callers and public signatures before changing behavior.
- Follow the existing PHP style: strict types, explicit parameter and return types, tabs for indentation, and single-quoted strings where practical. Match nearby code when a convention is unclear.
- Keep package-specific configuration, resources, and migrations in their established directories. Do not edit generated or consuming-project files without confirming they are part of this repository’s intended output.
- Add or update focused tests for behavioral changes when this package has a runnable test setup. Do not invent test commands; use only the scripts and configuration present here.
- Update README examples and Composer metadata when a public API or supported requirement changes.
