$(function() {
        var string = localStorage.getItem('hValue')

        var old_id = localStorage.getItem('id');
        
        var url = "http://dcetech.com/sagnik/rewind/get_memory.php";

        if(typeof old_id == 'undefined' || old_id =='' || old_id == null) {
                
                $.get(url, function(data) {
                        var json = $.parseJSON(data);
                        var id = json.id;
                        var title = json.title;
                        var detail = json.detail;

                        detail = detail.replace("\\r\\n", "<br/>");
                        
                        localStorage.setItem('id', id);
                        localStorage.setItem('title', title);
                        localStorage.setItem('detail', detail);

                        $('#header').html(localStorage.getItem('title'));
                        $('#detail').html(localStorage.getItem('detail'));

                });

        }

        $('#header').html(localStorage.getItem('title'));
        $('#detail').html(localStorage.getItem('detail'));

        $('#button').click(function() {
                
                var old_id = localStorage.getItem('id');
                $.get(url + "?id=" + old_id, function(data) {

                        var json = $.parseJSON(data);
                        
                        var id = json.id;
                        var title = json.title;
                        var detail = json.detail;

                        localStorage.setItem('id', id);
                        localStorage.setItem('title', title);
                        localStorage.setItem('detail', detail);

                        $('#header').html(localStorage.getItem('title'));
                        $('#detail').html(localStorage.getItem('detail'));

                });

        })
})
