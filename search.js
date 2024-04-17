
let accumulator = parseInt(localStorage.getItem('accumulator')) || 0;
let saveValue = JSON.parse(localStorage.getItem('save-Value')) || [];

const countryList = ["japan", "canada", "singapore"];

function showSuggestions() {
    const searchInput = document.getElementById("searchInput").value.toLowerCase();
    const filteredWords = countryList.filter(word => word.includes(searchInput));
    displaySuggestions(filteredWords, searchInput);
}

function displaySuggestions(suggestions, searchInput) {
    const suggestionsDiv = document.querySelector(".suggestions");

    if (searchInput.length === 0) {
        suggestionsDiv.style.display = "none";
    } else {
        suggestionsDiv.style.display = "block";
        let suggestionHTML = '';

        for (let i = 0; i < suggestions.length; i++) {
            const suggestion = suggestions[i];
            suggestionHTML += `<a href="#${suggestion}" onclick="handleLinkClick(event)" style="color: white; text-decoration: none">
                                    <p>${suggestion}</p>
                                </a>`;
        }

        suggestionsDiv.innerHTML = suggestionHTML;
    }
}

function handleLinkClick(event) {
    event.preventDefault();
    const target = event.currentTarget.getAttribute('href').substr(1); // remove the leading #
    
    // Check if the target is in the same page
    const targetElement = document.getElementById(target);
    if (targetElement) {
        // Scroll to the target element
        targetElement.scrollIntoView({  
            block: 'center'
        });
    } else {
        // Navigate to the link
        window.location.href = "explore.php#" + target;
    }
}