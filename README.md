# CRUD
CRUD class written for PHP.

## You would use this class like so:
```php
$crud = new CRUD("host","dbname","username","password");
$crud->create("table", "field1, field2, field3", ":value1, :value2, :value3");
$crud->read("table", 1);
$crud->readAll("table");
$crud->update("table", "field1 = :newvalue1, field2 = :newvalue2", "id = :id");
$crud->delete("table", 3);
```
### Author

**Ramazan Çetinkaya**

* [github/ramazancetinkaya](https://github.com/ramazancetinkaya)

### License

Copyright © 2023, [Ramazan Çetinkaya](https://github.com/ramazancetinkaya).
