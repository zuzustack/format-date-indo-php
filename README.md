# Docs

- <a href="#introduction"> Introduction </a>
- <a href="#how-to-install">How to install</a>
- <a href="#how-to-use">How to use</a>

## Introduction

Just simple date formater to Indonesia language

## How to install

You can download the package via github only for the current version, maybe later it will be able to be downloaded via composer

## How to use

- Use first time version v0.1.0-alpha

```php
    <?php
    require __DIR__ . "where you save the file";
    use Zuzustack\FormatDateIndoPhp\Format;
```

- Function formatCalendar()

```php
    Format::formatCalendar('dd/mm/yyyy');

    echo Format::formatCalendar("11/06/2005"); //Sabtu, 11 Juni 2005
```

- Function formatNow()

```php
    Format::formatNow();

    echo Format::formatNow(); // LocalDate
```
