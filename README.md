# webman-factory

Factory for webman framework.

## Installation

```shell
composer require --dev hms5232/webman-factory
```

You can remove the `--dev` flag as your need.

## Usage

Like [Laravel factory](https://laravel.com/docs/eloquent-factories), but there are something different, and you need to do the following additional:

* The factory class should extend `Hms5232\WebmanFactory\WebmanFactory`:

    ```php
    use Hms5232\WebmanFactory\WebmanFactory;

    class AdminFactory extends WebmanFactory
    {
        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                'name' => $this->faker->name(),
                'email' => $this->faker->unique()->safeEmail(),
            ];
        }
    }
    ```

* The model class should use `Hms5232\WebmanFactory\HasFactory` instead of `Illuminate\Database\Eloquent\Factories\HasFactory`:
  
  ```diff
  - use Illuminate\Database\Eloquent\Factories\HasFactory;
  + use Hms5232\WebmanFactory\HasFactory;

  class Admin extends Model
  {
      use HasFactory;
  }  
  ```
  
  otherwise, you should specify the factory:
  
  ```php
  // app/model/Admin.php
  
  use database\factories\AdminFactory;

  /**
   * Create a new factory instance for the model.
   */
  protected static function newFactory()
  {
      return AdminFactory::new();
  }
  ```

* Currently, the `fake()` is not supported.

## License

[MIT](LICENSE)
