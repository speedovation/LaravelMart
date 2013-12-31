//angular.module('BasketService', ['ngCookies'])
//        .factory('Basket', function($cookies) {
function BasketCtrl($scope,$cookies,Products) {
    var products = JSON.parse($cookies.products || "[]");

   
        $scope.getProducts= function() {
            return products;
        },
        $scope.add = function(product) {

            products.push({
                "id": product.id,
                "name": product.name,
                "price": product.price,
                "total": product.price * 1,
                "quantity": 1
            });

            this.store();
        },
        $scope.remove= function(product) {

            for (var i = 0; i < products.length; i++) {

                var next = products[i];

                if (next.id == product.id) {
                    products.splice(i, 1);
                }

            }

            this.store();

        },
        $scope.update= function() {

            for (var i = 0; i < products.length; i++) {

                var product = products[i];
                var raw = product.quantity * product.price;

                product.total = Math.round(raw * 100) / 100;

            }

            this.store();

        },
        $scope.store = function() {
            $cookies.products = JSON.stringify(products);
        },
        $scope.clear = function() {
            products.length = 0;
            this.store();
        }

    

}
