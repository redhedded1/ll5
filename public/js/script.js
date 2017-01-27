/**
 * Created by lball on 1/22/17.
 */
(function($){
    $(document).ready(function(){
        $('textarea').ckeditor();
            var editor = CKEDITOR.instances['body'];
            if(editor){
                editor.on('blur', function() {
                    var str = editor.getData();
                    var txt = $(str).text();
                    var truncatedStr = $.trim(txt)
                            .substring(0, 60)
                            .split(' ')
                            .slice(0, -1)
                            .join(' ') + '...';
                    $('#excerpt').val(truncatedStr);
                });
            }

        $('div.alert').not('alert.important').delay(3000).slideUp(300);
        $('#flash-overlay-modal').modal();
    });
})(jQuery);