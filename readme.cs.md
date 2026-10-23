# Drago Form

[English](readme.md) | Čeština

Drago Form je malá a rozšiřitelná formulářová komponenta postavená na Nette Frameworku.
Poskytuje základní stavební prvky formulářových polí a flexibilní šablonu Latte pro vykreslení formulářů ve stylu Bootstrap 5.

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://github.com/drago-ex/form/blob/main/license)
[![PHP version](https://badge.fury.io/ph/drago-ex%2Fform.svg)](https://badge.fury.io/ph/drago-ex%2Fform)
[![Tests](https://github.com/drago-ex/form/actions/workflows/tests.yml/badge.svg)](https://github.com/drago-ex/form/actions/workflows/tests.yml)
[![Coding Style](https://github.com/drago-ex/form/actions/workflows/coding-style.yml/badge.svg)](https://github.com/drago-ex/form/actions/workflows/coding-style.yml)

## Požadavky

- PHP >= 8.3, < 9
- Nette Framework
- Composer
- Bootstrap
- Naja
- Node.js

## Instalace

```bash
composer require drago-ex/form
```

## Soubory projektu

Kopírování souborů obstarává automaticky [drago-ex/project-tools](https://github.com/drago-ex/project-tools),
který musí být v projektu nainstalovaný. Bez něj zkopírujte soubory ručně podle sekce `copy`
v `composer.json` tohoto balíčku. Pro přeskočení balíčku nastavte `"skip": true` v
`extra.drago-tools.packages.<package-name>` v kořenovém `composer.json`.

## Příklady

```php
$form = new Drago\Form\Forms();

$form->addTextInput('username', 'Username')
     ->setAutocomplete(Drago\Form\Autocomplete::Username)
     ->setPlaceholder('Enter your username');

$form->addIntegerInput('age', 'Age')
     ->setMin(0)
     ->setMax(120);
```

## ExtraForms

`ExtraForms` rozšiřuje `Forms` o často používaná předpřipravená pole:
- `addPasswordField()` - pole pro heslo s názvem `password`.
- `addPasswordConfirmationField()` - potvrzení hesla s názvem `verify`, ověřené proti `password`.
- `addEmailField()` - pole pro e-mail s názvem `email` s automatickým doplňováním a ověřením e-mailu.

## Funkce

- Výčet Autocomplete - standardní hodnoty pro HTML autocomplete.
- Trait FluentAttributes - fluent settery pro autocomplete, placeholder a pouze pro čtení.
- Třída Forms - rozšířený formulář Nette s pomocnými metodami:
- `addTextInput()`, `addEmailInput()`, `addPasswordInput()`, `addIntegerInput()`, `addSlugInput()`, `addTextAreaInput()`
- `addSlugInput()` - textové pole s pravidlem `Forms::SlugPattern` (malá písmena, čísla, jednotlivé pomlčky); konstanta se hodí i do masek rout.
- Vlastní pole: Input, IntegerInput, Textarea - všechna podporují fluent atributy.

`IntegerInput` se na serveru ověřuje jako celé číslo, stejně jako `addInteger()` v Nette: prázdná hodnota je `null`
a platná hodnota se převede na `int`. `setMin()` a `setMax()` přidají pravidla na serveru a vykreslí
atributy `min` a `max`.

`setReadOnly()` jen vykreslí HTML atribut `readonly`; prohlížeč hodnotu stejně odešle a uživatel ji může
změnit. Pro hodnoty, které se nesmí měnit, použijte `setOmitted()` a hodnotu držte na serveru, nebo
`setDisabled()`.

## Šablona Latte

Pro vykreslení formulářů ve stylu Bootstrap 5 použijte dodanou šablonu Latte. Šablony spoléhají na třídy Bootstrapu 5, takže Bootstrap musí být v projektu nainstalovaný:
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

## Nastavení JavaScriptu

Balíček se instaluje přes Composer, proto přidejte do `package.json` následující, aby byl v bundleru dostupný alias `drago-form`:
```json
{
  "type": "module",
  "dependencies": {
    "drago-form": "file:vendor/drago-ex/form"
  }
}
```
Potom spusťte `npm install`.

## Vypnutí tlačítek v JavaScriptu

Volitelně připojte skript pro vypnutí odeslání, který zabrání vícenásobnému odeslání platného AJAXového formuláře.
Tlačítka se po dokončení požadavku znovu zapnou, takže formulář s chybami ze serveru lze odeslat znovu:
```js
import SubmitButtonDisable from 'drago-form/submit-disable';

naja.registerExtension(new SubmitButtonDisable());
```

## Skrytí a zobrazení hesla

```latte
{embed 'path/to/@form.latte', name: 'add', class: 'ajax'}
     {import 'path/to/@form-password.latte'}
     {block form}
          {include password-toggle, name: 'password', columns: 12}
     {/block}
{/embed}
```

## Zobrazení a skrytí hesla v JavaScriptu

```js
import PasswordToggle from 'drago-form/password-toggle';
import 'drago-form/styles/password-toggle';

naja.registerExtension(new PasswordToggle());
```

## Tom Select v JavaScriptu

```js
import TomSelectHandler from 'drago-form/tom-select';
import 'drago-form/styles/tom-select';

naja.registerExtension(new TomSelectHandler());
```

```latte
{embed 'path/to/@form.latte', name: 'add', class: 'ajax'}
     {import 'path/to/@form-tom-select.latte'}
     {block form}
          {include selectTom, name: 'tom', columns: 12, class: 'select-tom'}
     {/block}
{/embed}
```

## Poznámky

- Plně kompatibilní s API Nette Forms - všechny původní metody fungují dál.
- Fluent metody jsou volitelné; standardní ovládací prvky Nette Forms můžete používat dál.
- Navrženo pro typovou bezpečnost a čistý, čitelný kód.
