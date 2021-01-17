![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=flat-square&link=https://statamic.com)

# HelpScout Beacon for Statamic

> Make it easy for clients to get help and access their support history.

The HelpScout Beacon for Statamic makes it easy for you to provide support to your Statamic clients. Your clients can send messages, view help docs and access their support history securely from their Statamic control panel.

## Installation

1. Require the package using Composer.

    ```
    composer require mikemartin/helpscout-beacon
    ```

2. Publish the config file.

    ```
    php artisan vendor:publish --provider=Mikemartin\HelpscoutBeacon\HelpscoutBeaconServiceProvider
    ```

3. Add your **Beacon ID** to your `.env` file. In your HelpScout Beacon Settings, head to the Installation tab and copy the Beacon ID from the web installation code.

    ```
    HELPSCOUT_BEACON_ID=your_beacon_id
    ```

4. Add your **Beacon Secret Key** to your `.env` file. In your HelpScout Beacon Settings, head to the Contact tab and enable the “Support history security” toggle. Your secret key will be revealed. Make sure to Save at the bottom of the page.

    ```
    HELPSCOUNT_BEACON_SECRET=your_beacon_secret_key
    ```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.