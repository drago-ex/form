# Drago Form

Nette forms with typed inputs and fluent attributes (autocomplete, placeholder, read-only), ready-made
email and password fields, and Latte templates for Bootstrap 5 forms with a password toggle and Tom Select.

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/drago-ex/form/blob/main/license)
[![PHP version](https://badge.fury.io/ph/drago-ex%2Fform.svg)](https://badge.fury.io/ph/drago-ex%2Fform)
[![Tests](https://github.com/drago-ex/form/actions/workflows/tests.yml/badge.svg)](https://github.com/drago-ex/form/actions/workflows/tests.yml)
[![Coding Style](https://github.com/drago-ex/form/actions/workflows/coding-style.yml/badge.svg)](https://github.com/drago-ex/form/actions/workflows/coding-style.yml)

## Requirements

- PHP >= 8.3, < 9
- Nette Framework
- Composer
- Bootstrap
- Naja
- Node.js

## Installation

```bash
composer require drago-ex/form
```

[Project Tools](https://github.com/drago-ex/project-tools) copies the Latte widgets `@form`, `@form-password` and
`@form-tom-select` into `app/Presentation/Accessory/Widget`, where you adapt them.

## Forms

```php
$form = new Drago\Form\Forms();

$form->addTextInput('username', 'Username')
     ->setAutocomplete(Drago\Form\Autocomplete::Username)
     ->setPlaceholder('Enter your username');

$form->addIntegerInput('age', 'Age')
     ->setMin(0)
     ->setMax(120);
```

## Inputs

`Drago\Form\Forms` adds `addTextInput()`, `addEmailInput()`, `addPasswordInput()`, `addIntegerInput()`,
`addSlugInput()` and `addTextAreaInput()`; their inputs have the fluent setters `setAutocomplete()` (values of the
`Autocomplete` enum), `setPlaceholder()` and `setReadOnly()`. Standard Nette controls keep working.

`addSlugInput()` is a text input with the `Forms::SlugPattern` rule (lowercase letters, numbers, single hyphens) and at most 255 characters, the length of the slug columns; the constant also fits route masks.

`IntegerInput` is validated as an integer on the server, like Nette's `addInteger()`: an empty value is `null`
and a valid value is converted to `int`. `setMin()` and `setMax()` add server-side rules and render the
`min` and `max` attributes.

`setReadOnly()` only renders the HTML `readonly` attribute; the browser still submits the value and a user can
change it. For values that must not be changed, use `setOmitted()` and keep the value on the server, or
`setDisabled()`.

## ExtraForms

`ExtraForms` extends `Forms` with commonly used preconfigured fields:
- `addPasswordField()` - password input named `password`.
- `addPasswordConfirmationField()` - password confirmation named `verify`, validated against `password`.
- `addEmailField()` - email input named `email` with autocomplete and email validation.

## Latte Template

`@form.latte` renders a form with Bootstrap 5 classes:
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

A checkbox is rendered as a Bootstrap check, or with `switch: true` as a switch:
```latte
{include checkbox, name: 'newsletter', switch: true}
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

## Tom Select

```latte
{embed 'path/to/@form.latte', name: 'add', class: 'ajax'}
     {import 'path/to/@form-tom-select.latte'}
     {block form}
          {include selectTom, name: 'tom', columns: 12, class: 'select-tom'}
     {/block}
{/embed}
```

## Assets

Add the Composer package as a local npm dependency in `package.json` (Drago Project installs it by itself), so the bundler knows `drago-form`:
```json
{
  "type": "module",
  "dependencies": {
    "drago-form": "file:vendor/drago-ex/form"
  }
}
```
Then run `npm install`.

### Submit button disable

The submit disable script to prevent multiple submits of a valid AJAX form.
Buttons are enabled again when the request completes, so a form with server-side errors can be sent again:
```js
import SubmitButtonDisable from 'drago-form/submit-disable';

naja.registerExtension(new SubmitButtonDisable());
```

### Password hide/show

```js
import PasswordToggle from 'drago-form/password-toggle';

naja.registerExtension(new PasswordToggle());
```

```scss
@import 'drago-form/styles/password-toggle';
```

### Tom Select

```js
import TomSelectHandler from 'drago-form/tom-select';

naja.registerExtension(new TomSelectHandler());
```

```scss
@import 'drago-form/styles/tom-select';
```

