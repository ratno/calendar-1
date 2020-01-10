
## About Laravel Nova Agenda
Laravel Nova Agenda is an event calendar built from Laravel Nova Tool.

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
php artisan vendor:publish --tag=events-manager-migrations --force php artisan migrate
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

