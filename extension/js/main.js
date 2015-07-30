$(function() {
        
        var user_id = localStorage.getItem('user_id');
        
        if(typeof user_id == 'undefined' || user_id =='' || user_id == null) {
                window.location.replace('login.html');
        }

        var default_no_of_characters = 80;
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

                                if(detail.toString().length <= default_no_of_characters)
                                    $('#detail_text').css('margin-top', '80px');
                                else
                                    $('#detail_text').css('margin-top', '10px');
                                
                                $('#header').html(title);
                                $('#detail').html(detail);
                        }

                });

        } else {

                var title = localStorage.getItem('title');
                var detail = localStorage.getItem('detail');
                
                if(detail.toString().length <= default_no_of_characters)
                    $('#detail_text').css('margin-top', '80px');
                else
                    $('#detail_text').css('margin-top', '10px');
                
                $('#header').html(localStorage.getItem('title'));
                $('#detail').html(localStorage.getItem('detail'));

        }

        $('#header, #detail').fadeIn(500);

        $('#button').click(function(e) {
                
                var old_id = localStorage.getItem('mem_id');
                $('#content').fadeOut(500, function() {
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
                                        
                                        if(detail.toString().length <= default_no_of_characters)
                                            $('#detail_text').css('margin-top', '80px');
                                        else
                                            $('#detail_text').css('margin-top', '10px');        
                                        
                                        $('#header').html(title);
                                        $('#detail').html(detail);

                                        $('#content').fadeIn(500);

                                }

                        }); 
                });
            
                return false;

        });
});
