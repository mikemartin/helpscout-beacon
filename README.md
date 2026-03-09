# HelpScout Beacon

> Make it easy for clients to get help and access their support history.

## Installation

```bash
composer require mikemartin/helpscout-beacon
```

## Configuration

Add the following to your `.env` file:

```
HELPSCOUT_BEACON_ID=
HELPSCOUT_BEACON_SECRET_KEY=
```

The Beacon ID can be found in your HelpScout Beacon Settings under the Installation tab. The secret key is found under the Contact tab after enabling "Support history security".

## Public Beacon

To show the beacon to authenticated frontend users, add the following env variables:

```
HELPSCOUT_PUBLIC_BEACON_ID=
HELPSCOUT_PUBLIC_BEACON_SECRET_KEY=
```

Then place the tag before the closing `</body>` tag in your template:

```antlers
{{ beacon:js }}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
