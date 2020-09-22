// major search function
const globalSearch = (searchSpace, searchFormInput) => {
    searchSpace.innerHTML = '';
    let searchTerm = searchFormInput.value.toUpperCase();
    if(searchTerm){
        chapters.forEach(chapter => {
            let link = '';
            if(chapter.textContent.toUpperCase().includes(searchTerm)){
                let divs = chapter.querySelector('.chapter-text-inner').querySelectorAll('div');
                divs.forEach(div => {
                    let divContent = div.textContent.toUpperCase();
                    if(divContent.includes(searchTerm)){
                        let n = divContent.indexOf(searchTerm);
                        let result = div.innerText.substring(n-10, n + 200);
                        link += `
                        <p>
                            <span class="chapter-shortcut" data-target="${chapter.dataset.content}" data-shortcut="${div.id}">...${result}...</span>
                        </p>
                        <hr>
                        `;
                    }
                })
                searchSpace.innerHTML += `
                    <div class="card">
                        <div class="card-body">
                            <h4>${chapter.dataset.title}</h4>
                            <div class="card">
                                <div class="card-body">
                                    <p>${link}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }
        })
    }
}





// glossary search form

glossarySearch.addEventListener('keyup', () => {
    globalSearch( glossSearchSpace ,glossarySearch)
});

glossaryForm.addEventListener('submit', (e) => {
    e.preventDefault();
})

// main menu search form
searchFormInput.addEventListener('keyup', () => { 
    globalSearch(searchSpace, searchFormInput);
})

searchForm.addEventListener('submit', (e) => {
    e.preventDefault();
})