function open_modal() {
    var modal = document.getElementsByClassName("modal");
    modal.style.display = "flex";
}

function close_modal() {
    var modal = document.getElementsByClassName("modal");
    modal.style.display = 'none';
}

function text() {
    var text = document.getElementById("text-discount");
    text.innerHTML = 'Быть именинником не только приятно, но и выгодно! Дарим скидку 30% на любые еду. Акция действительна при предъявлении паспорта 7 дней до и три дня после дня рождения. Для получения персонального промокода напишите нам.';
}

// var text = document.getElementsById("text-discount");

var text = document.getElementById("text-discount");
text.innerHTML = 'Быть именинником не только приятно, но и выгодно! Дарим скидку 30% на любые еду. Акция действительна при предъявлении паспорта 7 дней до и три дня после дня рождения. Для получения персонального промокода напишите нам.';