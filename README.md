
## About Voidfire Calendar
A complete Laravel Nova Ant Vue Calendar Card Ready to work out of the box
![Laravel Nova Agenda](https://raw.githubusercontent.com/horaceho/laravel-nova-agenda/master/resources/images/nova-ant-design-vue.png)

## Getting Started
Requirements
- [Laravel](https://laravel.com/docs/master)
- [Laravel Nova](https://nova.laravel.com/docs/)

##  QuickStart
````
composer require voidfire/calendar
````
````
php artisan vendor:publish --tag=events-manager-migrations --force 
````
````
php artisan migrate
````

To setup the card, you must register the card with Nova. This is typically done in the `cards` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvider.php


public function cards()
{
    return [
        // ...
        new \Voidfire\Calendar\Calendar,
    ];
}
```
<a href="https://www.buymeacoffee.com/GTUvX9O" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>
The package will create for you the needed entities for the calendar Events
````
````
````create_events_table.php```` migration file:
````
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
        });
    }
````

````
````
````App\Nova\Event.php```` resource:
````
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Title')->rules('required'),
            DateTime::make('From', 'start_date'),
            DateTime::make('To', 'end_date'),
        ];
    }
````
 ````App\Event.php```` model:
````
class Event extends Model
{
    protected $dates = [
        'start_date',
        'end_date',
    ];
}
````

