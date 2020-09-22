// VARIABLES
// THE MENU
const header = document.querySelector('header');
const mainMenuBtn = document.querySelector('#menu');
const progressMenuBtn = document.querySelector('#progress-menu');
const logo = document.querySelector('#logo');

const mainMenu = document.querySelector('nav');
const menuContent = mainMenu.querySelector('#main-menu-accordian');
const mainMenuLinks = mainMenu.querySelectorAll('a');
const mainScreen = document.querySelector('#mainScreen');
const menuLable = document.querySelector('#menulable');

const searchForm = document.querySelector('#keyword-search-form');
const searchSpace = document.querySelector('#keyword-row');
const searchFormInput = document.querySelector('#keyword-search-form input');

// THE PROGRESS MENU
const progressMenu = document.querySelector('#progress-menu-container');
const progressScreen = document.querySelector('#progress-screen');
const progressContent = document.querySelector('#progress-icons');
const progressPercentage = document.querySelector('#progress-percentage');
const progressPercentageBar = document.querySelector('.progress-detailed');
const resetProgress = document.querySelector('#reset');

// ADDITIONAL RESOURCES MENU
const additionalMenu = document.querySelector('.additional-section');
const additionalScreen = document.querySelector('#additional-screen');
const additionalOptions = additionalMenu.querySelectorAll('.text-content');
const additionalScrollable = document.querySelector('.additional-content');

// THE GLOSSARY
const glossaryForm = document.querySelector('#glossary-search-form');
const glossaryText = document.querySelector('#glossary');
const glossarySearch = document.querySelector('#glossary-search-form input');
const glossSearchSpace = document.querySelector('#gloss-keyword-row');

// LANDING PAGE
const openingScreens = document.querySelectorAll('.min-screen');
const title = document.querySelector('#landingText');
const numberLinks = document.querySelectorAll('.min-min-screen a span');

// LINES
const linesDiv = document.querySelector('#lines');
const lineButtons = document.querySelectorAll('.btn-line-link');

// CHAPTER CONTENT
const nextButtons = document.querySelectorAll('.btn-next');
const readitButtons = document.querySelectorAll('.read-it');
const shortcutButtons = document.querySelectorAll('button.chapter-shortcut');
const chapterLinkButtons = document.querySelectorAll('button.chapter-link');

// CHAPTER VARIABLES
const chapters = document.querySelectorAll('.chapter-text');
const intros = document.querySelectorAll('.chapter-intro');
const covers = document.querySelectorAll('.chapter-image');
const closeChapterBtns = document.querySelectorAll('.close-chapter');
let whichChapter;

// PROGRESS TRACKING
const progressBar = document.querySelectorAll('.progress');
const progressDots = document.querySelectorAll('.dot');

// LANGUAGE SWITCHER
const switcher = document.querySelector('.trp-language-switcher');


let trackedChapters = 0;
// setting up the progress functions
let chapterTracker = {
    openedChapters: [
        false, false, false, false, false, false
    ],
    detailChapters: []
};

// GENERAL FUNCTIONS

// add class
const addClass = (array, cssClass) => {
    array.forEach(item =>{
        item.classList.add(cssClass);
    });
}

// remove class
const removeClass = (array, cssClass) => {
    array.forEach(item =>{
        item.classList.remove(cssClass);
    });
}

// remove vertical scroll from body
const removeScroll = () => {
    document.body.classList.add('modal-open');
}

// add vertical scroll to body
const addScroll = () => {
    document.body.classList.remove('modal-open');
}

// add large class to all buttons if window size is appropriate
const largeButtons = () => {
    if(window.innerWidth >= 992){
        addClass([mainMenuBtn, progressMenuBtn], 'btn-lg');
        addClass(nextButtons, 'btn-lg');
        addClass(closeChapterBtns, 'btn-lg');
     } else {
        removeClass([mainMenuBtn, progressMenuBtn], 'btn-lg');
        removeClass(nextButtons, 'btn-lg');
        removeClass(closeChapterBtns, 'btn-lg');
     }
};




// animate all landing page elements for screen sizes and languages
const animateIntro = () => {
    // animate arabic desktop
    if(document.documentElement.lang === "ar" && window.innerWidth >= 1112){
        addClass([openingScreens[0]], 'animate__fadeInTopRight');
        addClass([openingScreens[1]], 'animate__fadeInDown');
        addClass([openingScreens[2]], 'animate__fadeInTopLeft');
        addClass([openingScreens[3]], 'animate__fadeInBottomRight');
        addClass([openingScreens[4]], 'animate__fadeInUp');
        addClass([openingScreens[5]], 'animate__fadeInBottomLeft');
        addClass([title], 'animate__fadeInLeft');
    } 
    // animate english desktop
    else if(document.documentElement.lang === "en-GB" && window.innerWidth >= 1112){
        addClass([openingScreens[0]], 'animate__fadeInTopLeft');
        addClass([openingScreens[1]], 'animate__fadeInDown');
        addClass([openingScreens[2]], 'animate__fadeInTopRight');
        addClass([openingScreens[3]], 'animate__fadeInBottomLeft');
        addClass([openingScreens[4]], 'animate__fadeInUp');
        addClass([openingScreens[5]], 'animate__fadeInBottomRight');
        addClass([title], 'animate__fadeInRight');
    } 
    // animate arabic mobile
    else if (document.documentElement.lang === "ar" && window.innerWidth < 1112){
        addClass([openingScreens[0]], 'animate__fadeInTopRight');
        addClass([openingScreens[1]], 'animate__fadeInTopLeft');
        addClass([openingScreens[2]], 'animate__fadeInRight');
        addClass([openingScreens[3]], 'animate__fadeInLeft');
        addClass([openingScreens[4]], 'animate__fadeInBottomRight');
        addClass([openingScreens[5]], 'animate__fadeInBottomLeft');
        addClass([title], 'animate__fadeInUp');
    
    } 
    // animate english mobile
    else if (document.documentElement.lang === "en-GB" && window.innerWidth < 1112){
        addClass([openingScreens[0]], 'animate__fadeInTopLeft');
        addClass([openingScreens[1]], 'animate__fadeInTopRight');
        addClass([openingScreens[2]], 'animate__fadeInLeft');
        addClass([openingScreens[3]], 'animate__fadeInRight');
        addClass([openingScreens[4]], 'animate__fadeInBottomLeft');
        addClass([openingScreens[5]], 'animate__fadeInBottomRight');
        addClass([title], 'animate__fadeInUp');
    }
}





// INITIAL ACTIONS

// make buttons large on big screen
largeButtons();
// animate screens correctly on big screen
animateIntro();


// edit chapter buttons to be the right colour
shortcutButtons.forEach(button => {
    if(button.innerText.toUpperCase().includes('INFOGRAPHIC') || button.innerText.includes('انفوجرافيك')){
        let text = button.innerText;
        button.innerHTML = `<i class="fas fa-info"></i> ${text}`;
        button.classList.add('btn-primary');
    } else if (button.innerText.toUpperCase().includes('QUIZ') || button.innerText.includes('اختبر معلوماتك')){
        let text = button.innerText;
        button.innerHTML = `<i class="fas fa-question"></i> ${text}`;
        button.classList.add('btn-warning');
    }
});

chapterLinkButtons.forEach(button => {
    if(button.innerText.toUpperCase().includes('INFOGRAPHIC') || button.innerText.includes('انفوجرافيك')){
        let text = button.innerText;
        button.innerHTML = `<i class="fas fa-info"></i> ${text}`;
        button.classList.add('btn-primary');
    } else if (button.innerText.toUpperCase().includes('QUIZ') || button.innerText.includes('اختبر معلوماتك')){
        let text = button.innerText;
        button.innerHTML = `<i class="fas fa-question"></i> ${text}`;
        button.classList.add('btn-warning');
    } else {
        button.classList.add('btn-secondary');
    }
});




