# Datamodeller

# Reservation

`$table = 'reservations'`


```php
    $table->increments('id');
    
    $table->dateTime('start')->unique();
    $table->dateTime('stop');
    $table->string('name')->unique();
    $table->softDeletes();

    $table->timestamps();
```

---

