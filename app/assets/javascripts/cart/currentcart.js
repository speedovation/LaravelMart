function TodoCtrl($scope,Products) {
    
    $scope.products = Products.get();
    //$scope.basket = Basket;
    
//    Basket.clear();
//    Basket.add({ "id": 2,"name": "P Name","price" : 30 } );
//    Basket.getProducts();
    
    $scope.todos = [
        {text: 'learn angular', done: true},
        {text: 'build an angular app', done: false}];

    $scope.addTodo = function() {
        $scope.todos.push({text: $scope.todoText, done: false});
        $scope.todoText = '';
    };

    $scope.remaining = function() {
        var count = 0;
        angular.forEach($scope.todos, function(todo) {
            count += todo.done ? 0 : 1;
        });
        
        return count;
    };

    $scope.archive = function() {
        var oldTodos = $scope.todos;
        $scope.todos = [];
        angular.forEach(oldTodos, function(todo) {
            if (!todo.done)
                $scope.todos.push(todo);
        });
    };
}


angular.module('app',['ngRoute','ngCookies','ProductServices'])
    .config(appRouter);

function appRouter($routeProvider)
{
    $routeProvider
       .when ( '/', { templateUrl: '/assets/partials/time.html'})
       .when ( '/cart', { template: '<p>hhhh</p>'})
       ;
}

angular.module('ProductServices',['ngResource'])
.factory('Products', function ($resource){
   return  $resource("/products/listproducts");


});

