<link rel="stylesheet" href="style.css">

<script>
window.addEventListener ('click', renderBigPhoto)

function renderBigPhoto(evt) {
    var empty = document.getElementById('empty');
    if (evt.target.classList == 'smallphoto') {
        console.log(evt);
        empty.innerHTML = `<img class='bigphoto' src="/img/${evt.target.alt}" alt="${evt.target.alt}">"`
        empty.style.cssText= `
            position: absolute;
            height: 500px;
            top: ${evt.screenY}px;
            left: ${evt.screenX}px;
        `
    }
}   
</script>
<?php

require_once __DIR__ . '/../config/config.php';



getPhotos();
renderPhotos();


echo render(TEMPLATES_DIR . '/index.tpl', [
    'title' => 'Приветствие',
    'h1' => 'Заголовок',
    'content' => renderPhotos()
]);

?>
