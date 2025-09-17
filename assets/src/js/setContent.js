const elsWithVars = document.querySelectorAll('[data-variables]');

elsWithVars.forEach(el => {
    const allText = el.innerText;
    const matches = [...allText.matchAll(/\{([^}]+)\}/g)];
    const allVarsEl = matches.map(m => m[1]);

    allVarsEl.forEach(var_ => {
        if (el.dataset.hasOwnProperty(var_)){
            el.innerHTML = el.innerHTML.replace(`{${var_}}`, el.dataset?.[var_])
        }
    })
});
