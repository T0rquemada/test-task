import './bootstrap';

document.getElementById('form_search').addEventListener('submit', async function (e)
{
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const button = document.getElementById('search_btn');

    // Disable button, until search query in process
    button.disabled = true;
    const originalText = button.innerText;
    button.innerText = 'Завантаження...';

    const params = {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': form.querySelector('[name=_token]').value,
            'Accept': 'application/json'
        },
        body: formData
    };

    const response = await fetch('/search', params);

    const results = await response.json();

    const container = document.querySelector('.search__result');
    container.innerHTML = '';

    if(results.length > 0)
    {
        results.forEach(result =>
        {
            container.innerHTML += `
                <div class="search__result__section">
                    <p>Ранг видачі: ${result.rank}</p>
                    <p>Назва: <a href="${result.url}" target="_blank">${result.title}</a></p>
                </div>
            `;
        });
    }
    else
    {
        container.innerHTML = '<p>За вашим пошуковим запитом нічого не знайдено!</p>';
    }

    // Make button available
    button.disabled = false;
    button.innerText = originalText;
});
