## Drago Form
Drago Form is a lightweight and extendable form component built on top of the Nette Framework.
It provides basic form input building blocks and a flexible Latte template for rendering Bootstrap 5 styled forms.

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://raw.githubusercontent.com/drago-ex/form/main/license)
[![PHP version](https://badge.fury.io/ph/drago-ex%2Fform.svg)](https://badge.fury.io/ph/drago-ex%2Fform)
[![Coding Style](https://github.com/drago-ex/form/actions/workflows/coding-style.yml/badge.svg)](https://github.com/drago-ex/form/actions/workflows/coding-style.yml)

## Requirements
- PHP >= 8.3
- Nette Framework
- Composer
- Bootstrap
- Naja
- Node.js

## Installation
```bash
composer require drago-ex/form
```

## Features

- Fluent setters for common HTML attributes (`autocomplete`, `placeholder`) via `FluentAttributes`.
- Custom input controls: `Input` (text/email/password), `Select`, `MultiSelect`.
- Enum-based HTML `autocomplete` values for type safety (`Autocomplete`).
- Extended `Forms` class with helper methods:
    - `addTextInput()`
    - `addEmailInput()`
    - `addPasswordInput()`
    - `addSelectBox()`
    - `addMultiSelectBox()`
- Type-safe helper for select controls using `ItemsControl` interface.

## Usage
```php
use Drago\Form\Forms;
use Drago\Form\Autocomplete;

$form = new Forms;

$form->addTextInput('username', 'Username')
     ->setAutocomplete(Autocomplete::Username)
     ->setPlaceholder('Enter your username');

$form->addSelectBox('country', 'Country', [
    'cz' => 'Czech Republic',
    'sk' => 'Slovakia'
]);
```

## Latte Template
Use the provided Latte form template for a rendering form with Bootstrap 5 styling:
```latte
{embed 'path/to/@form.latte', name: 'register', class: 'ajax mt-3'}
    {block form}
        {include input, name: 'username', columns: 6}
        {include input, name: 'email', columns: 6}
        <div class="d-block">
            {include submit, name: 'send'}
        </div>
    {/block}
{/embed}
```

## JavaScript buttons disabled
Optionally, include the submitted button disabled script to prevent multiple submits on valid form:
```js
import SubmitButtonDisable from 'path/to/naja.button"';
```

## Password hide/show
```latte
{embed 'path/to/@form.latte', name: 'add', class: 'ajax mt-3'}
    {import 'path/to/@form-password.latte'}
    {block form}
        {include password-toggle, name: 'password', columns: 12}
    {/block}
{/embed}
```

Copy the Latte templates from assets to your project.

## JavaScript show/hide password
```js
import PasswordToggle from 'path/to/naja.password"';
import 'path/to/password.scss';
```

## Notes
- Fully compatible with Nette Forms API – all original methods remain functional.
- Fluent methods are optional; you can still use standard Nette Form controls.
- Designed for type safety and clean, readable code.
