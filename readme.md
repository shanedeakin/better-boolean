# Better Boolean
A drop in replacement for the default Laravel Nova Boolean field

## Installation

```
composer require spunkylm/better-boolean
```

## Usage
The Toggle has all the same options as the Boolean field so you can set the values to be stored in the Model.

```php
BetterBoolean::make('Status')
    ->trueValue(true, 'Good', '#21b978')
    ->falseValue(false, 'Neutral', '#bdbdbd')
    ->showLabelOnIndex(),
```