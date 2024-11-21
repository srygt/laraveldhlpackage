
# **Laravel DHL Package**

A Laravel package for seamless integration with the DHL API. This package allows developers to interact with DHL services such as shipment tracking, label generation, and rate calculation in a Laravel application.

## **Features**

- Easy integration with DHL API.
- Supports shipment creation, tracking, and cancellation.
- Built-in rate calculation and label generation.
- Configurable through Laravel's configuration system.

## **Installation**

You can install this package via Composer:

```bash
composer require serdaryigit/laravel-dhlpackage
```

### **Publish Configuration**

After installation, publish the configuration file to customize the API settings:

```bash
php artisan vendor:publish --provider="Serdaryigit\Laravel\Providers\DhlServiceProvider"
```

This will create a `config/dhl.php` file where you can configure your DHL API credentials.

### **Environment Variables**

Add your DHL API credentials to your `.env` file:

```env
DHL_API_KEY=your_api_key
DHL_API_SECRET=your_api_secret
DHL_API_BASE_URL=https://api.dhl.com
```

## **Usage**

### **Basic Example**

To use the DHL integration in your Laravel application, you can use the provided **facade**:

```php
use Dhl;

$shipment = Dhl::createShipment([
    'recipient' => [
        'name' => 'John Doe',
        'address' => '123 Main Street',
        'city' => 'Berlin',
        'country' => 'DE',
        'postal_code' => '10115'
    ],
    'package' => [
        'weight' => 5.0,
        'dimensions' => [10, 15, 20]
    ]
]);

return $shipment;
```

### **Tracking a Shipment**

```php
$tracking = Dhl::trackShipment('TRACKING_NUMBER');
return $tracking;
```

### **Rate Calculation**

```php
$rate = Dhl::calculateRate([
    'origin' => [
        'postal_code' => '10115',
        'country' => 'DE'
    ],
    'destination' => [
        'postal_code' => '90210',
        'country' => 'US'
    ],
    'weight' => 5.0
]);

return $rate;
```

## **Testing**

You can run tests using PHPUnit:

```bash
composer test
```

## **Contributing**

Contributions are welcome! Please submit a pull request or open an issue if you encounter any problems.

## **License**

This package is open-source software licensed under the [MIT license](LICENSE).
