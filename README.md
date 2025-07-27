# webman-factory

Factory for webman framework.

## Installation

```shell
composer require --dev hms5232/webman-factory
```

You can remove the `--dev` flag as your need.

## Usage

Like Laravel factory, but something different and you should do the following additional:

* The factory file should extend `Hms5232\WebmanFactory\WebmanFactory`:

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

*  The factory file should specify the model:

    ```php
    use app\model\Admin;
    use Hms5232\WebmanFactory\WebmanFactory;

    class AdminFactory extends WebmanFactory
    {
        /**
         * The name of the factory's corresponding model.
         *
         * @var class-string<\Illuminate\Database\Eloquent\Model>
         */
         protected $model = Admin::class;
    }
    ```

* The model file should use `Hms5232\WebmanFactory\HasFactory` instead of `Illuminate\Database\Eloquent\Factories\HasFactory`:
  
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
