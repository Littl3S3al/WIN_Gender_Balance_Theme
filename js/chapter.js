let current;
// FUNCTIONS

// function to match selected content to nodelist of all content
const findChapterContent = (target, nodelist) => {
    for (i = 0; i < nodelist.length; i ++){
        if(nodelist[i].dataset.content === target){
            return nodelist[i];
        }
    }
}

// open chapter functions
const openChapter = () => {
    // get elements for the chapter
    let section = document.querySelector(`#${current}`);
    let chapter = findChapterContent(current, chapters);
    let intro = findChapterContent(current, intros);
    let cover = findChapterContent(current, covers);

    linesDiv.style.opacity = 0;

    // animations for large screen
    if(window.innerWidth >= 1200){
        // hide intro text
        intro.querySelectorAll('p').forEach(p => {
            addClass([p], 'd-none');
        });
        // make intro number small
        addClass([intro.querySelector('.number')], 'number-smaller');

        // swap out buttons
        setTimeout(() => {
            addClass([intro.querySelector('.chapter-buttons')], 'hidden-buttons');
            removeClass([intro.querySelector('.open-chapter-buttons')], 'hidden-buttons');
            addClass([mainMenuBtn, progressMenuBtn], 'btn-dark');
        }, 500)
    }
    
    
    // scroll down to the chapter
    section.scrollIntoView();
    

    // move chapter content, intro and cover to the left
    setTimeout(() => {
        // stop body scroll
        removeScroll();
        addClass([chapter], 'move-right')
        addClass([intro, cover], 'move-more-right');
    }, 500);


    // log which chapter is currently open so that function can close that chapter
    whichChapter = current;

     // make first progress completed
     addClass([progressMenu.querySelector(`#${current}-section-1`)], 'completed');
 
     // event lister for scrolling and if elements come into view then make their progress completed
     chapter.addEventListener('scroll', () => {
         let allSections = chapter.querySelectorAll('div');
         allSections.forEach(section => {
             if(section.getBoundingClientRect().bottom <= window.innerHeight && section.getBoundingClientRect().top >= 0){
                 let sectionNo = section.id;
                 let id = progressMenu.querySelector(`#${current}-${sectionNo}`);
                 if(id){
                     addClass([id], 'completed');
                 }
             }
         })
     });

    //  update percentage on the progress menu
     updatePercentage();
   
    
};

// close chapter fucntions
const closeChapter = () => {

    let chapter = findChapterContent(whichChapter, chapters);
    let intro = findChapterContent(whichChapter, intros);
    let cover = findChapterContent(whichChapter, covers);
    let currentNumber = parseInt(whichChapter.substring(whichChapter.length - 1, whichChapter.length));
    whichChapter = false;


    // show intro text
    intro.querySelectorAll('p').forEach(p => {
        removeClass([p], 'd-none');
    });
    // make intro number bg again
    removeClass([intro.querySelector('.number')], 'number-smaller');
    // change chapter buttons back
    removeClass([intro.querySelector('.chapter-buttons')], 'hidden-buttons');
    addClass([intro.querySelector('.open-chapter-buttons')], 'hidden-buttons');
    removeClass([mainMenuBtn, progressMenuBtn], 'btn-dark');
    linesDiv.style.opacity = 1;

    
    removeClass([chapter], 'move-right');
    removeClass([intro, cover], 'move-more-right');
    
    addScroll();

    // chapter tracker function
    chapterTracker.openedChapters[currentNumber-1] = true;
    updateLocalStorage();
    startProgressData();
    updateProgress();
       
};

// scroll to specific content when chapter is open
const goToContent = (shortcut) => {
    let chapter = findChapterContent(whichChapter, chapters);
    let bookmark = chapter.querySelector(`#${shortcut}`);
    let topPos = bookmark.offsetTop;
    chapter.scrollTop = topPos - 200;
};

// toggle chapter hidden class
const hideShowButtons = (content) => {
    if(content.classList.contains('hidden-buttons')){
        content.classList.remove('hidden-buttons')
    } else {
        content.classList.add('hidden-buttons');
    }
};





// EVENT LISTENERS
document.body.addEventListener('click', (e) => {
    // onclick function for read it buttons
    if(e.target.classList.contains('read-it')){
        current = e.target.dataset.target;
        openChapter();
    }
    // onclick function for chapter shortcut buttons as well as menu shortcut links
    if(e.target.classList.contains('chapter-shortcut')){
        if(whichChapter !== e.target.dataset.target && whichChapter){
            console.log('close');
            closeChapter();
        };
        current = e.target.dataset.target;
        let shortcut = e.target.dataset.shortcut;
        openChapter();
        setTimeout(() => {
            goToContent(shortcut);
        }, 1000);
    }
    if(e.target.tagName === 'I' && e.target.parentElement && e.target.parentElement.classList.contains('chapter-shortcut')){
        let actualTarget = e.target.parentElement;
        if(whichChapter !== actualTarget.dataset.target && whichChapter){
            console.log('close');
            closeChapter();
        };
        current = actualTarget.dataset.target;
        let shortcut = actualTarget.dataset.shortcut;
        openChapter();
        setTimeout(() => {
            goToContent(shortcut);
        }, 1000);
    }

    // onclick funtion for open chapter buttons
    if(e.target.classList.contains('chapter-link')){
        let link = e.target.dataset.link;
        goToContent(link);
    }
    
    // check if menu has been clicked on
    if(e.target.classList.contains('menu-link')){
        if(whichChapter !== e.target.dataset.target && whichChapter){
            closeChapter();
        };
    }

    // check if next or previous buttons have been clicked on (the ones showing when chapter is open)
    if(e.target.classList.contains('btn-next')){
        if(whichChapter !== e.target.dataset.target && whichChapter){
            closeChapter();
        };
    }

    // reset progress menu
    if(e.target === resetProgress){
        e.target.innerHTML = 'Are you sure? <br> <button class="btn btn-danger" id="sure-to-reset">yes</button> <button class="btn btn-primary" id="dont-reset">no</button>'
    }
    if(e.target.id === "sure-to-reset"){
        localStorage.clear();
        location.reload();
    }
    if(e.target.id === "dont-reset"){
        resetProgress.innerHTML = 'Want to start over? Reset your progress.'
    }

    // additional menu
    if(e.target.classList.contains('additional-link')){
        openAdditionalContent(e.target.dataset.target);
    };
    if(e.target.classList.contains('close-addition') || e.target.id === "additional-screen"){
        closeAdditionalContent();
    }
    if(e.target.tagName === 'I' && e.target.parentElement && e.target.parentElement.classList.contains('close-addition')){
        closeAdditionalContent();
    }

    // click on glossary term
    if(e.target.classList.contains('gloss-link')){
        openAdditionalContent('glossary');
        let searchTerm = e.target.dataset.target;
        let searchResult = glossaryText.querySelector(`#glossary-${searchTerm}`);
        let topPos = searchResult.offsetTop;
        additionalScrollable.scrollTop = topPos;
        addClass([searchResult], 'highlighted');
    }
    
})

// event listener for close buttons
// this wasn't working in the usual way so I had to set up individual event listeners
closeChapterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        closeChapter();
    })
})




// detect back button
document.onmouseover = function() {
    //User's mouse is inside the page.
    window.innerDocClick = true;
}

document.onmouseleave = function() {
    //User's mouse has left the page.
    window.innerDocClick = false;
}

window.onhashchange = function() {
    if (!window.innerDocClick) {
        closeChapter();
    }
}



// adding quiz


const quizForms = document.querySelectorAll(".quiz-form");



quizForms.forEach(quiz => {
    quiz.addEventListener('submit', e => {
        e.preventDefault();


        addClass([progressMenu.querySelector(`#${whichChapter}-quiz`)], 'completed');


        let correctAns;
        let number;
        let userAns = [
            quiz.q1,
            quiz.q2,
            quiz.q3,
            quiz.q4
        ];
        let score = 0;

        // check to see which chapter is currently open
        if(whichChapter === 'chapter-1'){
            correctAns = correctAns_1;
            number = 1;
        } else if (whichChapter === 'chapter-2') {
            correctAns = correctAns_2;
            number = 2;
        } else if (whichChapter === 'chapter-3') {
            correctAns = correctAns_3;
            number = 3;
        } else if (whichChapter === 'chapter-4') {
            correctAns = correctAns_4;
            number = 4;
        } else if (whichChapter === 'chapter-5') {
            correctAns = correctAns_5;
            number = 5;
        } else if (whichChapter === 'chapter-6') {
            correctAns = correctAns_6;
            number = 6;
        }

        userAns.forEach((ans, i) => {
            if(ans.value === correctAns[i]){
                score += 25;
                for(i = 0; i < 4; i++){
                    const isChecked = ans[i].checked;
                    if(isChecked){
                        ans[i].parentElement.classList.add("correct")
                    }
                }
            } else {
                for(i = 0; i < 4; i ++){
                    const isChecked = ans[i].checked;
                    if (isChecked) {
                      ans[i].parentElement.classList.add("wrong");
                    }  
                }
            }
        })

        let chapter = findChapterContent(whichChapter, chapters);
        let topPos = quiz.offsetTop;
        chapter.scrollTop = topPos - 200;

        const result = document.querySelector(`.quiz__heading_${number}`);
        result.style.opacity = 1;

        let output = 0;
        const timer = setInterval(() => {
            result.querySelector(".result").textContent = `${output}%`;
            if (output === score) {
            clearInterval(timer);
            } else {
            output++;
            }
        }, 25);
        
    })
});





