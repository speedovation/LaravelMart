<script>
    
    $( document ).ready(function() {
        
        
     $('#{!! $id !!}').selectize({
                    valueField: 'id',
                    labelField: 'text',
                    searchField: 'text',
                    preload: true,
                    options: [],
                     create: true,
 
                    render: {
                        option: function(item, escape) {
                          
                            return '<div>' + '<span class="text-muted">' + escape(item.id) + '</span>' +
                                             '<span class="text-tall"> ' + escape(item.text) + '</span>' +
                                             
                            	       '</div>';
                        }
                    },
            /*		score: function(search) {
                        var score = this.getScoreFunction(search);
                        return function(item) {
                            return score(item) * (1 + Math.min(item.watchers / 100, 1));
                        };
                    },*/
                    load: function(query, callback) {
                        //if (!query.length) return callback();
                       // alert(query);
                        this.clearOptions();
                        $.ajax({
                            url: '{!! $url !!}?q=' + encodeURIComponent(query),
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
                    },
                   /* onChange: function(value) {
                        if (!value.length) return;
                        this['{!!$id!!}'].disable();
                        this['{!!$id!!}'].clearOptions();
                        this['{!!$id!!}'].load(function(callback) {
                            xhr && xhr.abort();
                            xhr = $.ajax({
                                url: '{!! $url !!}?q=' + value ,
                                success: function(results) {
                                    this['{!!$id!!}'].enable();
                                    callback(results);
                                },
                                error: function() {
                                    callback();
                                }
                            })
                        });
                    },*/
                    onLoad: function(data) {
                       this.setValue('{!! $value !!}');
                    }
                });
        
        
    });
    
</script>
