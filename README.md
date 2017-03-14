# Datatype
A simple PHP lib for managing variable type casting.

### Example
Simple text example
```php
    use DataType\String\Text;
    
    $string = new Text('Simple string');
    echo $string->replace(new Text('string'), 'text')
        ->replace('Simple', new Text('hard'))
        ->replace(' ', '-');
        
    //e.g.: "Hard-text"
```

Simple integer example
```php
    use DataType\Number\Integer;
    
    $int = new Integer(10);
    echo $int->add(2)
        ->divide(6)
        ->multiply(new Integer(25));
        
    //e.g.: 50
```