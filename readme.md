# Meta Manager

Meta Manager is an SEO tool that is used to improve the SEO of a website or specific page by adding recommended meta tags to your application.

[![GitHub license](https://img.shields.io/github/license/bowphp/meta-manager.svg)](https://github.com/bowphp/meta-manager/blob/master/LICENSE) [![GitHub issues](https://img.shields.io/github/issues/bowphp/meta-manager.svg)](https://github.com/bowphp/meta-manager/issues) [![CodeFactor](https://www.codefactor.io/repository/github/bowphp/meta-manager/badge)](https://www.codefactor.io/repository/github/bowphp/meta-manager) ![Twitter](https://img.shields.io/twitter/url/https/github.com/bowphp/meta-manager.svg?style=social)

## SEO Features

* Standard Meta Tags
* Facebook OpenGraph Meta Tags
* Twitter Card Meta Tags
* Dublin Core Meta Tags
* Link Tags

## Requirements

* PHP 8.1 and above
* Bowphp [5.x](https://github.com/bowphp/framework)
* Tintin [3.x](https://github.com/bowphp/tintin)

## Steps

* [Install](./#install)
* [Configuration](./#configuration)
* [Usage](./#usage)
* [Example](./#example)
* [Forkers](./#forkers)
* [Maintainers](./#maintainers)
* [License](./#license)

### Install

Run the following to include this package via Composer

```text
composer require bowphp/meta-manager
```

Once the download is complete, the next thing you have to do is include the service provider within `app/Kernel.php`.

```php
public function configurations(): array
{
    return [
        ...
        Bow\MetaManager\MetaManagerConfiguration::class,
    ];
}
```

### Configuration

Setup default application meta in `meta.php` config. \(Optional but recommended\)

#### Available options

| Option | Description |
| :--- | :--- |
| `robots` | Robots option tells search engines what to follow and what not to follow. |
| `revisit_after` | Here you may specify how search engines will re-visit and re-crawl your site. |
| `referrer` | Here you may specify how you want other sites to get referrer information from your site. |
| `type` | Here you may specify the structure type of your website or a specific page |
| `title` | Here you may provide the title of your website or a specific page to help search engines understand it better. |
| `description` | Here you may provide the description of your website or a specific page to help search engines understand it better. |
| `image` | Here you may provide the URL to the image you want search engines and crawlers to make use of when displaying your website or a specific page. |
| `author` | Here you may provide the author's name you want search engines to make use of when displaying your website or a specific page. |
| `geo_region` | Here you specify the region of your location. This is useful if you have a physical location that is important for your business. |
| `geo_position` | Here you specify the geo-coordinates of your physical location in longitude and latitude. |
| `twitter_site` | Here you may provide your Twitter @username of your account |
| `twitter_card` | Here you may specify the way you want crawlers to understand your Twitter share type. |
| `fb_app_id` | Here you may provide your Facebook app id |
| `keywords` | Here you may provide keywords relevant to your website and the specific page. |

### Usage

Once the configuration is complete you can then add the below at the meta area of the page you want to include meta tags;

```t
%meta()
```

The above will use the predefined configurations to prefill the generated meta tags. However, if you chose to define certain options on the fly then you can use the code below.

```t
%meta([
    'title'         => 'My Example Title',
    'description'   => 'This is my example description',
    'image'         => 'Url to the image',
]);
```

## Example

```t
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    %meta([
      'title'  => 'My Example Title',
      'description' => 'This is my example description',
      'image'=> '',
    ])
</head>
<body>
</body>
</html>
```

## Maintainers

* [Franck DAKIA](https://github.com/papac)
* [Thank's collaborators](https://github.com/bowphp/framework/graphs/contributors)

## Contact

[papac@bowphp.com](mailto:papac@bowphp.com) - [@papacdev](https://twitter.com/papacdev)

Please, if there is a bug on the project contact me by email or leave me a message on [Slack](https://bowphp.slack.com). or [join us on Slask](https://join.slack.com/t/bowphp/shared_invite/enQtNzMxOTQ0MTM2ODM5LTQ3MWQ3Mzc1NDFiNDYxMTAyNzBkNDJlMTgwNDJjM2QyMzA2YTk4NDYyN2NiMzM0YTZmNjU1YjBhNmJjZThiM2Q)

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request
