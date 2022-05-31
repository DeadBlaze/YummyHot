let position = 0;
    const slides_to_show = 1;
    const slides_to_scroll = 1;
    const items = document.querySelectorAll('.slider_item');
    const container = document.querySelector('.slider_container');
    const track = document.querySelector('.slider_track');
    const itemscount = items.length;
    const btnPrev = document.querySelector('.btn_prev');
    const btnNext = document.querySelector('.btn_next');
    const btn1 = document.querySelector('.btn_1');
    const btn2 = document.querySelector('.btn_2');
    const btn3 = document.querySelector('.btn_3');
    const btn4 = document.querySelector('.btn_4');
    const btn5 = document.querySelector('.btn_5');
    const itemWidth = container.clientWidth / slides_to_show;
    const movePosition = slides_to_scroll * itemWidth;

    items.forEach ((item) => {
        item.style.minWidth = `${itemWidth}px`;
    });


    btnPrev.addEventListener('click', () => {
        const itemLeft =  Math.abs(position) / itemWidth;
        position += itemLeft >= slides_to_scroll ? movePosition : itemLeft * itemWidth;
        setPosition();
        checkbtn();
    });

    btnNext.addEventListener('click', () => {
        const itemLeft = itemscount - (Math.abs(position) + slides_to_show * itemWidth) / itemWidth;
        position -= itemLeft >= slides_to_scroll ? movePosition : itemLeft * itemWidth;
        setPosition();
        checkbtn();
    });

    btn1.addEventListener('click', () => {
        position = 0;
        setPosition();
        checkbtn();
    });

    btn2.addEventListener('click', () => {
        position =0;
        position -= 1 * itemWidth; 
        setPosition();
        checkbtn();
    });

    btn3.addEventListener('click', () => {
        position =0;
        position -= 2 * itemWidth; 
        setPosition();
        checkbtn();
    });

    btn4.addEventListener('click', () => {
        position =0;
        position -= 3 * itemWidth; 
        setPosition();
        checkbtn();
    });

    btn5.addEventListener('click', () => {
        position =0;
        position -= 4 * itemWidth; 
        setPosition();
        checkbtn();
    });


    const setPosition = () => {
        track.style.transform = `translateX(${position}px)`
    };

    const checkbtn = () => {
        btnPrev.disabled = position===0;
        btnNext.disabled = position<= -(itemscount - slides_to_show) * itemWidth;
    };

    checkbtn();