<script>
    
    $( document ).ready(function() {
        
        
        $('select').selectize({
                    valueField: 'id',
                    labelField: 'text',
                    searchField: 'text',
                    preload: true,
                    options: [],
                     create: true,
 /*
                    render: {
                        option: function(item, escape) {
                          
                            return '<div>' + '<span class="title">' + escape(item.text) + '</span>' +
                                             '<span class="description">' + escape(item.id) + '</span>' +
                            	       '</div>';
                        }
                    },*/
            /*		score: function(search) {
                        var score = this.getScoreFunction(search);
                        return function(item) {
                            return score(item) * (1 + Math.min(item.watchers / 100, 1));
                        };
                    },*/
                    load: function(query, callback) {
                        //if (!query.length) return callback();
                        $.ajax({
                            url: '{!! $url !!}',
                            type: 'GET',
                            dataType: 'json',
                            error: function() {
                                callback();
                            },
                            success: function(res) {
                                console.log(res);
                                callback(res);
                            }
                        });
                    }
                });
        
        
    });
    
</script>
