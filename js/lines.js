
// make svg size of whole document

const docbody = document.body,
    dochtml = document.documentElement;

const height = Math.max( docbody.scrollHeight, docbody.offsetHeight, 
                       dochtml.clientHeight, dochtml.scrollHeight, dochtml.offsetHeight );

linesDiv.querySelector('svg').style.height = height;

const getLocation = el => {
    return el.getBoundingClientRect();
}
const blt = 'a10,10 0 0 0 10,10';
const brt = 'a10,10 0 0 1 -10,10';
const trt = 'a10,10 0 0 1 10,10';
const tlt = 'a10,10 0 0 0 -10,10';



// lines english
const lines = () => {
    linesDiv.querySelector('svg').innerHTML += '';

    const point1 = getLocation(openingScreens[5]);
    const point2 = getLocation(placeholders[0].querySelector('img'));
    const point3 = getLocation(placeholders[1].querySelector('img'));
    const point4 = getLocation(placeholders[2].querySelector('img'));
    const point5 = getLocation(placeholders[3].querySelector('img'));
    const point6 = getLocation(placeholders[4].querySelector('img'));
    const point7 = getLocation(placeholders[5].querySelector('img'));

    
    // landing page
    linesDiv.querySelector('svg').innerHTML += `
        <path d="
            M ${point1.left + point1.width/2} ${point1.bottom - point1.height/2} 
            V ${window.innerHeight - 100} ${blt}
            H ${window.innerWidth - 60} ${trt}
            V ${point2.top + point2.height/2} ${brt}
            H ${point2.right - point2.width/2}
            V ${window.innerHeight * 2} ${brt}
            H 500 ${tlt}
            V ${window.innerHeight * 2 + 200}
            " fill="transparent" stroke="#1f8da2" stroke-width="10"/>

            <circle cx="${500 + 10 - 21}" cy="${window.innerHeight * 2 + 200}" r="25" fill="#1f8da2"/>

            <path d="
            M ${point3.left + point3.width/2} ${point3.bottom - 100}
            V ${window.innerHeight * 3} ${blt}
            H ${window.innerWidth - 60} ${trt}
            V ${point4.top + point4.height/6} ${brt}
            H ${point4.right - point4.width*0.835}
            V ${point5.top - 200} ${blt}
            H ${window.innerWidth - 60} ${trt}
            V ${point5.top + point5.height/2.65} ${brt}
            H ${point5.left + point5.width/2}
            V ${point6.top - 100} ${brt}
            H ${point6.left - 100} ${tlt}
            V ${point6.top + 100}
            " fill="transparent" stroke="#1f8da2" stroke-width="10"/>

            <circle cx="${point6.left - 100 - 10}" cy="${point6.top + 100}" r="25" fill="#1f8da2"/>

            <path d="
            M ${point6.left + point6.width/2} ${point6.bottom - 100}
            V ${point7.top - 100} ${blt}
            H ${window.innerWidth - 60} ${trt}
            V ${point7.top + point7.height/2.3} ${brt}
            H ${point7.left + point7.width/2}
            " fill="transparent" stroke="#1f8da2" stroke-width="10"/>


    `;
}


// lines arabic
const arabicLines = () => {
    linesDiv.querySelector('svg').innerHTML += '';

    const point1 = getLocation(openingScreens[5]);
    const point2 = getLocation(placeholders[0].querySelector('img'));
    const point3 = getLocation(placeholders[1].querySelector('img'));
    const point4 = getLocation(placeholders[2].querySelector('img'));
    const point5 = getLocation(placeholders[3].querySelector('img'));
    const point6 = getLocation(placeholders[4].querySelector('img'));
    const point7 = getLocation(placeholders[5].querySelector('img'));

    linesDiv.querySelector('svg').innerHTML += `
        <path d="
            M ${point1.left + point1.width/2} ${point1.bottom - point1.height/2} 
            V ${window.innerHeight - 100} ${brt}
            H 40 ${tlt}
            V ${point2.top + point2.height/2.25} ${blt}
            H ${point2.right - point2.width/2}
            V ${window.innerHeight * 2} ${blt}
            H ${point2.right + 400} ${trt}
            V ${window.innerHeight * 2 + 200}
        " fill="transparent" stroke="#1f8da2" stroke-width="10"/>

        <circle cx="${point2.right + 400 + 10}" cy="${window.innerHeight * 2 + 200}" r="25" fill="#1f8da2"/>

        <path d="
            M ${point3.left + point3.width/2} ${point3.bottom - 100}
            V ${window.innerHeight * 3} ${blt}
            H ${point4.right} ${trt}
            V ${point4.top + point4.height/2} ${brt}
            H ${point4.left + point4.width*0.165}
            V ${point5.top - 200} ${blt}
            H ${point5.right} ${trt}
            V ${point5.top + point5.height/2.85} ${brt}
            H ${point5.left + point5.width/2}
            V ${point6.top - 150} ${blt}
            H ${point6.right + 100} ${trt}
            V ${point6.top + 100}
        " fill="transparent" stroke="#1f8da2" stroke-width="10"/>

        <circle cx="${point6.right + 100 + 10}" cy="${point6.top + 100}" r="25" fill="#1f8da2"/>

        <path d="
            M ${point6.left + point6.width/2} ${point6.bottom - 100}
            V ${point7.top - 100} ${blt}
            H ${point7.right} ${trt}
            V ${point7.top + point7.height/2.5} ${brt}
            H ${point7.left + point7.width/2}
        " fill="transparent" stroke="#1f8da2" stroke-width="10"/>

    `;

}

if(document.documentElement.lang === "ar" && window.innerWidth >= 1112){
    if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        setTimeout(() => {
            arabicLines();
        }, 1500); 
    }
    setTimeout(() => {
        addScroll();
    }, 1500);
} else if(document.documentElement.lang === "en-GB" && window.innerWidth >= 1112){
    if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        setTimeout(() => {
            lines();
        }, 1500); 
    }
    setTimeout(() => {
        addScroll();
    }, 1500);
}