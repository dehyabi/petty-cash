const current = location.pathname;
$(function(){
    $('.list-group-item').each(function(){
        const $this = $(this);
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    })
})

