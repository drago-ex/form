## Drago Forms
Drago Forms is a lightweight and extendable form component built on top of the Nette Framework.
It provides basic form input building blocks and a flexible Latte template for rendering Bootstrap 5 styled forms.

## Technology
- PHP 8.3 or higher
- composer
- node.js

## Installation
```bash
composer require drago-ex/forms
```

## Usage
You can create form inputs quickly and flexibly using the `Forms` class. The main method is `addTextInput()`,
which returns a custom `Inputs` object allowing further chaining for attributes like `autocomplete` and `placeholder`.

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

## Predefined Inputs
```php
public function addPasswordField(): Inputs
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

Then you just call:
```php
$form->addPasswordField();
```
This keeps your form definitions clean, standardized, and easy to maintain.

## Latte Template
Use the provided Latte form template for rendering forms with Bootstrap 5 styling:
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

## JavaScript
Optionally, include the submitted button disabled script to prevent multiple submits on valid forms:
```js
import SubmitButtonDisable from 'path/to/SubmitButtonDisable.js';
```
