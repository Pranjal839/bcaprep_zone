document.addEventListener('DOMContentLoaded', function () {
    const yearFilter = document.getElementById('yearFilter');
    const semesterFilter = document.getElementById('semesterFilter');
    const searchInput = document.getElementById('searchInput'); // optional if search bhi chahiye
    const papersList = document.getElementById('papersList');

    function filterPapers() {
        const yearValue = yearFilter.value;
        const semValue = semesterFilter.value;
        const searchValue = searchInput?.value.toLowerCase() || "";
        const cards = papersList.querySelectorAll('.paper-card');

        cards.forEach(card => {
            const meta = card.querySelector('.paper-meta').textContent.toLowerCase();
            const title = card.querySelector('.paper-title').textContent.toLowerCase();

            const yearMatch = !yearValue || meta.includes(yearValue);
            const semMatch = !semValue || meta.includes(`semester: ${semValue}`);
            const searchMatch = !searchValue || title.includes(searchValue) || meta.includes(searchValue);

            const show = yearMatch && semMatch && searchMatch;
            card.style.display = show ? '' : 'none';
        });
    }

    // Show all cards on load
    const cards = papersList.querySelectorAll('.paper-card');
    cards.forEach(card => { card.style.display = 'block'; });

    yearFilter.addEventListener('change', filterPapers);
    semesterFilter.addEventListener('change', filterPapers);
    searchInput?.addEventListener('input', filterPapers);
});
