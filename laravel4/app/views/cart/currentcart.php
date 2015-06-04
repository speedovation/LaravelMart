<!doctype html>
<html ng-app="app">
    <head>
        
        <?= stylesheet_link_tag() ?>
        <?= javascript_include_tag() ?>

        
    </head>
    <body>
        <h2>Todo</h2>
        <div ng-controller="TodoCtrl">
            <span>{{remaining()}} of {{todos.length}} remaining</span>
            [ <a href="" ng-click="archive()">archive</a> ]
            <ul class="unstyled">
                <li ng-repeat="todo in todos">
                    <input type="checkbox" ng-model="todo.done">
                    <span class="done-{{todo.done}}">{{todo.text}}</span>
                </li>
            </ul>
            <form ng-submit="addTodo()">
                <input type="text" ng-model="todoText" size="30"
                       placeholder="add new todo here">
                <input class="btn-primary" type="submit" value="add">
            </form>
            
            <ul class="example-animate-container">
                <li class="animate-repeat" ng-repeat="product in products.data | filter:q">
                    [{{$index + 1}}] {{product.name}}
                </li>
            </ul>
            
            <!--"total":814,"per_page":12,"current_page":1,"last_page":68,"from":1,"to":12,"-->
            <p><a href="">{{ products.current_page + 1}}</a>
            </p> 
            <a href="#/">home</a> <a href="#/cart">cart</a>
            
            <div ng-view></div>
            
            <p>
            
            
            
            bbbb
            </p>            
            
            
        </div>
        
        <div ng-controller="BasketCtrl">
            {{ clear() }}
            
            {{ add({ "id": 5,"name": "P Name","price" : 30 } )  }}
            
            {{ getProducts() }}
        </div>
    </body>
</html>