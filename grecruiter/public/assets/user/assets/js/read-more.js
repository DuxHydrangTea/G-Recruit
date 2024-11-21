const post_items = document.querySelectorAll('.poster-item')

post_items.forEach(p =>{
    var btnReadMore =  p.querySelector('button')
    var content = p.querySelector('.content-post')
    btnReadMore.addEventListener('click', e =>{
        content.classList.toggle('max-line-4')
        btnReadMore.innerText = btnReadMore.classList.contains('max-line-4') ? 'Read more' : 'Read less'
    })
})