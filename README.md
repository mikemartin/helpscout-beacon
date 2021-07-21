![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=flat-square&link=https://statamic.com)

# HelpScout Beacon for Statamic

> Make it easy for clients to get help and access their support history.

The HelpScout Beacon for Statamic makes it easy for you to provide support to your Statamic clients. Your clients can send messages, view help docs and access their support history securely from their Statamic control panel.

You can additionally have a public-facing Beacon for your authenticated visitors.
This beacon is visible whenever a user is authenticated and on your site.

## Installation

1. Require the package using Composer.
 ```
 composer require mikemartin/helpscout-beacon
 ```

### Control Panel Beacon
1. Add your **Beacon ID** to your `.env` file. In your HelpScout Beacon Settings, head to the Installation tab and copy the Beacon ID from the web installation code.

    ```
    HELPSCOUT_BEACON_ID=your_beacon_id
    ```

2. Add your **Beacon Secret Key** to your `.env` file. In your HelpScout Beacon Settings, head to the Contact tab and enable the “Support history security” toggle. Your secret key will be revealed. Make sure to Save at the bottom of the page.

    ```
    HELPSCOUNT_BEACON_SECRET=your_beacon_secret_key
    ```


### Public Beacon
1. Set the environment variables `HELPSCOUT_PUBLIC_BEACON_ID` and `HELPSCOUT_PUBLIC_BEACON_SECRET_KEY` accordingly.
2. Use the tag `{{ beacon:js }}` to instantiate the Beacon on your site. Keep in mind that the document body will need be to be accessible for it to load, hence the tag should be placed near the end of the body.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
