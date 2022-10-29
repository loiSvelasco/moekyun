# Moekyun

<img src="public/assets/images/chitanda.png" width="150">

## What is Moekyun
From urban dictionary, a totally reliable source of information btw, *Moe moe, kyun!* is used to describe something, or someone super cute and/or adorable. Like how the anime girl above looks at you all smug while you read this.

## Okay, now what does Moekyun do?
*Moekyun* is a simple php framework for personnal projects, it contains the basic *MVC* functionality, with the addition of 
- Twig templating engine
- Kint 
- DotEnv
- A query builder built from scratch, to remove unnecessary libraries and dependencies (Like I said, this is built purely for personal projects).

and whatever comes that I might need soon.

### ***Ghetto documentation below while I learn how to use sphinx lmao***


#### **Model Properties**
```php
<?php

namespace App\Models;

class User extends \Core\Model
{

    /**
     * This is self explanatory, no description needed
     * 
     * @var string
     */
    protected $tableName = 'users';


    /**
     * As well as this, I could make this work
     * by getting the $columns[0] value, but for
     * explicity, I want it this way.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    
    /**
     * An array of string of all columns
     *
     * @var array
     */
    protected $columns = [];

    /**
     * $returnType is optional, 
     * it determines whether the DBManager 
     * returns a row of data, if not set,
     * the DBManagaer returns an associative array per row
     *
     * @var string
     */
    protected $returnType = 'row';
}
```

#### **Controller Properties**
Note: Unlike your typical PHP frameworks where you define your index or any other methods as

```PHP
function index()
{

}
```

This however needs to have the "Action" string after like below code.

This does not mean that URL should have "Action". Based from the sample controller
file below, 
- example.com/profile/updateLogin
- example.com/profile/(index)

will work without the "Action" string after, also as per standard, the index action is the default for all controllers.
```php
<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;

class Profile extends \Core\Controller
{
    /**
     * the before() method runs before the called action.
     * It is useful for checking if the user is authenticated
     * and other checks before calling the method needed.
     *
     * @return bool
     * 
     */
    protected function before()
    {
    }

    /**
     * the after() method runs after the called action.
     * I'm not entirely sure how I would use this, but it is nice
     * to include it.
     *
     * @return bool
     * 
     */
    protected function after()
    {
    }
    
    /**
     * Sample index with a parameter passed
     *
     * @param mixed $id
     * 
     * @return void
     * 
     */
    public function indexAction($id)
    {
        $user = new User();
        $account = $user->select()
                        ->where('id', $id)
                        ->result();

        View::render('Profile/index', [
            'user' => $account
        ]);
    }

    /**
     * A sample method which handles posted data.
     *
     * @return void
     * 
     */
    public function updateLoginAction()
    {
        $email = $this->getPost('email');
        $password = $this->getPost('pass');
    }
}
```

#### **Views**

This is pretty self explanatory, what I'll soon add here instead is the folder structure on where to put the views, but that can easily be determined by browsing the source code.