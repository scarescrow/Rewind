$(function() {
        
        var user_id = localStorage.getItem('user_id');
        
        if(typeof user_id == 'undefined' || user_id =='' || user_id == null) {
                window.location.replace('login.html');
        }

        var old_id = localStorage.getItem('mem_id');
        
        var url = "http://localhost/rewind/web/get_memory.php";
        
        if(typeof old_id == 'undefined' || old_id =='' || old_id == null) {

                old_id = 0;
                
                $.ajax({
                        url: url,
                        type: 'POST',
                        data: 'mem_id=' + old_id + '&user_id=' + user_id,
                        success: function(result) {
                                var json = $.parseJSON(result);
                                var id = json.id;
                                var title = json.title;
                                var detail = json.detail;

                                detail = detail.replace("\r\n", "<br/>");
                                
                                localStorage.setItem('mem_id', id);
                                localStorage.setItem('title', title);
                                localStorage.setItem('detail', detail);

                                $('#header').html(title);
                                $('#detail').html(detail);
                        }

                });

        } else {

                $('#header').html(localStorage.getItem('title'));
                $('#detail').html(localStorage.getItem('detail'));

        }

        $('#header, #detail').each(function() {
                $(this).fadeIn(500);
        });

        $('#button').click(function(e) {
                
                var old_id = localStorage.getItem('mem_id');
                $('#header, #detail').fadeOut(500, function() {
                       $.ajax({
                                url: url,
                                type: 'POST',
                                data: 'mem_id=' + old_id + '&user_id=' + user_id,
                                success: function(result) {
                                        var json = $.parseJSON(result);
                                        var id = json.id;
                                        var title = json.title;
                                        var detail = json.detail;

                                        detail = detail.replace("\r\n", "<br/>");
                                        
                                        localStorage.setItem('mem_id', id);
                                        localStorage.setItem('title', title);
                                        localStorage.setItem('detail', detail);
                                        
                                        $('#header').html(title);
                                        $('#detail').html(detail);

                                        $('#header, #detail').each(function() {
                                                $(this).fadeIn(500);
                                        });
                                }

                        }); 
                });
            
                return false;

        });
});
