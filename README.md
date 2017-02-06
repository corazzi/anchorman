# Anchorman
A simple implementation of a Presenter for classes, built with Laravel in mind.

## Usage

Create a presenter for your model, e.g., `UserPresenter` and make it extend the `Kayrunm\Anchorman\Presenter` class.

In the presenter, set up the accessor methods in camelCase for the attribute(s) you want to return. In your views, use snake_case.

For example, `fullName` in your presenter becomes `full_name` in your view. Access the underlying model's attributes by using `$this->entity`.


```php
namespace App\Presenters;

use Kayrunm\Anchorman\Presenter;

class UserPresenter extends Presenter
{
    public function fullName()
    {
        return sprintf('%s %s', $this->entity->first_name, $this->entity->last_name);
    }
}
```

In your model, use the `Kayrunm\Anchorman\Traits\Presentable` trait and set a protected `$presenter` property referencing the model presenter you've just created.

```php
namespace App\Models;

use App\Presenters\UserPresenter;
use Illuminate\Database\Eloquent\Model;
use Kayrunm\Anchorman\Traits\Presentable;

class User extends Model
{
    protected $presenter = UserPresenter::class;
}
```

Now in your views you can simply call `$user->presenter->full_name`
