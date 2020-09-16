let chapterDetailProgress = [
    [], [], [], [], [], []
];



if(document.documentElement.lang === "ar"){
    
    
// populating the menu with the chapter content taken from html script const chapterContent
chapterContent.forEach(chapter => {
    // add each chapter heading in the main menu
    menuContent.innerHTML += `
        <div class="chapter col-12">

            <div class="chapter-heading">
                <a href="#chapter-${chapter.number}" class="menu-link" data-target="chapter-${chapter.number}"><span>${chapter.arabicNumber}٠</span> ${chapter.arabicChapter}</a>

                <span class="expand" data-toggle="collapse" data-target="#collapse${chapter.number}" aria-expanded="true" aria-controls="collapse${chapter.number}">
                +
                </span>
            </div>

            <div id="collapse${chapter.number}" class="chapter-content collapse" aria-labelledby="${chapter.chapter}" data-parent="#main-menu-accordian">
                <ul id="list-${chapter.number}">
                </ul>
            </div>
        </div>
    `;
    // add the chapter number as a row and a tag in the progress menu
    progressContent.innerHTML += `
        <div class="row w-100" id="progress-section-${chapter.number}">
            <a href="#chapter-${chapter.number}" class="menu-link" data-target="chapter-${chapter.number}">${chapter.arabicNumber}.</a>
        </div>
    `;
})
chapterContent.forEach(chapter => {
    let i = 1;
    chapter.concepts.forEach(concept => {
        // add each concept as a li to the main menu
        document.querySelector(`#list-${chapter.number}`).innerHTML += `
            <li class="chapter-shortcut" data-target="chapter-${chapter.number}" data-shortcut="section-${concept.order}">${concept.arabicTitle}</li>
        `;

        // add the first concept, the infographic and the quiz to the progress menu
        if(i === 1){
            document.querySelector(`#progress-section-${chapter.number}`).innerHTML += `
            <button class="chapter-shortcut btn btn-warning btn-progress-icon" id="chapter-${chapter.number}-section-${i}" data-target="chapter-${chapter.number}" data-shortcut="section-1"><i class="fas fa-align-left"></i></button>
            `;
            chapterDetailProgress[chapter.number-1].push('section-' + i);
        } else if (concept.title.toUpperCase().includes('INFOGRAPHIC')){
            document.querySelector(`#progress-section-${chapter.number}`).innerHTML += `
            <button class="chapter-shortcut btn btn-warning btn-progress-icon" id="chapter-${chapter.number}-section-${i}" data-target="chapter-${chapter.number}" data-shortcut="section-${i}"><i class="fas fa-info"></i></button>
            `;
            chapterDetailProgress[chapter.number-1].push('section-' + i);
        } else if (concept.title.toUpperCase().includes('QUIZ')){
            document.querySelector(`#progress-section-${chapter.number}`).innerHTML += `
            <button class="chapter-shortcut btn btn-warning btn-progress-icon" id="chapter-${chapter.number}-quiz" data-target="chapter-${chapter.number}" data-shortcut="section-${i}"><i class="fas fa-question"></i></button>
            `;
            chapterDetailProgress[chapter.number-1].push('section-' + i);
        }
        
        i++;
    });
})


// change number links
const arabicNumerals = ['١', '٢', '٣', '٤', '٥', '٦']
for(i = 0; i < numberLinks.length; i ++){
    numberLinks[i].innerText = arabicNumerals[i] + '.';
}




} else {
    
    
// populating the menu with the chapter content taken from html script const chapterContent
chapterContent.forEach(chapter => {
    // add each chapter heading in the main menu
    menuContent.innerHTML += `
        <div class="chapter col-12">

            <div class="chapter-heading">
                <a href="#chapter-${chapter.number}" class="menu-link" data-target="chapter-${chapter.number}"><span>0${chapter.number}</span> ${chapter.chapter}</a>

                <span class="expand" data-toggle="collapse" data-target="#collapse${chapter.number}" aria-expanded="true" aria-controls="collapse${chapter.number}">
                +
                </span>
            </div>

            <div id="collapse${chapter.number}" class="chapter-content collapse" aria-labelledby="${chapter.chapter}" data-parent="#main-menu-accordian">
                <ul id="list-${chapter.number}">
                </ul>
            </div>
        </div>
    `;
    // add the chapter number as a row and a tag in the progress menu
    progressContent.innerHTML += `
        <div class="row w-100" id="progress-section-${chapter.number}">
            <a href="#chapter-${chapter.number}" class="menu-link" data-target="chapter-${chapter.number}">${chapter.number}.</a>
        </div>
    `;
})
chapterContent.forEach(chapter => {
    let i = 1;
    chapter.concepts.forEach(concept => {
        // add each concept as a li to the main menu
        document.querySelector(`#list-${chapter.number}`).innerHTML += `
            <li class="chapter-shortcut" data-target="chapter-${chapter.number}" data-shortcut="section-${concept.order}">${concept.title}</li>
        `;

        // add the first concept, the infographic and the quiz to the progress menu
        if(i === 1){
            document.querySelector(`#progress-section-${chapter.number}`).innerHTML += `
            <button class="chapter-shortcut btn btn-warning btn-progress-icon" id="chapter-${chapter.number}-section-${i}" data-target="chapter-${chapter.number}" data-shortcut="section-1"><i class="fas fa-align-left"></i></button>
            `;
            chapterDetailProgress[chapter.number-1].push('section-' + i);
        } else if (concept.title.toUpperCase().includes('INFOGRAPHIC')){
            document.querySelector(`#progress-section-${chapter.number}`).innerHTML += `
            <button class="chapter-shortcut btn btn-warning btn-progress-icon" id="chapter-${chapter.number}-section-${i}" data-target="chapter-${chapter.number}" data-shortcut="section-${i}"><i class="fas fa-info"></i></button>
            `;
            chapterDetailProgress[chapter.number-1].push('section-' + i);
        } else if (concept.title.toUpperCase().includes('QUIZ')){
            document.querySelector(`#progress-section-${chapter.number}`).innerHTML += `
            <button class="chapter-shortcut btn btn-warning btn-progress-icon" id="chapter-${chapter.number}-quiz" data-target="chapter-${chapter.number}" data-shortcut="section-${i}"><i class="fas fa-question"></i></button>
            `;
            chapterDetailProgress[chapter.number-1].push('section-' + i);
        }
        
        i++;
    });
})











}



