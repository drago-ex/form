## Drago Form
Drago Form is a lightweight and extendable form component built on top of the Nette Framework.
It provides basic form input building blocks and a flexible Latte template for rendering Bootstrap 5 styled forms.

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://raw.githubusercontent.com/drago-ex/forms/master/license.md)
[![PHP version](https://badge.fury.io/ph/drago-ex%2Fforms.svg)](https://badge.fury.io/ph/drago-ex%2Fforms)
[![Coding Style](https://github.com/drago-ex/forms/actions/workflows/coding-style.yml/badge.svg)](https://github.com/drago-ex/forms/actions/workflows/coding-style.yml)

## Requirements
- PHP 8.3 or higher
- Nette Framework
- Composer
- Node.js

## Installation
```bash
composer require drago-ex/form
```

## Usage
You can create form inputs quickly and flexibly using the `Form` class. The main method is `addTextInput()`,
which returns a custom `Input` object allowing further chaining for attributes like `autocomplete` and `placeholder`.

## Example
```php
$form->addTextInput(
    name: 'age',
    label: 'Age',
    type: 'number',
    required: true,
)
->setAutocomplete('off')
->setPlaceholder('Enter your age');
```

## Predefined Input
```php
public function addPasswordField(): Input
{
    return $this->addTextInput(
        name: 'password',
        label: 'Password',
        type: 'password',
        placeholder: 'Your password',
        required: 'Please enter your password.',
    );
}
```

Then you call:
```php
$form->addPasswordField();
```
This keeps your form definitions clean, standardized, and easy to maintain.

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

## JavaScript show/hide password
```js
import PasswordToggle from 'path/to/naja.password"';
import 'path/to/password.scss';
```

Copy the Latte templates from assets to your project.
