const current = location.pathname;
$(function(){
    $('.list-group-item').each(function(){
        const $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    })
})

