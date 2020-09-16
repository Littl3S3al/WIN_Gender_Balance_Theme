
// make svg size of whole document

const docbody = document.body,
    dochtml = document.documentElement;

const height = Math.max( docbody.scrollHeight, docbody.offsetHeight, 
                       dochtml.clientHeight, dochtml.scrollHeight, dochtml.offsetHeight );

linesDiv.querySelector('svg').style.height = height;

const getLocation = el => {
    return el.getBoundingClientRect();
}

// line one
const lines = () => {
    linesDiv.querySelector('svg').innerHTML += '';
    
    let point1 = getLocation(openingScreens[5]);
    let point2 = getLocation(placeholders[0].querySelector('img'));
    let point3 = getLocation(placeholders[1].querySelector('img'));
    let point4 = getLocation(placeholders[2].querySelector('img'));
    let point5 = getLocation(placeholders[3].querySelector('img'));
    let point6 = getLocation(placeholders[4].querySelector('img'));
    let point7 = getLocation(placeholders[5].querySelector('img'));

    let blt = 'a10,10 0 0 0 10,10';
    let brt = 'a10,10 0 0 1 -10,10';
    let trt = 'a10,10 0 0 1 10,10';
    let tlt = 'a10,10 0 0 0 -10,10';


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

            <circle cx="${point3.left + point3.width/2}" cy="${point3.bottom - 100}" r="25" fill="#1f8da2"/>

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


if(document.documentElement.lang === "ar" && window.innerWidth >= 992){
    // comming soon
} else if(document.documentElement.lang === "en-GB" && window.innerWidth >= 992){
    setTimeout(() => {
        lines();
        body.classList.remove('no-vertical-scroll');
    }, 1500);
}