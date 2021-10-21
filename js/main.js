window.addEventListener('load', ()=>{
    $('.employee').each(function (){
        $(this).on('click',()=>{
            $.ajax({
                url:mainData.ajaxUrl,
                data: {
                    action: 'employee',
                    data: {
                        id: $(this).attr('data-id'),
                    }
                },
                type: 'POST',
                xhr: ()=> {
                    var xhr = new window.XMLHttpRequest();
                    xhr.addEventListener("progress", (evt) =>{
                        if (evt.lengthComputable) {
                            showText();
                        }
                    }, false);
                    return xhr
                },
                success: (data) => {
                    if (data) {
                        // console.log(data)
                        renderPopup(data)
                        setTimeout(()=>{
                            $('.popup').addClass('active');
                        },1000)
                    }
                },
            })
        })
    })


    $('.popup_exit').on('click',(e)=>{
        $('.popup').css('opacity',0)
        setTimeout(()=>{
            $('.popup').removeClass('active');
            $('.popup').removeAttr('style');
        },500)
    })
})

function showText(){
    $('.popup').addClass('active');
}

function renderPopup (obj) {
        $('.popup_img img').attr('src',obj.data[0].image_url)
        $('.phone').attr('href',obj.data[0].phone)
        $('.phone').text(obj.data[0].phone)
        $('.mail').attr('href',obj.data[0].email)
        $('.mail').text(obj.data[0].email)
        $('.linkedin').attr('linkedin',obj.data[0].linkedin)
        $('.popup_title h3').text(obj.data[0].title)
        $('.popup_title p').text(obj.data[0].excerpt)
        $('.popup_title span').text(obj.data[0].content)
        $('.popup_text').html(obj.data[0].main)
}
