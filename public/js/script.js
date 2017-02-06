/**
 * Created by lball on 1/22/17.
 */
(function($){
    $(document).ready(function(){

        $('#body').ckeditor();
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

        $('[name="delete_article"]').on('click', function(e){
            var $form = $(this).closest('form');
            e.preventDefault();
            $('#confirm').modal()
                .one('click', '#delete', function() {   // .one() is NOT a typo of .on()
                    $form.trigger('submit');
                });
        });

        $('#tag_list').select2({
            placeholder: 'Select Tags',
            tags: true,
            multiple: true
        });

        var menuTop = document.getElementById('cbp-spmenu-s3');
        mobileMenuToggle.onclick = function() {
            classie.toggle( this, 'active' );
            classie.toggle( menuTop, 'cbp-spmenu-open' );
        };
    });
})(jQuery);