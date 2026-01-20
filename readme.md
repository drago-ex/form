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
- Autocomplete enum – standard values for HTML autocomplete.
- FluentAttributes trait – fluent setters for autocomplete and placeholder.
- Forms class – extended Nette Form with helper methods:
- `addTextInput()`, `addEmailInput()`, `addPasswordInput()`, `addIntegerInput()`, `addTextAreaForm()`
- Custom inputs: Input, IntegerInput (min/max), Textarea – all support fluent attributes.

## Usage
```php
$form = new Drago\Form\Forms();

$form->addTextInput('username', 'Username')
     ->setAutocomplete(Drago\Form\Autocomplete::Username)
     ->setPlaceholder('Enter your username');

$form->addIntegerInput('age', 'Age')
     ->setMin(0)
     ->setMax(120);
```

## Latte Template
Use the provided Latte form template for a rendering form with Bootstrap 5 styling:
```latte
{embed 'path/to/@form.latte', name: 'register', class: 'ajax'}
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
import SubmitButtonDisable from 'path/to/naja.button';
```

## Password hide/show
```latte
{embed 'path/to/@form.latte', name: 'add', class: 'ajax'}
     {import 'path/to/@form-password.latte'}
     {block form}
          {include password-toggle, name: 'password', columns: 12}
     {/block}
{/embed}
```

Copy the Latte templates from assets to your project.

## JavaScript show/hide password
```js
import PasswordToggle from 'path/to/naja.password';
import 'path/to/password.scss';
```

## JavaScript Tom select
```js
import TomSelectExtension from 'path/to/naja.button';
```

```latte
{embed 'path/to/@form.latte', name: 'add', class: 'ajax'}
     {import 'path/to/@form-tom-select.latte'}
     {block form}
          {include selectTom, name: 'tom', columns: 12, class: 'select-tom'}
     {/block}
{/embed}
```

## Notes
- Fully compatible with Nette Forms API – all original methods remain functional.
- Fluent methods are optional; you can still use standard Nette Form controls.
- Designed for type safety and clean, readable code.
