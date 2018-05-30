<img src="https://www.hogelidstennis.se/img/htk-logo.svg" width="200">
## Högelids Tennisklubb - Bokningssystem

### [www.hogelidstennis.se](https://www.hogelidstennis.se/)

### Databas
Default så skapas bokningar som kan vara upp till 3 år gamla.
För att bara skapa bokningar för aktuellt år ändra i filen:
`/database/factories/ModelFactory.php`

```php
// Skapar bara bokningar nuvarande år
$year   = Carbon::now()->year;
```

```php
// Skapar bokningar från nuvarande år till och med 3 år gammalt
$year   = Carbon::now()->subYears(rand(0,3))->year;
```



#### Kommandon i terminalen
```bash
# Skapa fake-data
php artisan db:seed

# Töm databasen
php artisan db:seed --class="Truncate"
```
