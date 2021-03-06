# Yii2 Link Behavior

[![Latest Version](https://img.shields.io/github/tag/cornernote/yii2-link-behavior.svg?style=flat-square&label=release)](https://github.com/cornernote/yii2-link-behavior/tags)
[![Software License](https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/cornernote/yii2-link-behavior/master.svg?style=flat-square)](https://travis-ci.org/cornernote/yii2-link-behavior)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/cornernote/yii2-link-behavior.svg?style=flat-square)](https://scrutinizer-ci.com/g/cornernote/yii2-link-behavior/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/cornernote/yii2-link-behavior.svg?style=flat-square)](https://scrutinizer-ci.com/g/cornernote/yii2-link-behavior)
[![Total Downloads](https://img.shields.io/packagist/dt/cornernote/yii2-link-behavior.svg?style=flat-square)](https://packagist.org/packages/cornernote/yii2-link-behavior)

Link behavior for Yii2.


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ composer require cornernote/yii2-link-behavior "*"
```

or add

```
"cornernote/yii2-link-behavior": "*"
```

to the `require` section of your `composer.json` file.


## Usage

In your ActiveRecord class:

```php
public function behaviors() {
    return [
        \cornernote\linkbehavior\LinkBehavior::className(),
        // or
        [
            'class' => \cornernote\linkbehavior\LinkBehavior::className(),
        ],
    ];
}
```

