(function($) {
    $(function() {
        var $clearCache = $('.bdevselementjs-clear-cache'),
            $haMenu = $('#toplevel_page_bdevselement .toplevel_page_bdevselement .wp-menu-name'),
            menuText = $haMenu.text();

        $haMenu.text(menuText.replace(/\s/, ''));

        $clearCache.on('click', 'a', function(e) {
            e.preventDefault();

            var type = 'all',
                $m = $(e.delegateTarget);

            if ($m.hasClass('bdevs-el-clear-page-cache')) {
                type = 'page';
            }

            $m.addClass('bdevs-el-clear-cache--init');

            $.post(
                BdevsElementAdmin.ajax_url,
                {
                    action: 'bdevs_element_clear_cache',
                    type: type,
                    nonce: BdevsElementAdmin.nonce,
                    post_id: BdevsElementAdmin.post_id
                }
            ).done(function(res) {
                $m.removeClass('bdevs-el-clear-cache--init').addClass('bdevs-el-clear-cache--done');
            });
        });
    })
}(jQuery));
